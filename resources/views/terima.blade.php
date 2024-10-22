@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="p-5" style="
                background-color: #849573;
                border-radius: 10px;
            ">
                <i class="fas fa-check-circle fa-5x text-white mb-4"></i>
                <h2 class="text-white mb-3">Pesanan Anda Telah Diterima!</h2>
                <p class="text-white">Terima kasih telah berbelanja di toko kami. Pesanan Anda sedang kami proses dan akan segera dikirim.</p>
                
                <div class="mt-4 p-4" style="
                    background-color: #B3B792;
                    border-radius: 10px;
                ">
                    <h4 class="mb-3">Detail Pesanan</h4>
                    <table class="table table-borderless text-left text-white">
                        <tr>
                            <th>Nama Produk:</th>
                            <td>Makanan Anjing Royal Canin untuk anjing kecil</td>
                        </tr>
                        <tr>
                            <th>Jumlah:</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Harga:</th>
                            <td>Rp 400.000</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><strong>Rp 400.000</strong></td>
                        </tr>
                    </table>
                </div>

                <a href="{{ url('/Home') }}" class="btn btn-success btn-animate mt-4" style="
                    border-radius: 20px;
                    padding: 10px 30px;
                    background-color: #6e7a55;
                ">Kembali Berbelanja</a>

                <a onclick="location.href='{{ url('review') }}'" class="btn btn-success btn-animate mt-4" style="
                    border-radius: 20px;
                    padding: 10px 30px;
                    background-color: #6e7a55;
                ">Review Pesanan</a>

            </div>
        </div>
    </div>
</div>

<style>
    .btn-animate {
        transition: all 0.3s ease;
    }
    .btn-animate:hover {
        background-color: #5a6744;
        transform: scale(1.05);
    }
</style>

@endsection
