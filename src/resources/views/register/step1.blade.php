<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly - アカウント登録</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="logo">PiGly</h1>
            <h2 class="title">新規会員登録</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf 
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="name" value="{{ old('name')}}" placeholder="名前を入力">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">"メールアドレス"</label>
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
                    <button type="submit" class="register-button">次に進む</button>
                </div>
            </form>

            <a href="{{ route('login') }}" class="login-link">ログインはこちら</a>
        </div>
    </div>
</body>
</html>

