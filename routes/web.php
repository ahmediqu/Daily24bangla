<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Models\User;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [HomeController::class, 'post']);
Route::get('/category/{slug}', [HomeController::class, 'category']);


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['admin']], function () {


        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index']);

            //  resource controller
            Route::resource('categories', CategoryController::class);
            Route::resource('posts', PostController::class);

        });

    });

});
