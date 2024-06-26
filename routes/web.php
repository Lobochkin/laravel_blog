<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ImageController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');
    Route::resource('/category','App\Http\Controllers\Admin\CategoryController',['as' => 'admin']);
    Route::resource('/article','App\Http\Controllers\Admin\ArticleController',['as' => 'admin']);
});

Route::get('/', function () {
    return view('default', ['name' => '<i>samanta</i>', 'records' => [0, 2]]);
});
Route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
