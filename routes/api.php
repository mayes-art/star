<?php

use App\Http\Controllers\AuthController;
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

// V1 版本
Route::prefix('v1')->middleware(['token.verify'])->group(function () {
    Route::get('test', function () {
        echo 'v1 test';
    });

    // 使用者管理
    Route::prefix('user')->group(function () {

    });

    // 使用者群組管理
    Route::prefix('role')->group(function () {

    });

    // 商品管理

    // 商品類型管理

    // 訂單管理
});

// V2 版本
Route::prefix('v2')->group(function () {

});
