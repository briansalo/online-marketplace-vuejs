<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductCategoryController;
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

Route::get('/', function () {
    return view('front-design');
});


Route::get('/home', function () {
    return view('backend.home');
});



 Route::get('/logout', [AuthController::class, 'log_out'])->name('log_out');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
   // Route::get('/', [MenuCategoryController::class, 'index'])->name('menu.index');


Route::get('/admin', function () {
    return view('admin.content.content');
})->name('admin.dashboard')->middleware('admin');

Route::middleware(['admin'])->prefix('category')->group(function(){

    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
 
}); 

Route::prefix('subcategory')->group(function(){

    Route::get('/subcategory/index', [SubCategoryController::class, 'index'])->name('subcategory.index');

    Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');

    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

    Route::get('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
 
}); 

Route::prefix('childcategory')->group(function(){

    Route::get('/childcategory/index', [ChildCategoryController::class, 'index'])->name('childcategory.index');

    Route::get('/childcategory/create', [ChildCategoryController::class, 'create'])->name('childcategory.create');
    Route::post('/childcategory/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');

    Route::get('/childcategory/edit/{id}', [ChildCategoryController::class, 'edit'])->name('childcategory.edit');
    Route::post('/childcategory/update/{id}', [ChildCategoryController::class, 'update'])->name('childcategory.update');

    Route::get('/childcategory/destroy/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.destroy');
 
}); 

Route::prefix('ads')->group(function(){

    Route::get('/ads/index', [AdvertisementController::class, 'index'])->name('ads.index');

    Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('ads.store');

    Route::get('/ads/edit/{id}', [AdvertisementController::class, 'edit'])->name('ads.edit');
    Route::post('/ads/update/{id}', [AdvertisementController::class, 'update'])->name('ads.update');

    Route::get('/ads/destroy/{id}', [AdvertisementController::class, 'destroy'])->name('adsads.destroy');
 
}); 


Route::prefix('product')->group(function(){

    Route::get('/product/{categorySlug}', 
        [ProductCategoryController::class, 'findBaseOnCategory'])
    ->name('find.base.on.category');

    Route::get('/product/{categorySlug}/{subcategorySlug}', 
        [ProductCategoryController::class, 'findBaseOnSubCategory'])
    ->name('find.base.on.subcategory');

    Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}', 
        [ProductCategoryController::class, 'findBaseOnChildCategory'])
    ->name('find.base.on.childcategory');

    Route::get('/products/{id}/{slug}', 
        [ProductCategoryController::class, 'ShowProductInfo'])
    ->name('show.product.info');

 
}); 