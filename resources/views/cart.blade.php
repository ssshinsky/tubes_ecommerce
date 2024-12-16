@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px 10px 0 0;">
            <h3 class="mb-2 text-white">Keranjang Belanja</h3>
            <p class="text-white">Berikut adalah produk-produk yang telah Anda pilih.</p>
        </div>

        <div class="col-12 mb-0" style="background-color: #d9e6d2; padding: 20px; border-radius: 0 0 10px 10px;">

            <div class="row align-items-center mb-4 p-3" style="background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-2">
                    <img src="{{ asset('images/canin.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;" alt="Royal Canin">
                </div>
                <div class="col-6">
                    <h5 class="m-0">Makanan Anjing Royal Canin</h5>
                    <p class="text-muted">Untuk anjing kecil</p>
                </div>
                <div class="col-2 text-right">
                    <h5 class="m-0">Rp 400.000</h5>
                </div>
                <div class="col-2 text-right">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="input-group" style="width: auto;">
                            <button class="btn btn-outline-secondary" onclick="decreaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white;">-</button>
                            <input type="number" value="1" min="1" class="form-control text-center mx-1" 
                                   style="width: 50px; height: 30px; font-size: 14px; padding: 0; border-radius: 5px; border-color: #849573;" onchange="calculateTotal()">
                            <button class="btn btn-outline-secondary" onclick="increaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white; margin-right:3px;">+</button>
                        </div>
                        <button class="btn btn-danger btn-sm ml-2" style="border-radius: 10px; padding: 5px 10px;" onclick="removeProduct(this)">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4 p-3" style="background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-2">
                    <img src="{{ asset('images/mainankaret.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;" alt="Dog Toy">
                </div>
                <div class="col-6">
                    <h5 class="m-0">Mainan Anjing Karet</h5>
                    <p class="text-muted">Mainan gemoy untuk anjing</p>
                </div>
                <div class="col-2 text-right">
                    <h5 class="m-0">Rp 150.000</h5>
                </div>
                <div class="col-2 text-right">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="input-group" style="width: auto;">
                            <button class="btn btn-outline-secondary" onclick="decreaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white;">-</button>
                            <input type="number" value="1" min="1" class="form-control text-center mx-1" 
                                   style="width: 50px; height: 30px; font-size: 14px; padding: 0; border-radius: 5px; border-color: #849573;" onchange="calculateTotal()">
                            <button class="btn btn-outline-secondary" onclick="increaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white; margin-right:3px;">+</button>
                        </div>
                        <button class="btn btn-danger btn-sm ml-2" style="border-radius: 10px; padding: 5px 10px;" onclick="removeProduct(this)">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4 p-3" style="background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-2">
                    <img src="{{ asset('images/mangkuk.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;" alt="Dog Bowl">
                </div>
                <div class="col-6">
                    <h5 class="m-0">Mangkuk Makan Anjing</h5>
                    <p class="text-muted">Mangkuk anti tumpah untuk anjing</p>
                </div>
                <div class="col-2 text-right">
                    <h5 class="m-0">Rp 100.000</h5>
                </div>
                <div class="col-2 text-right">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="input-group" style="width: auto;">
                            <button class="btn btn-outline-secondary" onclick="decreaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white;">-</button>
                            <input type="number" value="1" min="1" class="form-control text-center mx-1" 
                                   style="width: 50px; height: 30px; font-size: 14px; padding: 0; border-radius: 5px; border-color: #849573;" onchange="calculateTotal()">
                            <button class="btn btn-outline-secondary" onclick="increaseQuantity(this)" 
                                    style="border-radius: 50%; width: 30px; height: 30px; font-size: 14px; border-color: #8ba889; background-color: #849573; color: white; margin-right:3px;">+</button>
                        </div>
                        <button class="btn btn-danger btn-sm ml-2" style="border-radius: 10px; padding: 5px 10px;" onclick="removeProduct(this)">Hapus</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 mt-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <h4 class="text-white" id="total-amount" style="font-weight: bold;">Total: Rp 550.000</h4>
            <button class="btn btn-success" style="border-radius: 20px; padding: 10px 30px; font-size: 1.2rem; background-color: #849573; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;" 
            onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(0, 0, 0, 0.2)';" 
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';" 
            onclick="location.href='{{ url('pilihbayar') }}'">
                Lanjutkan ke Pembayaran
            </button>
        </div>
    </div>
</div>

<script>
    function calculateTotal() {
        let total = 0;
        const products = document.querySelectorAll('.row.align-items-center.mb-4');

        products.forEach(product => {
            const price = parseInt(product.querySelector('.text-right h5').innerText.replace(/Rp /, '').replace(/\./g, '').trim());
            const quantity = parseInt(product.querySelector('input[type="number"]').value);
            total += price * quantity;
        });

        document.getElementById('total-amount').innerText = 'Total: Rp ' + total.toLocaleString();

        localStorage.setItem('total', total);
    }

    document.addEventListener('DOMContentLoaded', () => {
        calculateTotal();
    });

    function increaseQuantity(button) {
        const quantityInput = button.previousElementSibling;
        quantityInput.value = parseInt(quantityInput.value) + 1;
        calculateTotal();
    }

    function decreaseQuantity(button) {
        const quantityInput = button.nextElementSibling;
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            calculateTotal();
        }
    }

    function removeProduct(button) {
        const productRow = button.closest('.row.align-items-center.mb-4');
        productRow.remove();
        calculateTotal();
    }
</script>
@endsection
