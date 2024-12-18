@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row">

        <!-- Alamat Pengiriman -->
        <div class="col-12 mb-0" style="background-color: #849573; border-radius: 10px 10px 0 0; padding: 20px;">
            <h4 class="mb-2 text-white" style="font-weight: bold;">Alamat Pengiriman</h4>
            <p class="text-white">Mario Arya</p>
            <p class="text-white">Jl. Babarsari No. 86, Yogyakarta, ID 55571</p>
            <p class="text-white">08123456789</p>
        </div>

        <!-- Header Harga Satuan dan Jumlah -->
        <div class="col-12 mb-0" style="background-color: #B3B792; padding: 20px; display: flex; justify-content: flex-end; align-items: center;">
            <div style="margin-right: 150px;">
                <h5 class="m-0" style="font-weight: bold;">Harga Satuan</h5>
            </div>
            <div style="text-align: right;">
                <h5 class="m-0" style="font-weight: bold;">Jumlah</h5>
            </div>
        </div>

        <!-- Produk -->
        <div class="col-12 mb-0" style="background-color: #849573; display: flex; align-items: center; padding: 20px;">
            <div style="flex: 1;">
                <img id="product-image" class="img-fluid" style="max-width: 100px;" alt="Product Image">
                <img src="{{ asset('images/canin.jpg') }}" class="img-fluid" style="max-width: 100px;" alt="Royal Canin">
            </div>
            <div style="flex: 5; margin-left: 10px; display: flex; justify-content: space-between; align-items: center;">
                <h5 class="text-black m-0" id="product-name" style="font-weight: bold;">Makanan Anjing Royal Canin untuk anjing kecil</h5>
                <div style="margin-right: 2px;">
                    <h5 class="text-white m-0" id="product-price" style="font-weight: bold;">Rp 400.000</h5>
                </div>
                <div style="text-align: right; margin-right:20px">
                    <h5 class="text-white m-0" id="product-quantity" style="font-weight: bold;">1</h5>
                </div>
            </div>
        </div>

        <!-- Separator -->
        <div class="col-12 mb-0" style="height: 20px; background-color: #B3B792;"></div>

        <!-- Total Harga -->
        <div class="col-12" style="background-color: #849573; padding: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 0 0 10px 10px;">
            <h4 class="text-white" id="total-price" style="font-weight: bold;">Total: Rp 400.000</h4>
            <button class="btn btn-success btn-animate" onclick="location.href='{{ url('pilihbayar') }}'" style="border-radius: 20px; padding: 8px 20px;">Bayar</button>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productName = localStorage.getItem('product-name') || 'Makanan Anjing Royal Canin untuk anjing kecil';
        const productImage = localStorage.getItem('product-image') || '{{ asset('images/canin.jpg') }}';
        const quantity = parseInt(localStorage.getItem('quantity')) || 1;
        const pricePerUnit = 400000;
        const totalPrice = quantity * pricePerUnit;

        document.getElementById('product-name').innerText = productName;
        document.getElementById('product-image').src = productImage;
        document.getElementById('product-price').innerText = 'Rp ' + pricePerUnit.toLocaleString();
        document.getElementById('product-quantity').innerText = quantity;
        document.getElementById('total-price').innerText = 'Total: Rp ' + totalPrice.toLocaleString();
    });
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