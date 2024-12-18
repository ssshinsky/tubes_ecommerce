<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login and Register</title>

        <link rel="stylesheet" href="{{ asset('css/loginAndRegister.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
    </head>

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form id="registerForm" method="POST" action="{{ url('/api/register') }}">
                    @csrf
                    <h1 class="title">Create Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <span class="title">or use your email account</span>
                    <input type="text" name="nama" placeholder="nama" required>
                    <input type="number" name="no_telp" placeholder="Nomor Telepon" required>
                    <input type="text" name="alamat" placeholder="Alamat" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>Register</button>
                </form>
            </div>  
            
            <div class="form-container sign-in">
                <form id="loginForm" method="POST" action="{{ url('/api/login') }}">
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
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <a class="title" href="#">Forget Your Password?</a>
                    <button type="submit">Log in</button>
                </form>
            </div>

            <script>
                function getHeaders(){
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    return{
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    };
                }

                document.getElementById('registerForm').addEventListener('submit', function(e){
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
                        if(data.message === 'Register Success'){
                            Toastify({
                                text: `<i class="fa-solid fa-check-circle"></i> Registration successful!`,
                                backgroundColor: "#28a745",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                escapeMarkup: false,
                            }).showToast();

                            this.reset();
                            setTimeout(() => {
                                window.location.href = '/loginAndRegister';
                            }, 3000);
                        }else{
                            Toastify({
                                text: `<i class="fa-solid fa-exclamation-circle"></i> Registration failed: ${data.message}`,
                                backgroundColor: "#dc3545",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                escapeMarkup: false,
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Toastify({
                            text: `<i class="fa-solid fa-exclamation-triangle"></i> Registration failed: ${error.message}`,
                            backgroundColor: "#dc3545",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            escapeMarkup: false,
                        }).showToast();
                    });
                });

                document.getElementById('loginForm').addEventListener('submit', function(e){
                    e.preventDefault();

                    const formData = {
                        email: document.getElementById('email').value,
                        password: document.getElementById('password').value
                    };

                    fetch('/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            password: document.getElementById('password').value
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.message === 'Admin Authenticated'){
                            localStorage.setItem('authToken', data.access_token);
                            Toastify({
                                text: `<i class="fa-solid fa-check-circle"></i> Welcome Admin!`,
                                backgroundColor: "#28a745",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                escapeMarkup: false,
                            }).showToast();

                            setTimeout(() => { 
                                window.location.href = data.redirect;
                            }, 3000);
                        }else if(data.message === 'Authenticated'){
                            localStorage.setItem('authToken', data.access_token);
                            Toastify({
                                text: `<i class="fa-solid fa-check-circle"></i> Login Successful!`,
                                backgroundColor: "#28a745",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                escapeMarkup: false,
                            }).showToast();

                            setTimeout(() => { 
                                window.location.href = data.redirect;
                            }, 3000);
                        }else{
                            throw new Error(data.message);
                        }
                    })
                    .catch(error => {
                        Toastify({
                            text: `<i class="fa-solid fa-exclamation-triangle"></i> ${error.message}`,
                            backgroundColor: "#dc3545",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            escapeMarkup: false,
                        }).showToast();
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