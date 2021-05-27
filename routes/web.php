<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

//路由命名
// <a href="{{ route('user.profile', ['id' => 100]) }}">
// 输出：http://blog.test/user/100
Route::get('user/{id?}', function ($id = 1) {
    return "用户ID: " . $id;
})->name('user.profile');

//middleware + group
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});


Route::resource('post', PostController::class);