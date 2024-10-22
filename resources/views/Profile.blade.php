<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>

        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <div class="footage">
            <a href="{{ url('testing') }}" target="_blank">
                <button>
                    <i class="fa-solid fa-location-dot"></i>
                    Lokasi Toko Terdekat
                </button>
            </a>

            <a href="<?php echo '-'; ?>" target="_blank">
                <button>
                    <i class="fa-solid fa-truck"></i>
                    Order Tracking
                </button>
            </a>

            <p class="hello">Hello pet Lovers!</p>
        </div>

        <header>
            <div class="logo">
                <a href="{{ url('Home') }}" target="_blank">
                    <img src="{{asset('/images/logonama.png')}}" alt="Logo Atma Pethsop"/>
                </a>
            </div>
            
            <div class="spacer"></div>
            
            <div class="search-bar">
                <input class="search-bar-input" type="search" placeholder="Cari produk">
                    <div class="search-circle">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
            </div>
            
            <div class="spacer"></div>
            
            <div class="user-action">
                <a href="{{ url('profile') }}">
                    <i class="fa-regular fa-user" style="color: white"></i>
                </a>
                
                <a href="<?php echo '-'; ?>" target="_blank">
                    <i class="fa-regular fa-heart" style="color: white"></i>
                </a>

                <a href="{{ url('cart') }}">
                    <i class="fa-solid fa-cart-shopping" style="color: white"></i>
                </a>
            </div>
        </header>

        <div class="container">
            <aside class="sidebar">
                <div>
                    <ul>
                        <strong><span>Pengaturan Akun</span></strong>
                        <li>
                            <a class="active" href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-user"></i> Profil Saya</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-paper-plane"></i> Ubah kata Sandi</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-heart"></i> Favorites</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-trash-can"></i> Riwayat</a>
                        </li>
                    </ul>
                </div>
            
                <div class="labels">
                    <ul>
                        <strong><span>Beranda</span></strong>
                        <li>
                            <a href="{{ url('Home') }}" style="text-decoration: none; color: black;"><i class="fa-solid fa-house"></i> Beranda</a>
                        </li>
                        
                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-folder"></i> Label</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-folder"></i> Label</a>
                        </li>
                    </ul>
                </div>

                <div class="labels">
                    <ul>
                        <strong><span>Label</span></strong>
                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-folder"></i> Label</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-folder"></i> Label</a>
                        </li>

                        <li>
                            <a href="#" style="text-decoration: none; color: black;"><i class="fa-regular fa-folder"></i> Label</a>
                        </li>
                    </ul>
                </div>

                <button class="logout"><a href="{{ url('loginAndRegister') }}" style="text-decoration: none; color: white;">Logout</a></button>
            </aside>

            <div class="profile-section">
                <h2>Profil Saya</h2>
                <div class="profile-card">
                    <div class="profile-picture">
                        <img src="{{ asset('images/ProfilePic.png') }}" alt="Profile Picture">
                    </div>

                    <button class="change-picture">Ubah Gambar</button>
                    
                    <form>
                        <label for="username">Username</label>
                        <input type="text" id="username" value="Renaldy">

                        <label for="phone">Nomor Telepon</label>
                        <input type="text" id="phone" value="081234567890">
                    
                        <label for="email">Email</label>
                        <input type="email" id="email" value="renaldyimut@gmail.com">
                    
                        <label for="address">Alamat</label>
                        <input type="text" id="address" value="jl. babarsari no. 86">
                    
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>