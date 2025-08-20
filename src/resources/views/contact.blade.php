@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css')}}">
@endsection

@section('content')
<div class="contact-form">
    <h2 class="contact-form_heading content_heading">Contact</h2>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name')}}" />
            @error('first_name')
                <p class="error">{{ $message }}</p>
            @enderror

            <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name')}}" />
            @error('last_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <label><input type="radio" name="gender" value="男性" {{ old('gender') === '男性' ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="その他" {{ old('gender') === 'その他' ? 'checked' : '' }}> その他</label>
            @error('gender')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('email')}}" />
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address')}}" />
            @error('address')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">建物名</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{ old('building')}}" />
            @error('building')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <select name="type" required>
                <option value="">選択してください</option>
                <option value="商品のお届けについて" {{ old('type') == '商品のお届けについて' ? 'selected' : '' }}>
                商品のお届けについて
                </option>
                <option value="商品の交換について" {{ old('type') == '商品の交換について' ? 'selected' : '' }}>
                商品の交換について
                </option>
                <option value="商品トラブル" {{ old('type') == '商品トラブル' ? 'selected' : '' }}>
                商品トラブル
                </option>
                <option value="ショップへのお問い合わせ" {{ old('type') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>
                ショップへのお問い合わせ
                </option>
                <option value="その他" {{ old('type') == 'その他' ? 'selected' : '' }}>
                その他
                </option>
        </select>
        @error('type')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <textarea
                name="content"
                placeholder="お問い合わせ内容をご記載ください"
                required
            >{{ old('content') }}</textarea>
        </div>
        @error('content')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>


    <div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
    </div>
</form>

    </div>
  </main>
</body>

</html>
