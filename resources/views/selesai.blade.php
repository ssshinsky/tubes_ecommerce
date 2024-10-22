@extends('layouts.template')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Daftar Pesanan</h2>
    
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead style="background-color: #849573; color: white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #d9e6d2;">
                        <tr>
                            <td>1</td>
                            <td>Makanan Anjing Royal Canin untuk anjing kecil</td>
                            <td>1</td>
                            <td>Rp 400.000</td>
                            <td><span class="badge badge-success">Selesai</span></td>
                            <td class="text-center">
                                <button class="btn btn-success btn-animate" onclick="location.href='{{ url('terima') }}'" style="
                                    border-radius: 20px;
                                    background-color: #849573;
                                    padding: 8px 20px;
                                ">Konfirmasi Pesanan Diterima</button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Makanan Kucing Whiskas</td>
                            <td>2</td>
                            <td>Rp 300.000</td>
                            <td><span class="badge badge-success">Selesai</span></td>
                            <td class="text-center">
                                <button class="btn btn-success btn-animate" onclick="location.href='{{ url('terima') }}'" style="
                                    border-radius: 20px;
                                    background-color: #849573;
                                    padding: 8px 20px;
                                ">Konfirmasi Pesanan Diterima</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmPesanan(pesananId) {
        if (confirm('Apakah Anda yakin ingin mengonfirmasi pesanan ini?')) {
            alert('Pesanan ' + pesananId + ' telah dikonfirmasi.');
        }
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
