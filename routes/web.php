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
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SaveAdsController;
use App\Http\Controllers\AdminAdsController;
use App\Http\Controllers\FraudController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontDesignController;
use App\Http\Controllers\SocialLoginController;

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

//Route::get('/', function () {
  //  return view('front-design');
//})->name('front.design');

 Route::get('/', [FrontDesignController::class, 'FrontView'])->name('front.design');

//this route for authenticate middleware
Route::get('middleware/login_page', function () {
    return view('middleware_auth');
})->name('middleware.auth');

//this route for deactivated account middleware
Route::get('middleware/deactivate_page', function () {
    return view('middleware_deactivate');
});



 Route::get('/logout', [AuthController::class, 'log_out'])->name('log_out');



Route::get('/admin', function () {
    return view('admin.content.content');
})->name('admin.dashboard')->middleware('admin');

Route::middleware(['admin'])->prefix('category')->group(function(){

    Route::get('/category_indexx', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/category_creates', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
 
}); 

Route::middleware(['admin'])->prefix('subcategory')->group(function(){

    Route::get('/subcategory_index', [SubCategoryController::class, 'index'])->name('subcategory.index');

    Route::get('/subcategory_create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');

    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

    Route::get('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
 
}); 

Route::middleware(['admin'])->prefix('childcategory')->group(function(){

    Route::get('/childcategory_index', [ChildCategoryController::class, 'index'])->name('childcategory.index');

    Route::get('/childcategory_create', [ChildCategoryController::class, 'create'])->name('childcategory.create');

    Route::post('/childcategory/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');

    Route::get('/childcategory/edit/{id}', [ChildCategoryController::class, 'edit'])->name('childcategory.edit');
    Route::post('/childcategory/update/{id}', [ChildCategoryController::class, 'update'])->name('childcategory.update');

    Route::get('/childcategory/destroy/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.destroy');
 
}); 



Route::middleware(['admin'])->prefix('admin_advertisement')->group(function(){

    Route::get('/admin/all_ads/', [AdminAdsController::class, 'AdminAllAds'])->name('admin.all_ads');
    Route::get('/admin/delete_ads/{id}', [AdminAdsController::class, 'AdminDeleteAds'])->name('admin.delete_ads');

    Route::get('/admin/pending_ads/', [AdminAdsController::class, 'AdminPendingAds'])->name('admin.pending_ads');
    Route::get('/admin/pending/confirm/{id}', [AdminAdsController::class, 'AdminPendingConfirm'])->name('admin.pending.confirm');

 
}); 




 Route::middleware(['admin'])->prefix('user')->group(function(){

    //all users
    Route::get('/all_user',[UserController::class, 'AllUser'])->name('all.users');

    Route::get('/activate/{id}',[UserController::class, 'ActivateUser'])->name('activate.user');

    Route::get('/deactivate/{id}',[UserController::class, 'DeactivateUser'])->name('deactivate.user');

    //report users
    Route::get('/reported/users',[FraudController::class, 'ViewReportedUser'])->name('view.reported.user');

    Route::get('/reported/confirm/{id}',[FraudController::class, 'ReportedConfirm'])->name('reported.confirm');

    Route::get('/reported/ignore/{id}',[FraudController::class, 'ReportedIgnore'])->name('reported.ignore');

}); 








Route::middleware(['deactivate'])->prefix('ads')->group(function(){

    Route::get('/ads/index', [AdvertisementController::class, 'index'])->name('ads.index');

    Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('ads.store');

    Route::get('/ads/edit/{id}', [AdvertisementController::class, 'edit'])->name('ads.edit');
    Route::post('/ads/update/{id}', [AdvertisementController::class, 'update'])->name('ads.update');

    Route::get('/ads/destroy/{id}', [AdvertisementController::class, 'destroy'])->name('ads.destroy');

    Route::get('/ads/pending', [AdvertisementController::class, 'Pending'])->name('ads.pending');
 
}); 


Route::middleware(['deactivate'])->prefix('product')->group(function(){

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

Route::middleware(['deactivate','auth'])->prefix('message')->group(function(){

    Route::post('/send',[MessageController::class, 'MessageSend'])->name('message.send');

    Route::get('/view',[MessageController::class, 'MessageView'])->name('message.view');

    Route::get('/chat_with_user',[MessageController::class, 'ChatWithUser'])->name('chat.with.user');

    Route::get('/show_message/users/{id}',[MessageController::class, 'ShowMessage'])->name('show.message');

    Route::post('/start_conversation',[MessageController::class, 'StartConversation'])->name('start.conversation');

}); 


Route::middleware(['deactivate','auth'])->prefix('save_ads')->group(function(){

    Route::post('/ads/save',[SaveAdsController::class, 'AdsSave'])->name('ads.save');

    Route::get('/get_my_ads',[SaveAdsController::class, 'GetMySavedAds'])->name('get.my.saved.ads');

    Route::get('/remove_ads/{id}',[SaveAdsController::class, 'RemoveSavedAds'])->name('remove.saved.ads');

}); 



Route::middleware(['deactivate'])->prefix('report')->group(function(){

    Route::post('/report/user',[FraudController::class, 'ReportUser'])->name('report.user');
    

}); 
 


Route::middleware(['deactivate'])->prefix('user')->group(function(){

    Route::get('/user/profile/{id}',[UserController::class, 'UserProfile'])->name('user.profile');
    

}); 

