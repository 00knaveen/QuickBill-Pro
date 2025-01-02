<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\Billing\BillingController;
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

Route::get('/', [AuthController::class,'index'])->name('index');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register',[RegisterController::class,'register'])->name('register');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware'=>['login']],function(){
Route::get('/user/dashboard',[ProductController::class,'dashboard'])->name('dashboard');

//check Product Id
Route::get('/check/productId',[ProductController::class,'checkProductId'])->name('check-product-id');
Route::post('/add/new/product',[ProductController::class,'addProduct'])->name('add-product');

Route::get('/user/billing',[BillingController::class,'billing'])->name('billing');
Route::get('/generate/billing',[BillingController::class,'generateBilling'])->name('generate-bill');
});