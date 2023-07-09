<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::get('/register', [WorkController::class, '']);
Route::get('/mypage', [WorkController::class, '']);

Route::get('/menu/first', function () {
    return view('loginmenu');
});

Route::get('/menu/second', function () {
    return view('logoutmenu');
});

Route::get('/thanks', function () {
    return view('registerthanks');
});

Route::get('/done', function () {
    return view('reservethanks');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


