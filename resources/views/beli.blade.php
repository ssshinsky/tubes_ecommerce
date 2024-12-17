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
            <img src="{{ asset('images/canin.jpg') }}" class="img-fluid mb-3" style="max-width: 30%;" alt="Royal Canin">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/canin.jpg') }}" class="img-thumbnail mx-1" style="width: 80px;">
                <img src="{{ asset('images/canin.jpg') }}" class="img-thumbnail mx-1" style="width: 80px;">
                <img src="{{ asset('images/canin.jpg') }}" class="img-thumbnail mx-1" style="width: 80px;">
                <img src="{{ asset('images/canin.jpg') }}" class="img-thumbnail mx-1" style="width: 80px;">
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-start flex-column">
            <div class="w-100 p-3" style="background-color: #B3B792; border-radius: 10px 10px 0 0;">
                <h4 class="product-title m-0">Makanan Anjing Royal Canin untuk anjing kecil</h4>
            </div>

            <div class="w-100 p-3" style="background-color: #849573;">
                <h5 class="m-0 text-white" style="font-weight: bold;" id="price">Rp 400.000</h5>
            </div>

            <div class="w-100" style="height: 5px; background-color: #B3B792;"></div>

            <div class="w-100 p-3" style="background-color: #849573;">
                <p class="product-description text-white m-0">Deskripsi Produk : Makanan anjing royal canin memiliki nutrisi yang lengkap sesuai dengan kebutuhan anjing kecil agar pertumbuhannya maksimal.</p>
            </div>

             <!-- Form untuk menambah produk ke keranjang -->
             <form action="{{ route('add.to.cart', ['productId' => 1]) }}" method="POST" id="cartForm">
    @csrf
    <input type="hidden" name="image" value="images/canin.jpg">
    <input type="hidden" name="name" value="Makanan Anjing Royal Canin untuk Anjing Kecil">
    <input type="hidden" name="price" value="400000">
    <input type="hidden" name="quantity" id="quantityInput" value="1">
</form>

<div class="w-100 p-3 d-flex align-items-center justify-content-between" style="background-color: #B3B792; border-radius: 0 0 10px 10px;">
    <div class="input-group" style="width: auto;">
        <button class="btn btn-outline-secondary" onclick="decreaseQuantity()" style="border-radius: 20px 0 0 20px; border-color: #8ba889; background-color: #849573; color: white;">-</button>
        <input type="number" value="1" min="1" class="form-control text-center" style="width: 60px; border-radius: 0; border-color: #849573;" id="quantity" onchange="updateQuantity()">
        <button class="btn btn-outline-secondary" onclick="increaseQuantity()" style="border-radius: 0 20px 20px 0; border-color: #8ba889; background-color: #849573; color: white;">+</button>
    </div>

    <div class="d-flex" style="gap: 10px;">
        <button class="btn btn-success btn-animate" onclick="addToCart()" style="border-radius: 20px; padding: 8px 20px; font-size: 1rem; background-color: #849573; color: white;">
            <i class="fas fa-cart-plus"></i>
        </button>

        <button type="submit" class="btn btn-success btn-animate" onclick="goToPayment()" style="border-radius: 20px; padding: 8px 20px; font-size: 1rem; margin-left: 10px; background-color: #849573;">
            <i class="fas fa-credit-card"></i>
            Beli
        </button>
    </div>
</div>

<script>
    // Fungsi untuk mengupdate kuantitas di input
    function updateQuantity() {
        const quantity = document.getElementById("quantity").value;
        document.getElementById("quantityInput").value = quantity; // Update value quantity pada form
    }

    // Fungsi untuk menambah kuantitas produk
    function increaseQuantity() {
        const quantityInput = document.getElementById("quantity");
        quantityInput.value = parseInt(quantityInput.value) + 1; // Menambah kuantitas
        updateQuantity(); // Update value di input hidden
    }

    // Fungsi untuk mengurangi kuantitas produk
    function decreaseQuantity() {
        const quantityInput = document.getElementById("quantity");
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1; // Mengurangi kuantitas
            updateQuantity(); // Update value di input hidden
        }
    }

    // Fungsi untuk submit form saat tombol "Tambah ke Keranjang" diklik
    function addToCart() {
        document.getElementById("cartForm").submit(); // Submit form untuk menambahkan ke keranjang
    }
     
    
</script>
@if(session('success'))
                    <script>
                        Toastify({
                            text: "{{ session('success') }}",
                            duration: 3000,
                            backgroundColor: "green",
                            close: true,
                            gravity: "top",
                            position: "right"
                        }).showToast();
                    </script>
                @endif
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
