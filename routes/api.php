<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

/*
For now, this is going to be a proxy backend to the actual anagkazo backend
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v2')->group(function () {
    $BASESURL = "https://anagkazo.firstlovegallery.com/api";
    Route::get('/health', function () {
        return 'I\'m Alive';
    });

    Route::get('/remote-health', function () use ($BASESURL) {
        $response = Http::get($BASESURL . '/health-check');
        return $response;
    });
});
