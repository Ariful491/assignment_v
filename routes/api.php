<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

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

Route::prefix('assignment')->group(function (){
    //========**** User Authentication Routes ****========//
    Route::post('/login',[AuthController::class,'Login']);
    Route::post('/register',[AuthController::class,'Register']);

    Route::middleware('auth:api')->group( function () {
        Route::get('/user', [AuthController::class, 'User']);
        Route::post('/logout',[AuthController::class,'logout']);
    });
});
