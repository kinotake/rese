<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerLoginController;

Route::get('/', [ShopController::class, 'index']);
Route::post('/', [LikeController::class, 'makeLike'])->name('makeLike');
Route::post('/search', [ShopController::class, 'search']);
Route::post('/delete', [LikeController::class, 'deleteLike'])->name('deleteLike');
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/detail', [ReserveController::class, 'makeReserve']);
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
Route::post('/reassessment', [PostController::class, 'postReassessment']);

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

//  ★管理者権限

Route::get('/administrator', [OwnerController::class, 'getOwner']);
Route::post('/administrator/register', [OwnerController::class, 'postOwner']);
Route::get('/adiministrator/shop/{owner_id}', [OwnerController::class, 'getShop']);
Route::post('/administrator/shop/register', [ShopController::class, 'makeShop'])->name('makeShop');

//  ★店舗管理者権限
Route::get('/owner/register', function () {
    return view('owner/register');
});
Route::post('/owner/register', [OwnerController::class, 'updateOwner']);
Route::get('/owner/login', function () {
    return view('owner/login');
});
Route::post('/owner/login', [OwnerLoginController::class, 'login']);
Route::get('/owner/menu', function () {
    return view('owner/menu');
});
Route::get('/owner', [OwnerController::class, 'getAll']);
Route::post('/owner/logout', [OwnerLoginController::class, 'logout']);
Route::get('/owner/detail/{shop_id}', [OwnerController::class, 'getEdit']);




Route::get('/owner/upload', function () {
    return view('owner/upload');
});
Route::post('/upload', [PhotoController::class, 'postUpload']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


