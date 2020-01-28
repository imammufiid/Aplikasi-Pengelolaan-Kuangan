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

// route untuk menangani ketika belum ada data yang diinputkan
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/pemasukan', 'IncomesController@index')->name('incomes');
Route::get('/pemasukan/dt_json', 'IncomesController@dt_json')->name('income.dt_json');
// Route::get('/pemasukan/dt_json', 'IncomesController@json');

// route untuk menangani ketika sudah ada data yang diinputkan
// Route::post('/pemasukan', 'IncomesController@store');
// Route::post('/income/delete/{id}', 'IncomesController@destroy');
// Route::post('/pemasukan/{id}', 'IncomesController@show');
Route::resource('/income', 'IncomesController');
Auth::routes();
// Route::post('/pemasukan/edit/{id}', 'IncomesController@edit');
// Route::post('/dashboard', 'HomeController@postDashboard');