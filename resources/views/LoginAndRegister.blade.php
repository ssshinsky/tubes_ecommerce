<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login and Register</title>

        <link rel="stylesheet" href="{{ asset('css/loginAndRegister.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form id="registerForm" method="POST">
                    @csrf
                    <h1 class="title">Create Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <span class="title">or use your email account</span>
                    <input type="text" name="nama" placeholder="Nama" required>
                    <input type="number" name="no_telp" placeholder="Nomor Telepon" required>
                    <input type="text" name="alamat" placeholder="Alamat" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>
                         Register
                    </button>
                </form>
            </div>  
            
            <div class="form-container sign-in">
                <form id="loginForm">
                    @csrf
                    <h1 class="title">Login</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="{{ url('dashboard') }}" class="icon"><i class="fa-solid fa-pen"></i></a>
                    </div>
                    <span class="title">or use your email account</span>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <a class="title" href="#">Forget Your Password?</a>
                    <button>Log in</button>
                </form>
            </div>

            <script>
                function getHeaders() {
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    return {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    };
                }

                // Script untuk handle submit 
                document.getElementById('registerForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let data = {};

                    formData.forEach((value, key) => {
                        data[key] = value;
                    });

                    fetch('/api/register', {
                        method: 'POST',
                        headers: getHeaders(),
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message); 
                        if (data.message.includes('Registrasi berhasil')) {
                            this.reset();
                            window.location.href = '/login'; 
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Registrasi gagal: ' + error.message); 
                    });
                });

                // Script untuk handle submit 
                document.getElementById('loginForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let data = {};

                    formData.forEach((value, key) => {
                        data[key] = value;
                    });

                    fetch('/api/login', {
                        method: 'POST',
                        headers: getHeaders(),
                        body: JSON.stringify(data),
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Username atau password salah, silahkan coba lagi');
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);  
                        if (data.message) {
                            window.location.href = '/Home'; 
                        } else {
                            alert(data.message); 
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message); 
                    });
                });
            </script>



            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <img class="logo" src="{{ asset('images/logonama.png') }}" alt="">
                        <p>Already have an account?</p>
                        <button class="hidden" id="login">Login</button>
                    </div>
                    
                    <div class="toggle-panel toggle-right">
                        <img class="logo" src="{{ asset('images/logonama.png') }}" alt="">
                        <p>Don't have an account yet?</p>
                        <button class="hidden" id="register">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const container = document.getElementById('container');
            const registerBtn = document.getElementById('register');
            const loginBtn = document.getElementById('login');

            registerBtn.addEventListener('click', () => {
                container.classList.add("active");
            });

            loginBtn.addEventListener('click', () => {
                container.classList.remove("active");
            });
        </script>
    </body>
</html>