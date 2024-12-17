<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Petshop Barang Terjual</title>
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
            transition: transform 0.3s ease;
        }

        .sidebar img:hover {
            transform: scale(1.05);
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
            transition: background-color 0.3s ease, color 0.3s ease;
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

        .card-section {
            display: flex;
            justify-content: space-between; 
            flex-wrap: wrap; 
        }

        .card {
            background-color: #e5e0d8;
            flex: 1 1 200px; 
            text-align: center; 
            margin: 10px;
            padding: 15px; 
            border: 1px solid #ccc; 
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;

        }

        .icon {
            width: 60px; 
            height: 60px; 
            margin-bottom: 10px; 
            display: block; 
            margin-left: auto; 
            margin-right: auto; 
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card.active {
            background-color: #d2ab80; 
            color: black;
        }

        .card .icon {
            font-size: 2.5rem;
            color: #6b4e30;
            margin-bottom: 10px;
        }

        .card h5 {
            font-weight: bold;
            color: black;
        }

        .card p {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
        }

        .table-container {
            margin-top: 20px;
            background-color: #e5d2b8;
            padding: 15px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .table-container:hover {
            transform: scale(1.01);
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
            transition: background-color 0.3s ease;
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
        }

        tbody tr td {
            padding: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .search-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .search-box input {
            width: 300px;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #6b4e30;
            transition: border-color 0.3s ease;
        }

        .search-box input:focus {
            border-color: #28a745;
            outline: none;
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

        .admin-avatar {
            margin-right: 10px; 
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

<header id="header" style="position: relative;">
    <button class="navbar-toggler" id="sidebarToggle" type="button" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #e5e0d8; border: none; color: white; border-radius: 5px; padding: 5px 10px;">
        <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
        <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
        <span class="navbar-toggler-icon" style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
    </button>
    <a onclick="location.href='{{ url('loginAndRegister') }}'" class="logout-btn">Logout</a>
</header>

<div class="main-content" id="mainContent">
    <h1>Atma Petshop Analysis</h1>

    <div class="card-section">
        <div class="card {{ request()->is('dashboard') ? 'active' : '' }}" onclick="window.location.href='{{ url('/dashboard') }}'">
            <img src="{{ asset('images/totalMember.png') }}" alt="Total Member" class="icon">
            <h5>Total Member</h5>
            <p>100</p>
        </div>
        <div class="card {{ request()->is('barangterjual') ? 'active' : '' }}" onclick="window.location.href='{{ url('/barangterjual') }}'">
            <a href="/barangterjual" style="text-decoration: none; color: inherit;">
                <img src="{{ asset('images/barangTerjual.png') }}" alt="Barang Terjual" class="icon">
                <h5>Barang Terjual</h5>
                <p>100</p>
            </a>
        </div>
        <div class="card {{ request()->is('pendapatan') ? 'active' : '' }}" onclick="window.location.href='{{ url('/pendapatan') }}'">
            <img src="{{ asset('images/pendapatan.png') }}" alt="Pendapatan" class="icon">
            <h5>Pendapatan</h5>
            <p>Rp 1.000.000</p>
        </div>
        <div class="card {{ request()->is('rating') ? 'active' : '' }}" onclick="window.location.href='{{ url('/rating') }}'">
            <img src="{{ asset('images/rating.png') }}" alt="Rating" class="icon">
            <h5>Rating</h5>
            <div>
                <img src="{{ asset('images/rating.png') }}" alt="Bintang" class="star" style="width: 20px; height: 20px;">
                <img src="{{ asset('images/rating.png') }}" alt="Bintang" class="star" style="width: 20px; height: 20px;">
                <img src="{{ asset('images/rating.png') }}" alt="Bintang" class="star" style="width: 20px; height: 20px;">
                <img src="{{ asset('images/rating.png') }}" alt="Bintang" class="star" style="width: 20px; height: 20px;">
                <img src="{{ asset('images/rating.png') }}" alt="Bintang" class="star" style="width: 20px; height: 20px;">
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-title">Daftar Barang Terjual</div>
        <div class="search-box">
            <img src="{{ asset('images/sort.png') }}" alt="Sort Icon" style="width: 20px; height: 20px; margin-right: 5px; margin-left: 5px;"> 
            <input type="text" placeholder="Cari nama produk..." style="max-width: 400px; padding: 5px;"> 
            <button class="icon-button" style="margin-left: 5px;">
                <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 20px; height: 20px;">
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Barang</th>
                    <th>Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $item)
                    <tr>
                        <td>
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['image'] }} Avatar" class="avatar">
                            {{ $item['nama_pembelian'] }}
                        </td>
                        <td>{{ $item['jumlah_barang'] }}</td>
                        <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>
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
</script>
</body>
</html>
