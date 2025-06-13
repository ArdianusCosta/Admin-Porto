<?php

use App\Http\Controllers\Api\AboutMeController;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LogoController;
use App\Http\Controllers\Api\ToolController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/logo', [LogoController::class, 'index']);
Route::get('/motivasi', [HomeController::class,'motivasi']);
Route::get('/deskripsi', [HomeController::class, 'index']);
Route::get('/about-me', [AboutMeController::class, 'index']);
Route::get('/tools', [ToolController::class, 'index']);