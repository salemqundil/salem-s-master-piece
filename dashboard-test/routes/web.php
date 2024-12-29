<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/shop',  [ProductController::class, 'shope'])->name('shope');
// Route::get('/shop/{id}',  [ProductController::class, 'filter2'])->name('shope');
Route::get('/cart',  [CartController::class, 'index'])->name('cart');
Route::get('/wishlist',  [WishlistController::class, 'index']);
Route::post('/favorites/update',  [WishlistController::class, 'update']);
Route::post('/favorites/css',  [WishlistController::class, 'cssIcons']);
Route::get('/product/{id}',  [ProductController::class, 'details'])->name('product.details');
Route::get('/products/filter',  [ProductController::class, 'filter']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateQuantity']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/products/search', [ProductController::class, 'ajaxSearch'])->name('products.search');

Route::middleware('auth')->group(function () {
    Route::get('/wishlist',  [WishlistController::class, 'index']);
    Route::get('/checkout',  [CheckoutController::class, 'index']);

});
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('manageUsers');
        Route::get('/bannedUsers', [AdminController::class, 'bannedUsers'])->name('users.banned');

        Route::post('product/import', [ProductController::class, 'importExcelData'])->name('product.import');
        Route::post('/order/approve/{id}', [OrderController::class, 'orderApprove'])->name('orders.approve');
        Route::get('/orderDetail/{id}', [OrderController::class, 'orderDetail'])->name('orders.detail');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::post('/image/remove', [ProductController::class, 'imageRemove'])->name('product.image.delete');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/coupon', [CouponController::class, 'index'])->name('coupon.index');
        Route::post('/coupon/store', [CouponController::class, 'store'])->name('coupon.store');
        Route::post('/coupon/update', [CouponController::class, 'update'])->name('coupon.update');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    
        Route::get('/packages', [PackageController::class,'index'])->name('packages.index');
        Route::get('packages/{package}/edit', [PackageController::class,'edit'])->name('package.edit');
        Route::post('/packages/update', [PackageController::class,'update'])->name('packages.update');
        Route::get('/users', [ManageUsersController::class,'allUsers'])->name('users.all');
        Route::get('/users/{id}', [ManageUsersController::class,'detail'])->name('users.detail');
        Route::get('/active', function () {return view('admin.users.detail');})->name('users.active');
        Route::get('/deposit', function () {return view('admin.deposit.details');})->name('deposit.pending');
        Route::get('/deposit/list', function () {return view('admin.deposit.details');})->name('deposit.list');


});
Route::post('/login2', [AdminController::class, 'login'])->name('login2');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('/admin/login');

require __DIR__.'/auth.php';
