<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        if(!$userId){
            $logs = $logs = WeightLog::where('user_id', 0)->paginate(8);
            $targetWeight = null;
            $latestWeight = null;
            $diffWeight = null;
        }else{
            $logs = WeightLog::where('user_id', $userId)
                ->orderBy('date', 'desc')
                ->paginate(8);
            
            $targetWeight = WeightTarget::where('user_id', $userId)->value('goal_weight');
            $latestWeight = WeightLog::where('user_id', $userId)->orderBy('date', 'desc')->value('weight');

            $diffWeight = null;
        if (!is_null($targetWeight) && !is_null($latestWeight)) {
            $diffWeight = round($targetWeight - $latestWeight, 1);
        }
    }

    return view('weight_logs.index', compact('logs', 'targetWeight', 'latestWeight', 'diffWeight'));
}

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(ContactRequest $request)
    {
        WeightLog::create($request->validates());

        return redirect()->route('weight_logs.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $logs = WeightLog::where('exercise_content', 'like', "%$keyword%")->get();
        return view('weight_logs.index', compact('logs'));
    }

    public function show($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);
        return view('weight_logs.show', compact('log'));
    }

    public function edit($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);
        return view('weight_logs.edit', compact('log'));
    }

    public function update(Request $request, $weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);
        $log->update($request->all());
        return redirect()->route('weight_logs.show', $weightLogId);
    }

    public function destroy($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);
        $log->delete();
        return redirect()->route('weight_logs.index');
    }

    // ------------------------------
    // Goal Setting
    // ------------------------------
    public function editGoal()
    {
        $goal = WeightTarget::firstOrNew(['user_id' => Auth::id()]);
        return view('weight_logs.goal_setting', compact('goal'));
    }

    public function updateGoal(Request $request)
    {
        $goal = WeightTarget::updateOrCreate(
            ['user_id' => Auth::id()],
            ['goal_weight' => $request->goal_weight, 'log_date' => now()]
        );

        return redirect()->route('goal.edit');
    }

    // ------------------------------
    // Registration Step 1 & 2
    // ------------------------------
    public function showStep1()
    {
        return view('register.step1');
    }

    
    public function storeStep1(ContactRequest $request)
    {
    $request->session()->put('register.step1', $request->only('name', 'email', 'password'));

    return redirect()->route('register.step2');
    }
    

    public function showStep2()
    {
        return view('register.step2');
    }

    public function storeStep2(ContactRequest $request)
    {
        

        $step1 = $request->session()->get('register.step1');
        $user = User::create([
            'name' => $step1['name'],
            'email' => $step1['email'],
            'password' => bcrypt($step1[password]),
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'goal_weight' => $request->goal_weight,
            'log_date' => now(),
        ]);

        Auth::login($user);
        return redirect()->route('weight_logs.index');
    }

    // ------------------------------
    // Login / Logout
    // ------------------------------
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(ContactRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password' => 'パスワードを入力してください',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('weight_logs.index'));
        }

        return back()->withErrors(['email' => '認証に失敗しました']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

   
}



 

