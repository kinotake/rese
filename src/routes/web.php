<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', [ShopController::class, 'index']);
Route::post('/', [LikeController::class, 'makeLike'])->name('makeLike');
Route::post('/search', [ShopController::class, 'search']);
Route::post('/delete', [LikeController::class, 'deleteLike'])->name('deleteLike');
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/detail', [ReserveController::class, 'makeReserve']);
Route::get('/register', [WorkController::class, '']);
Route::get('/mypage', [ShopController::class, 'getMypage']);
Route::get('/reschedule/{shop_id}/{id}', [ShopController::class, 'getReschedule']);
Route::post('/reschedule', [ReserveController::class, 'postReschedule']);
Route::get('/cancel/{shop_id}/{id}', [ShopController::class, 'getCancel']);
Route::post('/cancel', [ReserveController::class, 'postCancel']);
Route::get('/went', [ShopController::class, 'getWent']);
Route::get('/assessment/{id}', [ShopController::class, 'getAssessment']);
Route::post('/assessment', [PostController::class, 'postAssessment']);
    // ↑idの形変えてないです
Route::get('/reassessment/{reserve_id}', [PostController::class, 'getReassessment']);

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


