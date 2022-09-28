<?php

use App\Http\Controllers\api\ArticleController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth:api')->group(function () {

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('articles', ArticleController::class);
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    
   
});
