<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PiGly')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-left">
            <h1 class="logo">PiGly</h1>
        </div>
        <div class="header-right">
            <a href="{{ route('goal.edit') }}" class="btn">目標体重設定</a>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-logout">ログアウト</button>
            </form>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>


