@extends('layouts.template')

@section('content')

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 d-flex flex-column align-items-center">
            @if($item->gambar_produk)
            <img src="{{ $item->gambar_produk }}" alt="{{ $item->nama }}"style="max-width: 100%;">
            @else
            -
            @endif
        </div>

        <div class="col-md-6 d-flex align-items-start flex-column">
            <div class="w-100 p-3" style="background-color: #B3B792; border-radius: 10px 10px 0 0;">
                <h4 class="product-title m-0">{{ $item->nama }}</h4>
            </div>

            <div class="w-100 p-3" style="background-color: #849573;">
                <h5 class="m-0 text-white" style="font-weight: bold;" id="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</h5>
            </div>

            <div class="w-100" style="height: 5px; background-color: #B3B792;"></div>

            <div class="w-100 p-3" style="background-color: #849573;">
                <p class="product-description text-white m-0">Deskripsi Produk : {{ $item->deskripsi }}</p>
            </div>

            <div class="w-100 p-3 d-flex align-items-center justify-content-between" style="background-color: #B3B792; border-radius: 0 0 10px 10px;">
                <div class="input-group" style="width: auto;">
                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity()" style="border-radius: 20px 0 0 20px; border-color: #8ba889; background-color: #849573; color: white;">-</button>
                    <input type="number" value="1" min="1" class="form-control text-center" style="width: 60px; border-radius: 0; border-color: #849573;" id="quantity" onchange="updateTotalPrice()">
                    <button class="btn btn-outline-secondary" onclick="increaseQuantity()" style="border-radius: 0 20px 20px 0; border-color: #8ba889; background-color: #849573; color: white;">+</button>
                </div>

                <div class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-animate" onclick="addToCart()" style="border-radius: 20px; padding: 8px 20px; font-size: 1rem; background-color: #849573; color: white;">
                        <i class="fas fa-cart-plus"></i>
                    </button>

                    <button class="btn btn-success btn-animate" onclick="goToPayment()" style="border-radius: 20px; padding: 8px 20px; font-size: 1rem; margin-left: 10px; background-color: #849573;">
                        <i class="fas fa-credit-card"></i>
                        Beli
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const pricePerUnit = {{ $item->harga }};

    function updateTotalPrice() {
        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('total-price');
        const quantity = parseInt(quantityInput.value);
        const totalPrice = quantity * pricePerUnit;
        totalPriceElement.innerText = 'Rp ' + totalPrice.toLocaleString();
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        updateTotalPrice();
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateTotalPrice();
        }
    }

    function goToPayment() {
        const quantityInput = document.getElementById('quantity');
        const totalPrice = quantityInput.value * pricePerUnit;
        localStorage.setItem('quantity', quantityInput.value);
        localStorage.setItem('total', totalPrice);
        location.href = '{{ url('bayar') }}';
    }

    function addToCart(){
        const quantityInput = document.getElementById('quantity');
        const quantity = parseInt(quantityInput.value);
        const totalPrice = quantity * pricePerUnit;

        const cartData = {
            id_produk: {{ $item->id }},
            quantity: quantity,
            total_harga: totalPrice
        };

        fetch('/api/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(cartData),
        })
        .then(response => response.json())
        .then(data => {
            if(data.message === 'Item added to cart successfully!'){
                Toastify({
                    text: "Item berhasil ditambahkan ke keranjang!",
                    duration: 3000,
                    gravity: "top",
                    position: 'right',
                    backgroundColor: "#4CAF50",
                    className: "info",
                }).showToast();
            }else{
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Toastify({
                text: "Gagal menambahkan item ke keranjang!",
                duration: 3000,
                gravity: "top",
                position: 'right',
                backgroundColor: "#dc3545",
            }).showToast();
        });
    }
</script>

<style>
    .btn-animate {
        transition: all 0.3s ease;
    }
    .btn-animate:hover {
        background-color: #6e7a55;
        transform: scale(1.05);
    }
</style>

@endsection
