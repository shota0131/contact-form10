<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly - 新規会員登録</title>
    <link rel="stylesheet" href="{{ asset('css/register-step2.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="logo">PiGly</h1>
            <h2 class="title">新規会員登録</title>
            <p class="subtitle">STEP2 体重データの入力</p>

            <form method="POST" action="{{ route('register.storeStep2') }}">
                @csrf 
                <div class="form-group">
                    <label for="current_weight">現在の体重</label>
                    <input type="number" id="current_weight" name="current_weight" step="0.1" placeholder="現在の体重を入力" required> kg
                    @error('current_weight')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="goal_weight">目標の体重</label>
                    <input type="number" id="goal_weight" name="goal_weight" step="0.1" placeholder="目標の体重を入力" required> kg 
                    @error('goal_weight')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="register-button">アカウント作成</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>