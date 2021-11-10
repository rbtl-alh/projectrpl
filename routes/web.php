<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
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

//login
Route::get('/login', function () {
    return view('auth.login');
});

//register
Route::get('/register', function () {
    return view('auth.register');
});

//home
Route::get('/', function () {
    return view('pages.index', ['title' => 'Home']);
});

//lihat data: /donor
//daftar donor: /donor/create
Route::resource('donor', 'App\Http\Controllers\DonorController')->middleware(['auth']);;


require __DIR__ . '/auth.php';
