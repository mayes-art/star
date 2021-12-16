<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/', function () {
    echo 'Star Api運作中!';
});

// 登入點
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['token.verify'])->group(function () {
    Route::get('test', function () {
        echo 'v1 test';
    });

    // 使用者管理
    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'list']);
        Route::get('{id}', [UserController::class, 'info']);
        Route::put('{id}', [UserController::class, 'edit']);
        Route::delete('{id}', [UserController::class, 'delete']);
    });

    // 使用者群組管理
    Route::prefix('role')->group(function () {
        Route::get('list', [RoleController::class, 'list']);
        Route::post('add', [RoleController::class, 'add']);
        Route::put('edit/{id}', [RoleController::class, 'edit']);
        Route::get('delete/{id}', [RoleController::class, 'delete']);
    });

    // 商品管理
    Route::prefix('item')->group(function () {

    });

    // 商品類型管理
    Route::prefix('item-category')->group(function () {

    });

    // 訂單管理
    Route::prefix('order')->group(function () {

    });

    // 消息管理
    Route::prefix('news')->group(function () {

    });
});
