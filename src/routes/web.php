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
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Attendance\Attendancesqrcd;


Route::get('/', [ShopController::class, 'index']);
Route::post('/', [LikeController::class, 'makeLike'])->name('makeLike');
Route::post('/search', [ShopController::class, 'search']);
Route::post('/delete', [LikeController::class, 'deleteLike'])->name('deleteLike');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);
Route::post('/detail', [ReserveController::class, 'makeReserve']);
Route::get('/mypage', [ShopController::class, 'getMypage']);
Route::get('/reschedule/{shop_id}/{reserve_id}', [ShopController::class, 'getReschedule']);
Route::post('/reschedule', [ReserveController::class, 'postReschedule']);
Route::get('/cancel/{shop_id}/{reserve_id}', [ShopController::class, 'getCancel']);
Route::post('/cancel', [ReserveController::class, 'postCancel']);
Route::get('/went', [ShopController::class, 'getWent']);
Route::get('/assessment/{reserve_id}', [ShopController::class, 'getAssessment']);
Route::post('/assessment', [PostController::class, 'postAssessment']);
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
Route::get('/qrcode/{reserve_id}', [ReserveController::class, 'getQr']);
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/create/{shop_id}/{date}/{time}/{num}', [PaymentController::class, 'create'])->name('create');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
});

//  ★管理者権限
Route::group(['prefix' => 'administrator', 'middleware' => ['auth', 'can:admin','verified']], function () 
{
    Route::get('/', [OwnerController::class, 'getOwner']);
    Route::get('/shop/{user_id}', [OwnerController::class, 'getShop']);
    Route::post('/register', [OwnerController::class, 'postOwner']);
    Route::get('/menu', function () {
        return view('administrator/menu');
    });
    Route::get('/user/send', function () {
        return view('administrator/email');
    });
    Route::post('/user/send', [UserController::class, 'postAllUserSend']);
    Route::get('/add', function () {
    return view('administrator/add');
    });
    Route::get('/owner/send/{owner_id}', [OwnerController::class, 'getOwnerSend']);
    Route::post('/owner/send', [OwnerController::class, 'postOwnerSend']);
});

//  ★店舗管理者権限

Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'can:owner','verified']], function () 
{
    Route::get('/', [OwnerController::class, 'getAll']);
    Route::get('/add', [ShopController::class, 'getAdd']); 
    Route::post('/register', [ShopController::class, 'makeShop'])->name('makeShop');
    Route::get('/send', [OwnerController::class, 'getSend']);
    Route::post('/send', [ReserveController::class, 'postSend']);
    Route::get('/user/send/{reserve_id}', [OwnerController::class, 'getUserSend']); 
    Route::post('/user/send', [UserController::class, 'postUserSend']); 
    Route::get('/edit/{shop_id}', [OwnerController::class, 'getEdit']); 
    Route::post('/edit/category', [ShopController::class, 'editCategory']);
    Route::post('/edit/category', [ShopController::class, 'editCategory']);
    Route::post('/edit/place', [ShopController::class, 'editPlace']);
    Route::post('/edit/comment', [ShopController::class, 'editComment']);
    Route::post('/upload', [PhotoController::class, 'postUpload']);
    Route::get('/reserve/{shop_id}', [ReserveController::class, 'getReserve']);
    Route::get('/reserve/today/{shop_id}', [ReserveController::class, 'getReserveToday']);
    Route::get('/reserve/went/{shop_id}', [ReserveController::class, 'getReserveWent']);
    Route::get('/menu', function () {
    return view('owner/menu');
    }); 
    Route::get('/read/qrcode', function () {
     return view('owner/read_qr');
    });
    Route::get('/reserve/qr/{reserve_id}', [ReserveController::class, 'getQrData']);
    Route::post('/reserve/qr', [ReserveController::class, 'enterReserve'])->name('enter');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

