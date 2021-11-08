<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/', function () {
    return view('pages.index');
})->middleware(['auth'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('donor', 'App\Http\Controllers\DonorController')->middleware(['auth']);;
//show donor
Route::get('/', [DonorController::class, 'index']);
//store donor
Route::post('/donor', [DonorController::class, 'store']);



require __DIR__ . '/auth.php';
