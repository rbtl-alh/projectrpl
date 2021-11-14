<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavbarController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

//untuk mengambil data $user, agar terbaca pada navbar
Route::get('/', [UserController::class, 'index']);

////////////////////////////mulai auth//////////////////////////////////
//route yang ada di dalam sini hanya bisa diakses setelah login
Route::group(['middleware' => 'auth'], function () {
    //lihat data: /donor
    //daftar donor: /donor/create
    Route::resource('donor', 'App\Http\Controllers\DonorController');
    //show data: user/{$id}
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::patch('/student/{id}', 'App\Http\Controllers\UserController@update');
});
////////////////////////////batas auth///////////////////////////////////

Route::get('/donor/search', [DonorController::class,'search']);

//untuk logout
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));

//             $user->save();

//             event(new PasswordReset($user));
//         }
//     );

//     return $status === Password::PASSWORD_RESET
//         ? redirect()->route('login')->with('status', __($status))
//         : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');

require __DIR__ . '/auth.php';
