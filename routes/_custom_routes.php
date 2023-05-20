<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;


use App\Http\Controllers\front\ProductController as FrontProductController;

/*Front routes*/

Route::get('products', [FrontProductController::class, 'index']);

/*Admin Routes*/
Route::group(['prefix' => 'admin','middleware' => ['auth','doNotCacheResponse']], function(){
    Route::get('products', [ProductController::class, 'index']);
});
