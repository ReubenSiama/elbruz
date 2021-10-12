<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\AdminItemController;
use App\Http\Controllers\Web\AdminWebController;
use App\Http\Controllers\Web\Auth\AdminAuthController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\OrdersController;
use App\Http\Controllers\Web\PaymentsController;
use App\Http\Controllers\Web\UnitsController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::middleware('auth')->prefix('admin')->group(function () {
  Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
  Route::get('/home', [AdminWebController::class, 'getHome'])->name('admin.home');

  // items
  Route::get('/items', [AdminItemController::class, 'getItem'])->name('admin.items');
  Route::get('/add-item', [AdminItemController::class, 'getAddItem'])->name('admin.item.add');
  Route::post('/add-item', [AdminItemController::class, 'addItem'])->name('admin.item.post-add');

  // orders
  Route::get('/orders', [OrdersController::class, 'getOrders'])->name('admin.orders');

  // payments
  Route::get('/payments', [PaymentsController::class, 'getPayments'])->name('admin.payments');

  // users
  Route::get('/users', [UsersController::class, 'getUsers'])->name('admin.users');
  Route::post('/add-user', [UsersController::class, 'addUser'])->name('user.add');

  // categories
  Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('admin.categories');

  // units
  Route::get('/units', [UnitsController::class, 'getUnits'])->name('admin.units');
});

Route::post('/login', [AdminAuthController::class, 'login'])->name('post.login');

Route::prefix('admin')->get('/login', [AdminAuthController::class, 'getLoginPage'])->name('login');

Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
