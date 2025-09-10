<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/weight_logs', [ContactController::class, 'index'])->name('weight_logs.index');

Route::get('/weight_logs/create', [ContactController::class, 'create'])->name('weight_logs.create');
Route::post('/weight_logs/create', [ContactController::class, 'store'])->name('weight_logs.store');

Route::get('/weight_logs/search', [ContactController::class, 'search'])->name('weight_logs.search');

Route::get('/weight_logs/{weightLogId}', [ContactController::class, 'show'])->name('weight_logs.show');

Route::get('/weight_logs/{weightLogId}/update', [ContactController::class, 'edit'])->name('weight_logs.edit');
Route::post('/weight_logs/{weightLogId}/update', [ContactController::class, 'update'])->name('weight_logs.update');

Route::delete('/weight_logs/{weightLogId}/delete', [ContactController::class, 'destroy'])->name('weight_logs.destroy');

Route::get('/weight_logs/goal_setting', [ContactController::class, 'editGoal'])->name('goal.edit');
Route::post('/weight_logs/goal_setting', [ContactController::class, 'updateGoal'])->name('goal.update');

Route::get('/register/step1', [ContactController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [ContactController::class, 'storeStep1'])->name('register.storeStep1');

Route::get('/register/step2', [ContactController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [ContactController::class, 'storeStep2'])->name('register.storeStep2');

Route::get('/login', [ContactController::class, 'showLoginForm'])->name('login');
Route::post('/login', [ContactController::class, 'login'])->name('login.post');

Route::get('/logout', [ContactController::class, 'logout'])->name('logout');