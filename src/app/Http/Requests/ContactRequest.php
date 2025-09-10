<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {          
        return [
            'name' => ['required', 'string', 'max:255',],

            'email' => ['required', 'email', 'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/'],

            'password' => ['required', 'string','min:6',],

            'current_weight'=>['required', 'numeric', 'max:9999.9', 'regex:/^\d{1,4}(\.\d{1})?$/',],

            'goal_weight'=> ['required', 'numeric','max:9999.9', 'regex:/^\d{1,4}(\.\d{1})?$/',],

            'log_date' => ['required', 'date',],

            'weight' => ['required', 'numeric', 'max:9999.9', 'regex:/^\d{1,4}(\.\d{1})?$/',],

            'calories' => ['required', 'numeric',],

            'exercise_time' => ['required', 'string',],

            'exercise_content' => ['nullable', 'string', 'max:120',],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
            'email.regex' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.numeric' => '数字で入力してください',
            'current_weight.max' => '4桁までの数字で入力してください',
            'current_weight.regex' => '小数点は1桁で入力してください',
            'goal_weight.required' => '目標の体重を入力してください',
            'goal_weight.numeric' => '数字で入力してください',
            'goal_weight.max' => '4桁までの数字で入力してください',
            'goal_weight.regex' => '小数点は1桁で入力してください',
            'log_date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '4桁までの数字で、小数点は1桁で入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_time.date_format' => '有効な形式で運動時間を入力してください（例: 01:30）',
            'exercise_content.max' => '120文字以内で入力してください'
        ];
    }


}
