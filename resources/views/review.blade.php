@extends('layouts.template')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Review Pesanan</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #B3B792;">
                <div class="card-body">
                    <h4 class="card-title">Makanan Anjing Royal Canin untuk anjing kecil</h4>
                    <p class="card-text">Harga: Rp 400.000</p>

                    <div class="mb-4">
                        <h5>Beri Rating</h5>
                        <div class="rating">
                            <i class="fas fa-star fa-2x" data-value="1" onclick="rateProduct(1)"></i>
                            <i class="fas fa-star fa-2x" data-value="2" onclick="rateProduct(2)"></i>
                            <i class="fas fa-star fa-2x" data-value="3" onclick="rateProduct(3)"></i>
                            <i class="fas fa-star fa-2x" data-value="4" onclick="rateProduct(4)"></i>
                            <i class="fas fa-star fa-2x" data-value="5" onclick="rateProduct(5)"></i>
                        </div>
                        <input  id="rating-value" value="0">
                    </div>

                    <div class="mb-4">
                        <h5>Tulis Ulasan</h5>
                        <textarea id="review-text" class="form-control" rows="5" placeholder="Bagikan pengalaman Anda dengan produk ini"></textarea>
                    </div>

                    <button class="btn btn-success btn-animate" onclick="submitReview()" style="
                        border-radius: 20px;
                        padding: 10px 30px;
                        background-color: #849573;
                    ">Kirim Review</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function rateProduct(rating) {
        document.getElementById('rating-value').value = rating;

        var stars = document.querySelectorAll('.rating i');
        stars.forEach(star => {
            star.classList.remove('text-warning');
            star.classList.add('text-muted');
        });
        //tidakk bisaaa 
        for (var i = 0; i < rating; i++) {
            stars[i].classList.remove('text-muted');
            stars[i].classList.add('text-warning');
        }
    }

    function submitReview() {
        var rating = document.getElementById('rating-value').value;
        var review = document.getElementById('review-text').value;

        if (rating === "0") {
            alert('Silakan beri rating terlebih dahulu.');
            return;
        }

        if (review.trim() === "") {
            alert('Silakan tulis ulasan Anda.');
            return;
        }

        alert('Review telah dikirim! Terima kasih.');
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

    .rating i {
        cursor: pointer;
        color: #ccc;
    }
    .rating i.text-warning {
        color: #f0c420;
    }
</style>

@endsection
