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

// membuat fungsi redirect agar ketika diakses root langsung diarahkan ke dashboard

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route untuk menangani middleware auth
// jika auth berhasil maka route di
// dalamnya bisa diakses
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/pemasukan', 'IncomesController@index')->name('incomes');
    // Route::get('/user', 'UserController@index')->name('user');

    Route::resource('/income', 'IncomesController');
    Route::resource('/users', 'UserController');
});
Auth::routes();

