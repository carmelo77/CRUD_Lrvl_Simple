<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\Usercontroller;

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

//Group routes when user is auth
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/users', [Usercontroller::class, 'index'])->name('users.index');

    Route::get('/users/create', function () {
        return view('dashboard.user.create');
    })->name('users.create');

    Route::post('/users/store', [Usercontroller::class, 'store'])
    ->name('users.store');

    Route::get('/users/edit/{id}', [Usercontroller::class, 'edit'])
    ->name('users.edit');

    Route::put('/users/update/{id}', [Usercontroller::class, 'update'])
    ->name('users.update');

    Route::delete('/users/destroy', [Usercontroller::class, 'destroy'])
    ->name('users.destroy');

    Route::post('/users/search', [Usercontroller::class, 'search'])
    ->name('users.search');

    Route::get('/logout', [SigninController::class, 'logout'])
    ->name('login.logout');
});


//View login
Route::get('/login', [SigninController::class, 'create'])
->middleware('guest')
->name('login.index');

//Auth Signin action
Route::post('/signin', [SigninController::class, 'login'])
->middleware('guest')
->name('login.signin');