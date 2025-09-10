@extends('lauouts.app')

@section('content')
<div class="edit-container">
    <div class="card">
        <h1 class="title">Weight Log</h1>

        <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
            @csrf 
            @method('POST')

            <div class="form-group">
                <label for="date">日付</label>
                <input type="date" id="date" value="{{ old('date', $weightLog->date) }}">
            </div>

            <div class="form-group">
                <label for="weight">体重</label>
                <input type="number" step="0.1" id="weight" name="weight" value="{{ old('weight', $weightLog->weight) }}"> kg
            </div>

            <div class="form-group">
                <label for="exercise_time">運動時間</label>
                <input type="time" id="exercise_time" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
            </div>

            <div class="form-group">
                <label for="exercise_content">運動内容</label>
                <textarea id="exercise_content" name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('weight_logs.index') }}" class="btn back">戻る</a>
                <button type="submit" class="btn update">更新</button>
                <form method="POST" action="{{ route('weight_logs.destroy', $weightLog->id) }}" class="inline-form">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn delete">🗑</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection