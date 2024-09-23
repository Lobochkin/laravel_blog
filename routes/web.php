<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::get('/blog/category/{slug?}',[\App\Http\Controllers\BlogController::class,'category'])->name('category');
Route::get('/blog/article/{slug?}',[\App\Http\Controllers\BlogController::class,'article'])->name('article');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');
    Route::resource('/category','App\Http\Controllers\Admin\CategoryController',['as' => 'admin']);
    Route::resource('/article','App\Http\Controllers\Admin\ArticleController',['as' => 'admin']);
    Route::group(['prefix' => 'user_management'],function () {
        Route::resource('/user','\App\Http\Controllers\Admin\UserManagement\UserController',['as' => 'admin.user_management']);
    });
});
Route::get('/', function () {
    return view('blog.home');
});
Route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/start', [App\Http\Controllers\StartController::class, 'index'])->name('start');
Route::get('/start/data-chart', [App\Http\Controllers\StartController::class, 'chartData']);
Route::get('/start/data-chart-js', [App\Http\Controllers\StartController::class, 'chartJs']);
Route::get('/start/data-chart-random', [App\Http\Controllers\StartController::class, 'chartRandom']);
Route::get('/start/socket-chart', [App\Http\Controllers\StartController::class, 'newEvent']);
Route::get('/start/send-message', [App\Http\Controllers\StartController::class, 'sendMessage']);
Route::get('/start/send-private-message', [App\Http\Controllers\StartController::class, 'sendPrivateMessage']);
Auth::routes();



