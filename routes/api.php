<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyLogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//storeメソッドのAPIルート
Route::middleware('auth:sanctum')->group(function(){
    Route::post('study-logs', [StudyLogController::class, 'store']);
});
