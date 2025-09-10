@extends('layouts.app')

@section('content')
<div class="goal-container">
    <div class="card">
        <h1 class="title">目標体重設定</h1>

        <form method="POST" action="{{ route('goal.update') }}">
            @csrf 
            <div class="form-group">
                <input type="number" step="0.1" id="goal_weight" name="goal_weight" value="{{ old('goal_weight', $goal->$goalWeight ?? '') }}">
                <span class="unit">kg</span>
            </div>

            <div class="form-actions">
                <a href="{{ route('weight_logs.index') }}" class="btn back">戻る</a>
                <button type="submit" class="btn update">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection