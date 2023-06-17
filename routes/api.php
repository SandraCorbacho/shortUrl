<?php

use App\Http\Controllers\api\GetShortUrlController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], static function() {
    Route::post('short-urls ', GetShortUrlController::class);
});

