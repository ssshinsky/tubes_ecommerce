@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row">

        <div class="col-12 mb-0" style="background-color: #849573; padding: 20px; border-radius: 10px 10px 0 0;">
            <h4 class="mb-2 text-white" style="font-weight: bold;">Pembayaran Berhasil!</h4>
            <p class="text-white">Terima kasih, pembayaran Anda telah berhasil diproses.</p>
            <p class="text-white">Kami akan segera memproses pesanan Anda, terima kasih sudah berbelanja!</p>
        </div>

        <div class="col-12 mb-3" style="height: 20px; background-color: #B3B792;"></div>

        <div class="col-12 mb-0" style="background-color: #849573; padding: 20px; display: flex; justify-content: flex-end; align-items: center; border-radius: 0 0 10px 10px;">
            <div style="margin-right: 200px;">
                <h5 class="m-0" style="font-weight: bold; color:white;">Total Pembayaran</h5>
            </div>
            <div style="text-align: right;">
                <h5 class="m-0" id="total-payment" style="font-weight: bold; color:white;">Rp 0</h5>
            </div>
        </div>


        <div class="col-12" style="display: flex; justify-content: center; padding: 20px;">
            <a href="{{ url('/Home') }}" class="btn btn-success btn-animate" style="border-radius: 20px; padding: 10px 20px; background-color: #849573;">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const total = localStorage.getItem('total') || 0;

        document.getElementById('total-payment').innerText = 'Rp ' + parseInt(total).toLocaleString();
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
