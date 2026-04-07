<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\frontend\auth\AuthController;
use App\Http\Controllers\admin\auth\AuthController as AdminAuth;
use App\Http\Controllers\admin\brand\BrandController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\color\ColorController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\subcategory\SubCategoryController;
use App\Http\Controllers\frontend\cart\CartController;
use App\Http\Controllers\frontend\category\CategoriesController;
use App\Http\Controllers\frontend\checkout\CheckoutController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\shop\ShopController;
use App\Http\Controllers\frontend\shopdetail\ShopdetailController;
use App\Models\Order;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
// Dashboard
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // auth 

    Route::get('login', [AdminAuth::class, 'login'])->name('admin.login');
    Route::get('logout', [AdminAuth::class, 'logout'])->name('admin.logout');
    Route::post('login/process', [AdminAuth::class, 'loginProcess'])->name('admin.loginprocess');

    // category 
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('category/list', [CategoryController::class, 'list'])->name('admin.category.list');
    Route::post('category/process', [CategoryController::class, 'createProcess'])->name('admin.category.process');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    // Subcategory
    Route::get('subcategory/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::get('subcategory/list', [SubCategoryController::class, 'list'])->name('admin.subcategory.list');
    Route::post('subcategory/process', [SubCategoryController::class, 'createProcess'])->name('admin.subcategory.process');
    Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::put('subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    // brand
    Route::get('brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::get('brand/list', [BrandController::class, 'list'])->name('admin.brand.list');
    Route::post('brand/process', [BrandController::class, 'createProcess'])->name('admin.brand.process');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('brand/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('brand/delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
    // color
    Route::get('color/create', [ColorController::class, 'create'])->name('admin.color.create');
    Route::get('color/list', [ColorController::class, 'list'])->name('admin.color.list');
    Route::post('color/process', [ColorController::class, 'createProcess'])->name('admin.color.process');
    Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('admin.color.edit');
    Route::put('color/update/{id}', [ColorController::class, 'update'])->name('admin.color.update');
    Route::get('color/delete/{id}', [ColorController::class, 'delete'])->name('admin.color.delete');
    // Products
    Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::get('product/list', [ProductController::class, 'list'])->name('admin.product.list');
    Route::post('product/process', [ProductController::class, 'createProcess'])->name('admin.product.process');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    // Order

    Route::get('order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('order/{order_id}', [OrderController::class, 'view'])->name('admin.order.view');
    Route::put('order/{order_id}', [OrderController::class, 'updatestatus'])->name('admin.order.updatestatus');
});


// Frontend 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register/process', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/shop/shopdetail/{slug}', [ShopdetailController::class, 'shopdetail'])->name('shopdetail');
Route::get('/category/{slug}', [CategoriesController::class, 'index'])->name('category');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
