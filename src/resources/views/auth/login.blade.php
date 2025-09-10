<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly - ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="logo">PiGly</h1>
            <h2 class="title">ログイン</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf 
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">"パスワード"</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="パスワードを入力">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="login-button">ログイン</button>
                </div>
            </form>

            <a href="{{ route('register.step1')}}" class="register-link">アカウント作成はこちら</a>
        </div>
    </div>
</body>
</html>