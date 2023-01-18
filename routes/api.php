<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user/{id}', [UserController::class, 'getUser']);

Route::get('/getMessages/{id}', [MessagesController::class, 'find']);
Route::post('/saveMessage', [MessagesController::class, 'store']);

Route::get('/cep/{cep}', [UserController::class, 'cep']);
