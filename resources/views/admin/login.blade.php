<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyil Admin -- Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="input-group">
                <label for="email">Username</label>
                <input type="text" name="username" id="email" placeholder="Your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>
            </div>
            <button type="submit">Login</button>
            @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    </div>
    @endif
        </form>
    </div>
    
</body>
</html>
