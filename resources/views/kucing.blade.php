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
        .footage{
            background-color: #f5f5f5;
            display: flex;
            font-family: 'Roboto';
        }
        button{
            color: #333333;
            background: transparent;
            outline: none;
            border: none;
            cursor: pointer;
            padding-left: 50px;
            padding-top: 10px;
            font-size: 15px;
        }
        button:hover{
            color: #849573;
        }
        .hello{
            margin-left: auto;
            margin-right: 250px;
            padding-top: 10px;
            font-size: 15px;
        }
        header{
            background-color: #849573;
            padding-top: 30px;
            padding-bottom: 20px;
            display:flex;
            justify-content: center;
        }
        .logo img{
            width: 350px;
            padding-right: 50px;
            padding-left: 50px;
            margin-top: -20px;
        }
        .search-bar{
            display:flex;
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
        .search-bar:focus-within{
            border: 2px solid black;
        }
        .search-bar-input{
            font-size: 20px;
            font-family: 'Roboto';
            color: #333333;
            padding-left: 10px;
            outline: none;
            border: none;
            background: transparent;
            width: 550px;
        }
        .search-bar::placeholder{
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
            flex-grow: 1;
        }
        .user-action{
            display: flex;
            align-items: center;
            font-size: 30px;
            padding-right: 70px;
            display: flex;
            gap: 25px;
        }
        .menu{
            background-color: #f5f5f5;
            font-family: 'Roboto';
            display:flex;
            justify-content: center;
        }
        ul{
            list-style: none;
            padding: 0px;
        }
        ul li{
            padding-top: 20px;
            display: inline-block;
            position: relative;
            z-index: 1;
        }
        ul li a{
            display: block;
            color:black;
            text-decoration: none;
            text-align: center;
            padding-left: 50px;
        }
        ul li ul.dropdown li{
            display: block; 
        }
        ul li ul.dropdown{
            width: 100%;
            background: #f5f5f5;
            position: absolute;
            display: none;
            border: 1px solid #ccc;
        }
        ul li ul.dropdown li a {
            display: block;
            color: black;
            text-decoration: none;
            text-align: left;
            padding: 10px 15px; 
            white-space: nowrap; 
            transition: background-color 0.3s ease;
        }
        ul li a:hover{
            background: #e5e0d8;
        }
        ul li:hover ul.dropdown{
            display: block;
        }
        ul li ul.dropdown li a img {
            width: 80px; 
            vertical-align: middle;
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
        .recomendation img{
            width: 200px;
        }
        .line{
            background-color: #809671;
            font-size: 20px;
            border-radius: 0px 0px 10px 10px;
        }
        .products {
            display: flex;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            margin-top: 30px;
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
            width: 242px;
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
            height: auto;
            margin-bottom: 10px;
        }
        .product-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        .pagination-container {
            display: flex;
            justify-content: center; 
            margin-top: 20px; 
        }
        .pagination {
            display: inline-block;
        }
        .pagination a, .pagination span {
            color: gray; 
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 0 4px;
            border-radius: 4px;
            font-size: 16px;
        }
        .pagination a.active {
            background-color: #809671;
            color: white;
            border-radius: 4px;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd; 
        }
    </style>
</head>
    <div class="container content-wrapper">
        <div class="recomendation">
            <img src="images/kucing.png" class="text4" alt="text kucing">
        </div>
        <p class="line"> .</p>  
            <div class="products">
<<<<<<< Updated upstream
                <?php
                $products = [
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                ];

                foreach ($products as $product) {
                    echo "
                    <a href='" . url('Home') . "' target='_blank'>
                        <div class='product-card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['price']}</h2>
                            <p>{$product['name']}</p>
                            <p>⭐⭐⭐⭐⭐ {$product['reviews']} reviews</p>
                        </div>
                    </a>
                    ";
                }
            ?>
=======
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
>>>>>>> Stashed changes
            </div>  
            <div class="products">
                <?php
                $products = [
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                ];

                foreach ($products as $product) {
                    echo "
                    <a href='" . url('Home') . "' target='_blank'>
                        <div class='product-card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['price']}</h2>
                            <p>{$product['name']}</p>
                            <p>⭐⭐⭐⭐⭐ {$product['reviews']} reviews</p>
                        </div>
                    </a>
                    ";
                }
            ?>
            </div>  
            <div class="products">
                <?php
                $products = [
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                ];

                foreach ($products as $product) {
                    echo "
                    <a href='" . url('Home') . "' target='_blank'>
                        <div class='product-card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['price']}</h2>
                            <p>{$product['name']}</p>
                            <p>⭐⭐⭐⭐⭐ {$product['reviews']} reviews</p>
                        </div>
                    </a>
                    ";
                }
            ?>
            </div>  
            <div class="products">
                <?php
                $products = [
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                ];

                foreach ($products as $product) {
                    echo "
                    <a href='" . url('Home') . "' target='_blank'>
                        <div class='product-card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['price']}</h2>
                            <p>{$product['name']}</p>
                            <p>⭐⭐⭐⭐⭐ {$product['reviews']} reviews</p>
                        </div>
                    </a>
                    ";
                }
            ?>
            </div>  
            <div class="products">
                <?php
                $products = [
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                    ["name" => "Beauty cat food 1 kg makanan kucing hair skin", "price" => "Rp 27.231", "reviews" => 110, "image" => "images/beauty.png"],
                ];

                foreach ($products as $product) {
                    echo "
                    <a href='" . url('Home') . "' target='_blank'>
                        <div class='product-card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['price']}</h2>
                            <p>{$product['name']}</p>
                            <p>⭐⭐⭐⭐⭐ {$product['reviews']} reviews</p>
                        </div>
                    </a>
                    ";
                }
            ?>
            </div> 

            <div class="pagination-container">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <span>...</span>
                    <a href="#">&raquo;</a>
                </div>
            </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection