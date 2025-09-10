@extends('layouts.app')

@section('content')
<div class="create-container">
    <h2>Weight Logを追加</h2>

    <form action="{{ url('/weight_logs') }}" method="POST" class="create-form">
        @csrf 

        <div class="form-group">
            <label for="log_date">日付 <span class="required">必須</span></label>
            <input type="date" id="log_date" name="log_date" value="{{ old('log_date') }}" required>
            @error('log_date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="weight">体重 <span class="required">必須</span></label>
            <input type="number" step="0.1" id="weight" name="weight" value="{{ old('calories') }}" placeholder="50.0" required> kg
        </div>
        @error('weight')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="calories">摂取カロリー <span class="required">必須</span></label>
            <input type="number" id="calories" name="calories" value="{{ old('calories')}}" placeholder="1200" required> cal 
        </div>
        @error('calories')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exercise_time">運動時間 <span class="required">必須</span></label>
            <input type="time" id="exercise_time" name="exercise_time" value="{{ old('exercise_time') }}" required>
        </div>
        @error('exercise_time')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exercise_content">運動内容</label>
            <textarea id="exercise_content" name="exercise_content" value="{{ old('exercise_time') }}" placeholder="運動内容を追加"></textarea>
        </div>
        @error('exercise_content')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="form-actions">
            <a href="{{ route('weight_logs.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection