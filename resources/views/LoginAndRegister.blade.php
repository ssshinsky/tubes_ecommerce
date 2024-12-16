<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Register</title>

        <link rel="stylesheet" href="{{ asset('css/loginAndRegister.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form>
                    <h1 class="title">Create Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <span class="title">or use your email account</span>
                    <input type="text" placeholder="Nama">
                    <input type="number" placeholder="Nomor Telepon">
                    <input type="text" placeholder="Alamat">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button><a href="{{ url('Home') }}" style="color: #E5E0D8">Register</a></button>
                </form>
            </div>
            
            <div class="form-container sign-in">
                <form>
                    <h1 class="title">Login</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="{{ url('dashboard') }}" class="icon"><i class="fa-solid fa-pen"></i></a>
                    </div>

                    <span class="title">or use your email account</span>
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <a class="title" href="#">Forget Your Password?</a>
                    <button><a href="{{ url('Home') }}" style="color: #E5E0D8">Login</a></button>
                </form>
            </div>
            
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