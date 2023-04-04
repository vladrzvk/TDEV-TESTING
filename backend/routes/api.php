<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserControllers;
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

Route::get('/testing', function(){
    return 'this is a test';
});


Route::get('/error', function(){
    return 'this a flop';
})->name('error');


Route::post('register', [UserControllers::class, 'register']);

// Route::post('/register', 'App\Http\Controllers\UserController@register');