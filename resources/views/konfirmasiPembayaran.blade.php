<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e5d2b8; 
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background-color: #809671; 
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            transition: transform 0.3s ease;
            z-index: 1000; 
        }

        .sidebar.hidden {
            transform: translateX(-100%); 
        }

        .sidebar img {
            width: 100%;
            margin-bottom: 20px;
        }

        .sidebar p {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .sidebar .admin-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: block;
            margin: 0 auto 10px auto;
        }

        header {
            background-color: #e5e0d8; 
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-left: 220px; 
            transition: margin-left 0.3s ease; 
        }

        header.hidden {
            margin-left: 0;
        }

        header .logout-btn {
            color: #6b4e30;
            font-weight: bold;
            text-decoration: none;
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-radius: 5px;
            border: 2px solid #6b4e30;
        }

        header .logout-btn:hover {
            background-color: #6b4e30;
            color: white;
        }

        .main-content {
            margin-left: 240px; 
            padding: 20px;
            transition: margin-left 0.3s ease; 
        }

        .main-content.hidden {
            margin-left: 0; 
        }

        .table-container {
            margin-top: 20px;
            background-color: #e5d2b8;
            padding: 15px;
            border-radius: 10px;
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            margin-bottom: 15px;
        }

        .table {
            width: 100%;
            background-color: white; 
            overflow: hidden;
            text-align: left;
        }

        tr {
            padding: 12px;
            border: 1px solid black;
        }

        thead {
            background-color: #d2ab80; 
            color: black;
        }

        tbody tr:nth-child(even) {
            background-color: #e5e0d8; 
        }

        tbody tr:nth-child(odd) {
            background-color: #e5e0d8;
        }

        tbody tr:hover {
            background-color: #d2ab80; 
            transition: background-color 0.3s ease; 
        }

        tbody tr td {
            padding: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .search-box {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .search-box input {
            width: 300px;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #6b4e30;
        }

        .admin-info {
            display: flex;
            align-items: center; 
            justify-content: center; 
            margin-top: 20px; 
            background-color: #b3b792; 
            border-radius: 5px; 
            padding: 10px; 
            transition: transform 0.3s ease; 
        }

        .admin-info:hover {
            transform: scale(1.05); 
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            float: right; 
            margin-bottom: 15px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .btn-save:disabled {
            background-color: #cce5ff;
            cursor: not-allowed;
        }
    </style>

</head>
<body>
    <div class="sidebar" id="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="Atma Petshop Logo">
            <div class="admin-info">
                <a href="{{ url('/dashboard') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/adminprofile.png') }}" alt="Admin Avatar" class="admin-avatar">
                <p>Admin</p>
            </div>
            <div class="admin-info" style="background-color: #b3b792; margin-top: 10px;">
                <a href="{{ url('/konfirmasiPembayaran') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/payment.png') }}" alt="Payment Icon" class="admin-avatar"> 
                <p>Konfirmasi Pembayaran</p>
            </div>
            <div class="admin-info" style="background-color: #b3b792; margin-top: 10px;">
                <a href="{{ url('/daftarBarang') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/addBarang.png') }}" alt="Tambah Barang Icon" class="admin-avatar"> 
                <p>Daftar Barang</p>
            </a>
        </div>
    </div>

    <header id="header">
        <button class="navbar-toggler" id="sidebarToggle" type="button" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #e5e0d8; border: none; color: white; border-radius: 5px; padding: 5px 10px;">
            <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
            <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
            <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
        </button>
        <a onclick="location.href='{{ url('loginAndRegister') }}'" class="logout-btn">Logout</a>
    </header>

    <div class="main-content" id="mainContent">
        <h1>Konfirmasi Pembayaran</h1>

        <button id="saveButton" class="btn-save" disabled>Simpan</button> 

        <div class="table-container">
            <div class="table-title">Daftar Pembayaran</div>
            <div class="search-box">
                <input type="text" placeholder="Cari pengguna..." style="max-width: 400px; padding: 5px;"> 
                <button class="icon-button" style="margin-left: 5px;">
                    <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 20px; height: 20px;">
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Member</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal Pembayaran</th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $index => $data)
                    <tr id="row-{{ $index }}">
                        <td>{{ $data['nama_member'] }}</td>
                        <td>{{ number_format((float)$data['jumlah'], 0, ',', '.') }}</td>
                        <td id="status-{{ $index }}">{{ $data['status'] }}</td>
                        <td id="date-{{ $index }}">
                            @if ($data['status'] === 'Pending')
                                -
                            @else
                                {{ $data['tanggal'] }}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success" onclick="konfirmasi({{ $index }})" id="confirm-{{ $index }}">Konfirmasi</button>
                            <button class="btn btn-danger" onclick="batal({{ $index }})" id="cancel-{{ $index }}">Batal</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function(event) {
        event.preventDefault(); 
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const header = document.getElementById('header');
        sidebar.classList.toggle('hidden');
        header.classList.toggle('hidden');
        mainContent.classList.toggle('hidden');
    });

    function konfirmasi(index) {
        const statusElement = document.getElementById('status-' + index);
        const dateElement = document.getElementById('date-' + index);
        const confirmButton = document.getElementById('confirm-' + index);
        const cancelButton = document.getElementById('cancel-' + index);
        const saveButton = document.getElementById('saveButton');
        
        statusElement.innerText = 'Sukses';
        dateElement.innerText = new Date().toLocaleDateString(); 
        saveButton.disabled = false; 
    }

    function batal(index) {
        const statusElement = document.getElementById('status-' + index);
        const dateElement = document.getElementById('date-' + index);
        const saveButton = document.getElementById('saveButton');

        if (statusElement.innerText === 'Sukses') {
            statusElement.innerText = 'Batal'; 
            dateElement.innerText = 'Dibatalkan'; 
            saveButton.disabled = false; 
        } else if (statusElement.innerText === 'Pending') {
            statusElement.innerText = 'Batal'; 
            dateElement.innerText = 'Dibatalkan'; 
            saveButton.disabled = false; 
        }
    }

    document.getElementById('saveButton').addEventListener('click', function() {
        alert('Perubahan disimpan!'); 
        this.disabled = true;
    });
    </script>
</body>
</html>
