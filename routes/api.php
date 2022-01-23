<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiAddressController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category
Route::get('/category', [ApiCategoryController::class, 'getCategory']);
Route::get('/subcategory', [ApiCategoryController::class, 'getSubCategory']);
Route::get('/childcategory', [ApiCategoryController::class, 'getChildCategory']);



//address
Route::get('/province', [ApiAddressController::class, 'getProvince']);
Route::get('/city', [ApiAddressController::class, 'getCity']);
Route::get('/barangay', [ApiAddressController::class, 'getBarangay']);

//for update/edit form in ads address
Route::get('/all/province', [ApiAddressController::class, 'getAllProvince']);
Route::get('/all/city', [ApiAddressController::class, 'getAllCity']);
Route::get('/all/barangay', [ApiAddressController::class, 'getAllBarangay']);