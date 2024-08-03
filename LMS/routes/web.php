<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('student_auth')->group(function(){
Route::get('/home',[HomeController::class,'index'])->name('after_login');
});
Route::get('login',[AuthController::class,'loginPage'])->name('login_page');
Route::post('login-user',[AuthController::class,'login'])->name('login_user');
Route::post('logout',[AuthController::class,'logout'])->name('logout_user');

Route::get('/', function () {
    return view('welcome');
});
