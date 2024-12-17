<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="/images/logokecil.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Atma Petshop</title>

    <!-- Roboto Fonts (buat text kecil) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Poppins Fonts (buat title)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: poppins;
            height: 100%;
            margin: 0;
            background-color: #E5D2B8;
        }
        .footage {
            background-color: #f5f5f5;
            display: flex;
            font-family: 'Roboto';
        }
        button {
            color: #333333;
            background: transparent;
            outline: none;
            border: none;
            cursor: pointer;
            padding-left: 50px;
            padding-top: 10px;
            font-size: 15px;
        }
        button:hover {
            color: #849573;
        }
        .hello {
            margin-left: auto;
            margin-right: 250px;
            padding-top: 10px;
            font-size: 15px;
        }
        header {
            background-color: #849573;
            padding-top: 30px;
            padding-bottom: 20px;
            display: flex;
            justify-content: center;
        }
        .logo img {
            width: 350px;
            padding-right: 50px;
            padding-left: 50px;
            margin-top: -20px;
        }
        .search-bar {
            display: flex;
            height: 30px;
            padding-top: 15px;
            align-items: center;
            border-radius: 20px;
            background: #f5f5f5;
            width: 600px;
            padding: 20px;
            transition: border 0.50s ease;
            border: 2px solid transparent;
        }
        .search-bar:focus-within {
            border: 2px solid black;
        }
        .search-bar-input {
            font-size: 20px;
            font-family: 'Roboto';
            color: #333333;
            padding-left: 10px;
            outline: none;
            border: none;
            background: transparent;
            width: 550px;
        }
        .search-bar::placeholder {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }
        .search-circle {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 34px; 
            height: 35px; 
            border-radius: 50%; 
            padding: 10px; 
            background-color: #849573;
        }
        .search-circle i {
            font-size: 20px; 
            color: white; 
        }
        .spacer {
            flex-grow: 1; /* Spacer akan mengambil semua ruang yang tersisa */
        }
        .user-action {
            display: flex;
            align-items: center;
            font-size: 30px;
            padding-right: 70px;
            gap: 25px;
        }
        .menu {
            background-color: #f5f5f5;
            font-family: 'Roboto';
            display: flex;
            justify-content: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            display: inline-block;
            position: relative;
        }
        ul li a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 20px 50px;
            text-align: center;
        }
        ul li ul.dropdown {
            position: absolute;
            display: none;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        ul li:hover ul.dropdown {
            display: block;
        }
        ul li ul.dropdown li {
            display: block;
        }
        ul li ul.dropdown li a {
            padding: 10px 15px;
            text-align: left;
            white-space: nowrap;
        }
        ul li ul.dropdown li a img {
            vertical-align: middle;
            width: 80px;
        }
        .footer {
            margin-top: 50px;
            background-color: #809671;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 20px;
            height: 200px;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
        }
        .petshop-info {
            display: flex;
            align-items: center;
        }
        .logo {
            width: 400px;
            height: auto;
            margin-right: 20px;
        }
        .text-info h1 {
            font-size: 24px;
            color: #fff;
            font-weight: bold;
        }
        .text-info p {
            font-size: 14px;
            color: #fff;
            margin-top: 5px;
        }
        .follow-us {
            text-align: right;
            padding-right: 100px;
        }
        .follow-us h2 {
            font-size: 40px;
            color: #fff;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .social-icons i {
            width: 60px;
            height: auto;
            margin: 0 10px;
        }
        .cat-left {
            position: absolute;
            left: 10px;
            bottom: 0;
            width: 200px;
        }
        .cat-right {
            position: absolute;
            right: 10px;
            bottom: 0;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="footage">
        <a href="{{ url('testing') }}" target="_blank">
            <button>
                <i class="bi bi-geo-alt"></i>
                Lokasi Toko Terdekat
            </button>
        </a>
        <a onclick="location.href='{{ url('selesai') }}'" target="_blank">
            <button>
                <i class="bi bi-truck"></i>
                Order Tracking
            </button>
        </a>
        <p class="hello">Hello pet Lovers!</p>
    </div>
    <header>
        <div class="logo">
            <a href="{{ url('Home') }}">
                <img src="{{asset('/images/logonama.png')}}" alt="Logo Atma Petshop"/>
            </a>
        </div>
        <div class="spacer"></div>
        <div class="search-bar">
            <input class="search-bar-input" type="search" placeholder="Cari produk">
            <div class="search-circle">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="user-action">
            <a onclick="location.href='{{ url('profile') }}'" >
                <i class="bi bi-person" style="color: white"></i>
            </a>
            <a href="<?php echo '-'; ?>" target="_blank">
                <i class="bi bi-heart" style="color: white"></i>
            </a>
            <a onclick="location.href='{{ url('cart') }}'">
                <i class="bi bi-cart" style="color: white"></i>
            </a>
        </div>
    </header>
    
    <div class="menu">
            <ul>
                <li>
                    <a href="<?php echo '-'; ?>" target="_blank">Hewan &#x25BC</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('kucing') }}" target="_blank">Kucing</a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank">Anjing</a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank">Hewan Kecil</a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank">Reptil</a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank">Unggas</a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank">Ikan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo '-'; ?>" target="_blank">Brand &#x25BC</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo '-'; ?>" target="_blank"><img src="images/royalcanin.png" alt="royal canin"></a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank"><img src="images/whiskas.png" alt="royal canin"></a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank"><img src="images/purina.png" alt="royal canin"></a></li>
                        <li><a href="<?php echo '-'; ?>" target="_blank"><img src="images/pedigree.png" alt="royal canin"></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo '-'; ?>" target="_blank">About</a></li>
            </ul>
    </div>


    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="petshop-info">
                <div class="text-info">
                <img src="images/logonama.png" alt="Atma Petshop Logo" class="logo">
                    <p>Jl. Babarsari No.43, Janti, Caturtunggal, Kec. Depok,<br>
                    Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                </div>
            </div>
            <div class="follow-us">
                <h2>FOLLOW US ON :</h2>
                <div class="social-icons">
                    <i class="bi bi-instagram" style="font-size: 50px;"></i>                 
                    <i class="bi bi-facebook" style="font-size: 50px;"></i>
                    <i class="bi bi-twitter" style="font-size: 50px;"></i>
                    <i class="bi bi-youtube" style="font-size: 50px;"></i>
                </div>
            </div>
        </div>
        <img src="images/kucing_kiri.png" alt="Kucing kiri" class="cat-left">
        <img src="images/kucing_kanan.png" alt="Kucing kanan" class="cat-right">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
