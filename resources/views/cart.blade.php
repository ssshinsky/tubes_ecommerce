@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px 10px 0 0;">
            <h3 class="mb-2 text-white">Keranjang Belanja</h3>
            <p class="text-white">Berikut adalah produk-produk yang telah Anda pilih.</p>
        </div>

        <div id="cart-items" class="col-12 mb-0" style="background-color: #d9e6d2; padding: 20px; border-radius: 0 0 10px 10px;">
        </div>

        <div class="col-12 mt-4" style="background-color: #B3B792; padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <h4 class="text-white" id="total-amount" style="font-weight: bold;">Total: Rp 0</h4>
            <button class="btn btn-success" style="border-radius: 20px; padding: 10px 30px;" onclick="location.href='{{ url('pilihbayar') }}'">
                Lanjutkan ke Pembayaran
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetchCartItems();
    });

    function fetchCartItems(){
        fetch('/api/cart')
            .then(response => {
                console.log('API Response Status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Cart Data:', data);

                if(!data.data || data.data.length === 0){
                    document.getElementById('cart-items').innerHTML = `
                        <p class="text-center">Keranjang Anda kosong!</p>`;
                    document.getElementById('total-amount').innerText = 'Total: Rp 0';
                    return;
                }

                const cartContainer = document.getElementById('cart-items');
                cartContainer.innerHTML = '';
                let total = 0;

                data.data.forEach(item => {
                    const product = item.produk;
                    const price = item.total_harga;
                    total += price;

                    cartContainer.innerHTML += `
                        <div class="row align-items-center mb-4 p-3" style="background-color: #fff; border-radius: 10px;">
                            <div class="col-2">
                                <img src="${product.gambar_produk || '/images/default.jpg'}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="${product.nama}">
                            </div>
                            <div class="col-6">
                                <h5 class="m-0">${product.nama}</h5>
                                <p class="text-muted">${product.deskripsi || ''}</p>
                            </div>
                            <div class="col-2 text-right">
                                <h5 class="m-0">Rp ${price.toLocaleString()}</h5>
                            </div>
                            <div class="col-2 text-right">
                                <button class="btn btn-danger btn-sm" onclick="removeProduct(${item.id})">Hapus</button>
                            </div>
                        </div>
                    `;
                });

                document.getElementById('total-amount').innerText = 'Total: Rp ' + total.toLocaleString();
            })
            .catch(error => {
                console.error('Error fetching cart items:', error.message);
                document.getElementById('cart-items').innerHTML = `
                    <p class="text-center text-danger">Gagal memuat keranjang.</p>`;
            });
    }

    function removeProduct(id){
        fetch(`/api/cart/${id}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Item removed from cart successfully'){
                Toastify({
                    text: "Item berhasil dihapus dari keranjang!",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#dc3545",
                }).showToast();
                fetchCartItems(); // Refresh cart view
            }else{
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error removing item:', error.message);
            Toastify({
                text: "Gagal menghapus item dari keranjang!",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#dc3545",
            }).showToast();
        });
    }
</script>
@endsection