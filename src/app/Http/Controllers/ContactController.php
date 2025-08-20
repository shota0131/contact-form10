<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function edit(ContactRequest $request)
    {
        $data=$request->all();
        return view('confirm.edit', ['contact'=>$data]);
    }

    public function update(ContactRequest $request)
    {
        $request->validate([
            'first_name'=>['required', 'string', 'max:255'],
            'last_name'=>['required','string', 'max:255'],
            'gender'=>['required','in:男性,女性,その他'],
            'email'=>['required','email'],
            'tel1'=>['required', 'digits_between:1,5'],
            'tel2'=>['required', 'digits_between:1,5'],
            'tel3'=>['required', 'digits_between:1,5'],
            'address'=>['required', 'string', 'max:255'],
            'building'=>['nullable', 'string', 'max:255'],
            'type'=>['required', 'in:商品のお届けについて,商品の交換について,商品トラブル,ショップへのお問い合わせ,その他'],
            'content'=>['required','max:120'],
        ]);
    }

    public function confirm(Request $request)
    {
        $contact=$request->only(['first_name', 'last_name', 'gender', 'email', 'tel1','tel2', 'tel3','address', 'building', 'type', 'content' ]);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact=$request->only(['first_name','last_name', 'gender', 'email', 'tel', 'address', 'building', 'type', 'content']);
        Contact::create($contact);
        return view('thanks');
    }
    
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
    ], [
        'name.required' => 'お名前は必須です。',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
        'password.required' =>'パスワードを入力してください',
    ]);

   
}



 
}
