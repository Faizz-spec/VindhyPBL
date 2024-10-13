<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: #f1f5f9;
}
.login-form {
    max-width: 30%;
    width: 100%;
    background: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 1px 3px 8px rgba(49,49,49,.1);
}.input-form {
    margin-bottom: 1rem;
}.input-form label {
    display: block;
    margin-bottom: 6px;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
}.input-form input {
    width: 100%;
    padding: 10px 12px;
    border-radius: 5px;
    box-sizing: border-box;
    border: 1px solid #cbd5e1;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
}.button {
    display: flex;
    justify-content: space-between;
    align-items: center;
}.button button {
    padding: 8px 12px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    box-shadow: 0px 0px 2px 0px #000;
}.brand {
    display: flex;
    align-items: end;
    margin-bottom: 30px;
    justify-content: center;
}.logo {
    width: 50px;
    overflow: hidden;
    position: relative;
    display: block;
    padding-top: 53px;
    margin-right: 5px;
}
.logo img {
    position: absolute;
    top: 0;
    width: 100%;
}
.brand-name h1 {
    font-size: 24px;
    line-height: 20px;
    margin: 0 0 5px 0;
}.brand-name span {
    font-size: 12px;
    font-weight: 500;
    line-height: normal;
}
@media (max-width: 640px) {
    .login-form {
    max-width: 60%;
}
}
@media (max-width: 640px) {
    .login-form {
    max-width: 80%;
}
}
    </style>
</head>
<body>
    <div class='login-form'>
        <div class="brand">
            <div class="logo">
                <img src="{{ asset('assets/images/brand/logo') }}/vhindy.png" alt="logo">
            </div>
            <div class="brand-name">
                <h1>Vhindy</h1>
                <span>Service monitor app</span>
            </div>
        </div>
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div class="input-form">
                <label for="email">Email</label>
                <input id="email" class="input-email" type="email" name="email" required autofocus autocomplete="username" />
            </div>
    
            <!-- Password -->
            <div class="input-form">
                <label for="password">Password</label>
    
                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
    
    
            <div class="button">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>
