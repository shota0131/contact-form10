@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <header class="admin-header">
        <h1 class="logo">PiGLy</h1>
        <div class="header-actions">
            <a href="{{ route('goal.edit') }}" class="btn">目標体重設定</a>
            <a href="{{ route('logout') }}" class="btn">ログアウト</a>
        </div>
    </header>

    <main>
        <section class="summary">
            <div class="summary-box">
                <p>目標体重</p>
                <h2>{{ $targetWeight }} kg</h2>
            </div>
            <div class="summary-box">
                <p>目標まで</p>
                <h2>{{ $diffWeight }} kg</h2>
            </div>
            <div class="summary-box">
                <p>最新体重</p>
                <h2>{{ $latestWeight }} kg</h2>
            </div>
        </section>

        <section class="search-form">
            <form method="GET" action="{{ route('weight_logs.index') }}">
                <input type="date" name="from" value="{{ request('from') }}">
                <span>〜</span>
                <input type="date" name="to" value="{{ request('to') }}">
                <button type="submit" class="btn">検索</button>
            </form>
        </section>

        <section class="data-table">
            <div class="table-header">
                <h3>データ一覧</h3>
                <a href="{{ route('weight_logs.create') }}" class="btn btn-add">データ追加</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $record)
                        <tr>
                            <td>{{ $record->date }}</td>
                            <td>{{ $record->weight }}kg</td>
                            <td>{{ $record->calorie }}cal</td>
                            <td>{{ $record->exercise_time }}</td>
                            <td>
                                {{-- 編集(えんぴつボタン) --}}
                                <a href="{{ route('weight_logs.edit', $record->id) }}" class="edit-icon">✏️</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- ページネーション --}}
            <div class="pagination">
                {{ $logs->links() }}
            </div>
        </section>
    </main>
</div>
@endsection