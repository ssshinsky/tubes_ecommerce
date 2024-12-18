@extends('layouts.template')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="/images/logo2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Atma Petshop</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: poppins;
            height: 100%;
            margin: 0;
            background-color: #E5D2B8;
        }
        .container {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            position: relative;
        }
        .carousel-item img {
            padding-top: 5px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            transform-origin: center
        }
        .section{
            margin-top: 20px;
            align-items: center;
            padding: 20px;
            background-color: #E4E1D8;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .text{
            width: 350px;
        }
        .text2{
            width: 500px;
        }
        .text3{
            width: 480px;
        }
        .card img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .card {
            width: 215px;
            height: 250px;
            background-color: #E5E0D8;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px solid black;
        }
        .card a{
            text-decoration: none;
            color: black;
        }
        .card h3 {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        .container1 {
            display: flex;
            justify-content: left;
            align-items: center;
            background-color: #E5E0D8;
        }
        .card-container {
            display: flex;
            gap: 20px;
            background-color: #E5E0D8;
            padding: 20px;
            cursor: pointer;
        }
        .card-brand img{
            width: 200px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding-left: 20px;
            cursor: pointer;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .products-khusus {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .products-khusus a {
            text-decoration: none;
        }
        .products a {
            text-decoration: none;
        }
        .products-promo-row {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .product-card {
            width: 280px;
            background-color: #E5E0D8;
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .product-card h2 {
            color: #8B4513;
            font-size: 25px;
            font-weight: bold; 
            margin-bottom: 5px;
        }
        .product-card img {
            width: 100%;
            max-width: 150px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .product-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        .promo{
            display: flex;
        }
        .promo-container {
            flex: 1;
            position: relative;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 150px;
        }
        .promosi{
            width: 600px;
            margin-left: 50px;
        }
        .promo-image {
            width: 500px;
            object-fit: cover;
            border-radius: 10px;
        }
        .recomendation{
            display: flex;
            margin-top: 20px;
            align-items: center;
            justify-content: center;
            background-color: #E4E1D8;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px 10px 0px 0px;
        }
        .line{
            background-color: #809671;
            font-size: 20px;
            border-radius: 0px 0px 10px 10px;
        }
        .text4{
            width: 400px;
        }
        .lainnya{
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #E4E1D8;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px 20px;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container content-wrapper">
        <div id="promotionCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
            <img src="images/images1.png" class="d-block w-100" alt="promotion 1">
            </div>
            <div class="carousel-item">
            <img src="images/images2.png" class="d-block w-100" alt="promotion 2">
            </div>
            <div class="carousel-item">
            <img src="images/images3.png" class="d-block w-100" alt="promotion 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#promotionCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promotionCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>

        <div class="section">
            <img src="images/hewan_peliharaan.png" class="text" alt="gambar tulisan hewan peliharaan">
            <div class="container1">
                <div class="card-container">
                    <div class="card">
                        <a href="{{ url('kucing') }}">
                            <img src="images/Frame5.png" alt="gambar kucing">
                            <h3>Kucing</h3>
                        </a>
                    </div>
                    <div class="card">
                        <img src="images/Frame4.png" alt="gambar anjing">
                        <h3>Anjing</h3>
                    </div>
                    <div class="card">
                        <img src="images/Frame6.png" alt="gambar Hewan Kecil">
                        <h3>Hewan Kecil</h3>
                    </div>
                    <div class="card">
                        <img src="images/Frame7.png" alt="gambar Reptil">
                        <h3>Reptil</h3>
                    </div>
                    <div class="card">
                        <img src="images/Frame8.png" alt="gamhbar Unggas">
                        <h3>Unggas</h3>
                    </div>
                    <div class="card">
                        <img src="images/Frame9.png" alt="gamhbar Ikan">
                        <h3>Ikan</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <img src="images/pilih_brand.png" class="text2" alt="gambar tulisan pilih brand favorit anda">
            <div class="container1">
                <div class="card-brand">
                    <img src="images/royalcanin.png" alt="gambar royalcanin">
                </div>
                <div class="card-brand">
                    <img src="images/whiskas.png" alt="gambar whiskas">
                </div>
                <div class="card-brand">
                    <img src="images/purina.png" alt="gambar purina">
                </div>
                <div class="card-brand">
                    <img src="images/pedigree.png" alt="gambar pedigree">
                </div>
                <div class="card-brand">
                    <img src="images/friskies.png" alt="gambar friskies">
                </div>
                <div class="card-brand">
                    <img src="images/Hills.png" alt="gambar Hills">
                </div>
                <div class="card-brand">
                    <img src="images/meo.png" alt="gambar meo">
                </div>
            </div>
        </div>

        <div class="section">
            <img src="images/terlaris_untuk_kucing.png" class="text3" alt="text terlaris untuk kucing">
            <div class="section1">
                <div class="products-promo-row">
                <div class="products-khusus">
                    @if($produk->isNotEmpty())
                        @foreach ($produk as $item)
                            @if($item->kategori == 'kucing')
                                <a href="{{ url('/beli', ['id' => $item->id]) }}">
                                    <div class='product-card'>
                                        @if($item->gambar_produk)
                                            <img src="{{ $item->gambar_produk }}" alt="{{ $item->nama }}" width="100">
                                            @else
                                            -
                                        @endif
                                        <h2>Rp {{ number_format($item->harga, 0, ',', '.') }}</h2>
                                        <p>{{ $item->nama }}</p>
                                        <p>⭐⭐⭐⭐⭐ reviews</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @else
                        <p>Tidak ada produk yang tersedia.</p>
                    @endif
                </div>

                    <div class="promo-container">
                        <img src="images/promosi_kucing.png" class="promo-image" alt="foto promosi kucing">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="recomendation">
            <img src="images/rekomendasi.png" class="text4" alt="text rekomendasi">
        </div>

        <p class="line"> .</p>
            <div class="products">
                @if($produk->isNotEmpty())
                    @foreach ($produk as $item)
                    <a href="{{ url('/beli', ['id' => $item->id]) }}">
                        <div class='product-card'>
                            @if($item->gambar_produk)
                                <img src="{{ $item->gambar_produk }}" alt="{{ $item->nama }}" width="100">
                                @else
                                -
                            @endif
                            
                            <h2>Rp {{ number_format($item->harga, 0, ',', '.') }}</h2>
                            <p>{{ $item->nama }}</p>
                            <p>⭐⭐⭐⭐⭐ reviews</p>
                        </div>
                    </a>
                    @endforeach
                @else
                    <p>Tidak ada produk yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="center-container">
        <div class="lainnya">
            <img src="images/lainnya.png" class="text" alt="text lainnya">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection
