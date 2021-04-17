<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('/products/upload', 'ProductController@upload')
    ->name('products.upload');

Route::get('/products/import', 'ProductController@import')
    ->name('products.import');

Route::get('/products/export', 'ProductController@export')
    ->name('products.export');

Route::get('/products', 'ProductController@index')
    ->name('products.index');
Route::get('/', 'ProductController@index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
