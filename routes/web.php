<?php

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
    return view('index');
})->name('index');

/**
 * Auth
 */
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/');
    }
    return view('login');
})->name('login');
Route::get('/register', function () {
    if (auth()->check()) {
        return redirect('/');
    }
    return view('login');
})->name('register');

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');

/**
 * Products
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('products', 'ProductController');
});
