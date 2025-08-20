<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css')}}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="confirm_content">
            <div class="confirm_heading">
                <h2>Confirm</h2>
            </div>
            <form class="form" action="/thanks" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>お名前</th>
                            <td>
                                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                            </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                            <td>
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                            </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                            <td><input type="hidden" name="email" value="{{ $contact['email'] }}" readonly></td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td><input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" readonly></td>
                        <td><input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" readonly></td>
                        <td><input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" readonly></td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td><input type="hidden" name="address" value="{{ $contact['address'] }}" readonly></td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td><input type="hidden" name="building" value="{{ $contact['building'] }}" readonly></td>
                    </tr>
                    <tr>
                        <th>お問い合わせ種別</th>
                        <td><input type="hidden" name="type" value="{{ $contact['type'] }}" readonly></td>
                    </tr>
                    <tr>
                        <th>内容</th>
                        <td><input type="hidden" name="content" value="{{ $contact['content'] }}" readonly></td>
                    </tr>
                </table>

                <button type="submit" name="action" value="submit">送信</button>
                <button type="button" onclick="history.back()">修正</button>
            </form>
        </div>
    </main>


</body>
</html>