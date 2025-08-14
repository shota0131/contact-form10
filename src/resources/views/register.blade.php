<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FashionableLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>

<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="{{ url('/') }}">
            FashionablyLate
        </a>
        <nav class="header__nav">
            <a href="{{ route('login') }}" class="header__login-button">ログイン</a>
        </nav>
    </div>
</header>

<div class="form__content">
    <div class="form__heading">
        <h2>Register</h2>
    </div>

    {{-- エラー全体表示 --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form__group">
            <label class="form__label--item" for="name">お名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎" />
            <div class="form__error">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <label class="form__label--item" for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" />
            <div class="form__error">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <label class="form__label--item" for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例：coachtech1106" />
            <div class="form__error">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>

    <div class="register__link">
        <a class="register__button-submit" href="/admin">登録はこちら</a>
    </div>
</div>

</body>
</html>

