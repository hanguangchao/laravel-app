<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/api', function (Request $request) {
    return ['headers' => $request->headers->all(), 'request' => $request->all()];
});

Route::post('/api', function (Request $request) {
    dd($_POST);
    dd($request->a);
    return ['headers' => $request->headers->all(), 'request' => $request->all()];
});