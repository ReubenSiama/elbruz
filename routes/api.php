<?php

use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function(){
    Route::post('/add-address', [UserDetailController::class,'addAddress']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Item
    Route::get('/items', [ItemController::class, 'getItem']);
    Route::post('/add-item', [ItemController::class, 'addItem']);
    Route::get('/customer-get-items', [CustomerController::class, 'getItems']);
    Route::get('/get-single-item/{id}', [CustomerController::class, 'getSingleItem']);

    // Category
    Route::get('/get-categories', [CategoryController::class, 'getCategories']);

    // Cart
    Route::post('/add-item-to-cart', [CustomerController::class, 'addCart']);

    // User
    Route::get('/get-my-detail', [CustomerController::class, 'getDetail']);
});