@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px 10px 0 0;">
            <h3 class="mb-2 text-white">Keranjang Belanja</h3>
            <p class="text-white">Berikut adalah produk-produk yang telah Anda pilih.</p>
        </div>

        <div class="col-12 mb-0" style="background-color: #d9e6d2; padding: 20px; border-radius: 0 0 10px 10px;">

            <div class="row align-items-center m-1 p-3" style="background-color: #B3B792; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th class="text-center">Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $productId => $details)
    <tr>
        <td>
            <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" style="width: 50px; height: 50px; object-fit: cover;">
        </td>
        <td>{{ $details['name'] }}</td>
        <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
        <td>
            <div class="input-group" style="width: 110px;">
                <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity('{{ $productId }}', -1)" style="border-radius: 20px 0 0 20px; border-color: #8ba889; background-color: #849573; color: white; font-size: 14px; padding: 5px 10px;">-</button>
                <input type="number" id="quantity_{{ $productId }}" value="{{ $details['quantity'] }}" min="1" class="form-control text-center" style="width: 40px; border-radius: 0; border-color: #849573; font-size: 14px; padding: 5px 10px;" onchange="updateTotalPrice()">
                <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity('{{ $productId }}', 1)" style="border-radius: 0 20px 20px 0; border-color: #8ba889; background-color: #849573; color: white; font-size: 14px; padding: 5px 10px;">+</button>
            </div>
        </td>
        <td>Rp <span id="total_{{ $productId }}">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span></td>
        <td>
            <form action="{{ route('remove.from.cart', $productId) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> Hapus
                </button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
        </div>
    @else
        <div style="
            display: flex; 
            justify-content: center; 
            align-items: center;">
            <h5 style="color: #fff;">Keranjang Anda kosong.</h5>
        </div>
    @endif

        </div>

        <div class="col-12 mt-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <h4 class="text-white" id="total-amount" style="font-weight: bold;">Total: Rp {{ number_format(array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, session('cart', []))), 0, ',', '.') }}</h4>
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
            const imageUrl = product.querySelector('img').src;
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

    function changeQuantity(productId, delta) {
    // Ambil input quantity
    var quantityInput = document.getElementById('quantity_' + productId);
        var totalPriceElement = document.getElementById('total_' + productId);
        
        // Update quantity berdasarkan tombol yang ditekan
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = currentQuantity + delta;
        
        if (newQuantity < 1) {
            newQuantity = 1;  // Jangan biarkan quantity kurang dari 1
        }

        quantityInput.value = newQuantity;
        
        // Hitung ulang total harga
        var price = {{ $details['price'] }};
        var totalPrice = price * newQuantity;
        
        // Update total harga di halaman
        totalPriceElement.innerHTML = 'Rp ' + totalPrice.toLocaleString();

        // Kirim request untuk update quantity di session
        updateTotalPrice(productId, newQuantity);
}

function updateTotalPrice() {
    let total = 0;

    // Iterasi setiap produk di dalam keranjang
    document.querySelectorAll('tr[data-product-id]').forEach(productRow => {
        const priceElement = productRow.querySelector('.product-price');
        const quantityInput = productRow.querySelector('input[type="number"]');
        const totalPriceElement = productRow.querySelector('.product-total-price');

        // Ambil harga produk
        const price = parseInt(priceElement.innerText.replace(/Rp /, '').replace(/\./g, '').trim());

        // Ambil jumlah produk
        const quantity = parseInt(quantityInput.value);

        // Hitung total per produk dan perbarui di tabel
        const totalProductPrice = price * quantity;
        totalPriceElement.innerText = `Rp ${totalProductPrice.toLocaleString()}`;

        // Tambahkan ke total keseluruhan
        total += totalProductPrice;
    });

    // Perbarui total keseluruhan di bagian bawah halaman
    const totalCartElement = document.getElementById('total-cart');
    totalCartElement.innerText = `Rp ${total.toLocaleString()}`;
}
</script>
@endsection
