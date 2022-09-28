<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group([
    'middleware' => 'auth'
], function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Route Article
    Route::get('/article', [ArticleController::class, 'index']);
    Route::get('/article/create', [ArticleController::class, 'create']);
    Route::post('article/store', [ArticleController::class, 'store']);
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit']);
    Route::post('article/update/{id}', [ArticleController::class, 'update']);
    Route::get('/article/delete/{id}', [ArticleController::class, 'delete']);

    //Route Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy']);
});