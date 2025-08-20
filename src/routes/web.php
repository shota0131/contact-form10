<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ContactController::class, 'contact']);
Route::post('/confirm.edit', [ContactController::class, 'edit']);
Route::post('/confirm.update', [ContactController::class, 'update']);
Route::post('/', [ContactController::class, 'store']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/store', [ContactController::class, 'store']);
Route::get('/thanks', function(){
    return view('thanks');
});


Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::get('/contacts/export', [AdminContactController::class, 'export'])->name('contacts.export');
});



