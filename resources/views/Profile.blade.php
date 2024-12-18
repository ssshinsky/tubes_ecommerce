<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>

        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
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
                <a href="{{ url('Home') }}" target="_self">
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

                <button class="logout" id="logoutButton" style="text-decoration: none; color: white; background-color: red;">
                    Logout
                </button>
            </aside>

            <div class="profile-section">
                <h2>Profil Saya</h2>
                <div class="profile-card">
                    

                    <!-- <form id="updateProfilePictureForm" enctype="multipart/form-data">
                        @csrf
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                        <button type="submit">Upload Picture</button>
                    </form>

                    <div id="picSuccessMessage" style="color: green; display: none;">
                        Profile picture updated successfully.
                    </div>

                    <div id="picErrorMessage" style="color: red; display: none;">
                        Error updating profile picture.
                    </div> -->
                    
                    <form id="updateProfileForm" method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>

                        <label for="phone">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>

                        <label for="address">Alamat</label>
                        <input type="text" id="address" name="address" required>

                        <button type="submit">Simpan</button>
                    </form>

                    <div id="successMessage" style="color: green; display: none;">
                        Profile updated successfully.
                    </div>

                    <div id="errorMessage" style="color: red; display: none;">
                        Error updating profile.
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function(){
                            const token = localStorage.getItem('authToken');

                            if(!token){
                                Toastify({
                                    text: `<i class="fa-solid fa-exclamation-triangle"></i> You are not authenticated. Please log in.`,
                                    backgroundColor: "#dc3545",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    escapeMarkup: false,
                                }).showToast();

                                window.location.href = '/login';
                            }

                            fetch('/api/profile', {
                                method: 'GET',
                                headers: {
                                    'Authorization': 'Bearer ' + token,
                                    'Accept': 'application/json',
                                },
                            })
                            .then(response => {
                                if(!response.ok){
                                    throw new Error('Failed to fetch profile. Please log in again.');
                                }
                                return response.json();
                            })
                            .then(data => {
                                document.getElementById('username').value = data.nama;
                                document.getElementById('phone').value = data.no_telp;
                                document.getElementById('email').value = data.email;
                                document.getElementById('address').value = data.alamat;
                            })
                            .catch(error => {
                                Toastify({
                                    text: `<i class="fa-solid fa-exclamation-triangle"></i> Error: ${error.message}`,
                                    backgroundColor: "#dc3545",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    escapeMarkup: false,
                                }).showToast();
                                window.location.href = '/login';
                            });

                            document.getElementById('updateProfileForm').addEventListener('submit', function(e){
                                e.preventDefault();

                                const formData = new FormData(this);
                                const data = {};
                                formData.forEach((value, key) => {
                                    data[key] = value;
                                });

                                fetch('/api/profile/update', {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'Bearer ' + token,
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify(data),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if(data.message === 'Profile updated successfully'){
                                        Toastify({
                                            text: `<i class="fa-solid fa-check-circle"></i> Profile updated successfully.`,
                                            backgroundColor: "#28a745",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            escapeMarkup: false,
                                        }).showToast();
                                    }else{
                                        throw new Error('Failed to update profile.');
                                    }
                                })
                                .catch(error => {
                                    Toastify({
                                        text: `<i class="fa-solid fa-exclamation-circle"></i> Error: ${error.message}`,
                                        backgroundColor: "#dc3545",
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        escapeMarkup: false,
                                    }).showToast();
                                });
                            });

                            document.getElementById('updateProfilePictureForm').addEventListener('submit', function(e){
                                e.preventDefault();

                                const formData = new FormData();
                                const fileInput = document.getElementById('profile_picture');
                                formData.append('profile_picture', fileInput.files[0]);

                                fetch('/api/profile/picture/update', {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'Bearer ' + token,
                                        'Accept': 'application/json',
                                    },
                                    body: formData,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if(data.message){
                                        Toastify({
                                            text: `<i class="fa-solid fa-check-circle"></i> Profile picture updated successfully.`,
                                            backgroundColor: "#28a745",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            escapeMarkup: false,
                                        }).showToast();

                                        const profileImage = document.querySelector('.profile-picture img');
                                        profileImage.src = data.profile_picture + '?' + new Date().getTime();

                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 1500);
                                    }else{
                                        throw new Error('Failed to update profile picture.');
                                    }
                                })
                                .catch(error => {
                                    Toastify({
                                        text: `<i class="fa-solid fa-exclamation-circle"></i> Error: ${error.message}`,
                                        backgroundColor: "#dc3545",
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        escapeMarkup: false,
                                    }).showToast();
                                });
                            });

                        });

                        document.getElementById('logoutButton').addEventListener('click', function (){
                            const token = localStorage.getItem('authToken');

                            fetch('/api/logout', {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'Bearer ' + token,
                                    'Accept': 'application/json',
                                },
                            })
                            .then(response => {
                                if(response.ok){
                                    localStorage.removeItem('authToken');
                                    Toastify({
                                        text: `<i class="fa-solid fa-check-circle"></i> You have successfully logged out.`,
                                        backgroundColor: "#28a745",
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        escapeMarkup: false,
                                    }).showToast();

                                    setTimeout(() => {
                                        window.location.href = '/login';
                                    }, 3000);
                                }else{
                                    throw new Error('Failed to log out.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error.message);
                                Toastify({
                                    text: `<i class="fa-solid fa-exclamation-triangle"></i> Error: Unable to log out.`,
                                    backgroundColor: "#dc3545",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    escapeMarkup: false,
                                }).showToast();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>