@extends('layouts.admin')

@section('content')
<h1>Admin</h1>
<form method="GET" action="/admin/contacts">
    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
    <select name="gender">
        <option value="">性別</option>
        <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
        <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
        <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
    </select>
    <select name="type">
        <option value="">お問い合わせの種類</option>
        <option value="商品の交換について" {{ request('type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
        <!-- 他の選択肢も同様に -->
    </select>
    <input type="date" name="date" value="{{ request('date') }}">
    <button type="submit">検索</button>
    <a href="{{ route('admin.contacts.index') }}">リセット</a>
</form>

<a href="{{ route('admin.contacts.export') }}">エクスポート</a>

<table>
    <thead>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->type }}</td>
            <td><a href="{{ route('admin.contacts.show', $contact->id) }}">詳細</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links() }}
@endsection