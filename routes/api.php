<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsByController;
use App\Http\Controllers\Api\GetProductCategoryController;

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


/* ========
PLEASE NOTE THAT BELLOW WOULD NEED VALIDATION ON REAL PROJECTS,
== ==============
*/

Route::group(['prefix' => 'company'], function(){
    Route::post('/products', [ProductsByController::class, 'index'] )->name('products');
    Route::get('/products-categories', [GetProductCategoryController::class, 'index'] )->name('products-categories');

});
