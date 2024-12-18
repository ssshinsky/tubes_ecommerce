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
            <div class="card card-custom">
                <div class="card-body text-center">
                    <i class="fas fa-university text-primary"></i>
                    <h5 style="font-weight: bold;">Transfer Bank</h5>
                    <img src="{{ asset('images/transferbank.png') }}" alt="Transfer Bank" class="img-fluid mb-3 card-img">
                    <p>Bayar melalui transfer antar bank.</p>
                    <a onclick="location.href='{{ url('berhasilbayar') }}'" class="btn btn-success btn-animate">Pilih</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-custom">
                <div class="card-body text-center">
                    <i class="fas fa-credit-card text-danger"></i>
                    <h5 style="font-weight: bold;">Kartu Kredit/Debit</h5>
                    <img src="{{ asset('images/kartukredit.png') }}" alt="Kartu Kredit/Debit" class="img-fluid mb-3 card-img">
                    <p>Pembayaran dengan kartu kredit atau debit.</p>
                    <a onclick="location.href='{{ url('berhasilbayar') }}'" class="btn btn-success btn-animate">Pilih</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-custom">
                <div class="card-body text-center">
                    <i class="fas fa-wallet text-warning"></i>
                    <h5 style="font-weight: bold;">E-Wallet (GoPay, OVO, dll)</h5>
                    <img src="{{ asset('images/ewallet.png') }}" alt="E-Wallet" class="img-fluid mb-3 card-img">
                    <p>Bayar cepat dengan e-wallet pilihan Anda.</p>
                    <a href="#" class="btn btn-success btn-animate" data-bs-toggle="modal" data-bs-target="#eWalletModal">Pilih</a>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3" style="height: 20px; background-color: #B3B792;"></div>

    </div>
</div>

<!-- Modal for E-Wallet Payment -->
<div class="modal fade" id="eWalletModal" tabindex="-1" aria-labelledby="eWalletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eWalletModalLabel">Pembayaran E-Wallet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Scan QR Code berikut untuk melakukan pembayaran:</p>
                <img src="{{ asset('images/qrcode.png') }}" alt="QR Code" class="img-fluid mb-3" style="max-width: 200px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-animate" onclick="completePayment()">Sudah Bayar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function completePayment() {
        location.href = '{{ url('berhasilbayar') }}';
    }
</script>

<style>
    .btn-animate {
        transition: all 0.3s ease;
        border-radius: 20px; 
        background-color: #849573;
    }
    .btn-animate:hover {
        background-color: #6e7a55;
        transform: scale(1.05);
    }
    .card-custom {
        border: none;
        background-color: #B3B792; 
        border-radius: 10px;
        height: 100%; 
    }
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
    }
    .card-img {
        max-width: 80px; 
        height: auto; 
        margin: auto; 
    }
</style>

@endsection
