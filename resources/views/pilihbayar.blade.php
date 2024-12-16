@extends('layouts.template')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">

        <div class="col-12 mb-0" style="background-color: #849573; padding: 30px; border-radius: 10px 10px 0 0; text-align: center;">
            <h4 class="mb-3 text-white" style="font-weight: bold;">Pilih Metode Pembayaran</h4>
            <p class="text-white">Silakan pilih metode pembayaran yang sesuai dengan kebutuhan Anda.</p>
        </div>

        <div class="col-12 mb-3" style="height: 20px; background-color: #B3B792;"></div>

        <div class="col-md-4 mb-4">
            <div class="card" style="border: none;">
                <div class="card-body text-center" style="background-color: #B3B792; border-radius: 10px;">
                    <i class="fas fa-university fa-3x text-primary mb-3"></i>
                    <h5 style="font-weight: bold;">Transfer Bank</h5>
                    <p>Bayar melalui transfer antar bank.</p>
                    <a onclick="location.href='{{ url('berhasilbayar') }}'" class="btn btn-success btn-animate" style="border-radius: 20px; background-color: #849573;">Pilih</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card" style="border: none;">
                <div class="card-body text-center" style="background-color: #B3B792; border-radius: 10px;">
                    <i class="fas fa-credit-card fa-3x text-danger mb-3"></i>
                    <h5 style="font-weight: bold;">Kartu Kredit/Debit</h5>
                    <p>Pembayaran dengan kartu kredit atau debit.</p>
                    <a onclick="location.href='{{ url('berhasilbayar') }}'" class="btn btn-success btn-animate" style="border-radius: 20px; background-color: #849573;">Pilih</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card" style="border: none;">
                <div class="card-body text-center" style="background-color: #B3B792; border-radius: 10px;">
                    <i class="fas fa-wallet fa-3x text-warning mb-3"></i>
                    <h5 style="font-weight: bold;">E-Wallet (GoPay, OVO, dll)</h5>
                    <p>Bayar cepat dengan e-wallet pilihan Anda.</p>
                    <a onclick="location.href='{{ url('berhasilbayar') }}'" class="btn btn-success btn-animate" style="border-radius: 20px; background-color: #849573;">Pilih</a>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3" style="height: 20px; background-color: #B3B792;"></div>


    </div>
</div>

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
