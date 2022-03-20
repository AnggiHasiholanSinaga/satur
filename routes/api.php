<?php

namespace App\Http\Controllers;

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

Route::group(['prefix' => 'division'], function() use ($router) {
    Route::get('/', [MasterDivisionController::class, 'apiGetDivision']);
    Route::post('/', [MasterDivisionController::class, 'apiNewDivision']);
});

Route::group(['prefix' => 'position'], function() use ($router) {
    Route::get('/', [MasterPositionController::class, 'apiGetPosition']);
    Route::post('/', [MasterPositionController::class, 'apiNewPosition']);
});

Route::group(['prefix' => 'account'], function() use ($router) {
    Route::post('/login', [AccountController::class, 'apiLogin']);
    Route::post('/', [AccountController::class, 'apiNewAccount']);
});

Route::group(['middleware' => 'jwt.verify', 'prefix' => 'account'], function(){
    Route::get('/profil', [AccountController::class, 'apiProfil']);
    Route::get('/kasi', [AccountController::class, 'apiGetKasi']);
    Route::get('/staf', [AccountController::class, 'apiGetStaf']);
});

Route::group(['middleware' => 'jwt.verify', 'prefix' => 'inventory'], function(){
    Route::post('/', [InventoryController::class, 'apiNewInventory']);
    Route::get('/', [InventoryController::class, 'apiGetInventories']);
    Route::get('/own', [InventoryController::class, 'apiGetOwnInventory']);
    Route::get('/progress', [InventoryController::class, 'apiGetInventoriesByProgress']);
    Route::get('/{id}', [InventoryController::class, 'apiGetInventory']);
    Route::post('/dispo-kasi/{id}',[InventoryController::class, 'apiDispoToKasi']);
    Route::post('/dispo-staf/{id}',[InventoryController::class, 'apiDispoToStaf']);
    Route::post('/add-notulen/{id}',[InventoryController::class, 'apiAddNotulen']);
});
