<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


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

Route::get('/redis', function () {
    $res = DB::table('users')->get();
    return response()->json($res);
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

Route::get('/facade', function () {
    Cache::set('kkk', 'vvvv');
    // dd(Cache::getStore());
    //dd(app()->cache);
    // $res = Client::get('https://36kr.com/', [
    //     'timeout' => 3,
    // ]);
    // dd($res);
    // return [$res];
});

// Route::resource('post', PostController::class);

Route::resource('posts', PostsController::class);