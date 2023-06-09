<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MinistryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CompanyController;

use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ContactController;

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



Route::group(['middleware' => 'doNotCacheResponse'], function(){
    Route::get('/',[HomeController::class, 'index']);
    Route::get('/register-user',[HomeController::class, 'registeruser']);
    Route::post('/register-user',[HomeController::class, 'storeuser']);
    Route::get('/getcompaniescategory/{slug?}',[HomeController::class, 'getcompanycategory']);
    Route::get('/getcompany/{slug?}',[HomeController::class, 'getcompany']);
    Route::get('/getcategories',[HomeController::class, 'getcategories']);
    Route::get('/contact',[ContactController::class,'index']);

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::group(['prefix' => 'admin','middleware' => ['auth','doNotCacheResponse']], function(){

    Route::get('/',[AdminController::class,'index']);

    Route::get('users',[UserController::class,'index']);
    Route::get('users/form',[UserController::class,'form']);
    Route::post('users',[UserController::class,'store']);
    Route::put('users/{id}',[UserController::class,'update']);
    Route::post('users/copy',[UserController::class,'copy']);
    Route::delete('users',[UserController::class,'destroy']);

    Route::get('ministries',[MinistryController::class,'index']);
    Route::get('ministries/form',[MinistryController::class,'form']);
    Route::post('ministries',[MinistryController::class,'store']);
    Route::put('ministries/{id}',[MinistryController::class,'update']);
    Route::post('ministries/copy',[MinistryController::class,'copy']);
    Route::delete('ministries',[MinistryController::class,'destroy']);
    Route::get('ministries/getministries',[MinistryController::class,'getMinistries']);

    Route::get('category',[CategoryController::class,'index']);
    Route::get('category/form',[CategoryController::class,'form']);
    Route::post('category',[CategoryController::class,'store']);
    Route::put('category/{id}',[CategoryController::class,'update']);
    Route::post('category/copy',[CategoryController::class,'copy']);
    Route::delete('category',[CategoryController::class,'destroy']);
    Route::get('category/getcategories',[CategoryController::class,'getCategories']);


    Route::get('companies',[CompanyController::class,'index']);
    Route::get('companies/form',[CompanyController::class,'form']);
    Route::post('companies',[CompanyController::class,'store']);
    Route::put('companies/{id}',[CompanyController::class,'update']);
    Route::post('companies/copy',[CompanyController::class,'copy']);
    Route::delete('companies',[CompanyController::class,'destroy']);
    Route::get('companies/images/{company_id}',[CompanyController::class,'showimages']);
    Route::post('companies/images/{company_id}',[CompanyController::class,'upload']);
    Route::delete('companies/images/{id}',[CompanyController::class,'removeimage']);

});


   require __DIR__.'/auth.php';

   if (file_exists(__DIR__.'/custom_routes.php')){
       require __DIR__.'/custom_routes.php';
   }


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
