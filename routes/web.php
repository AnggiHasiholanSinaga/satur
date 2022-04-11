<?php

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
Route::get('/dokumen/{id}','App\Http\Controllers\InfoController@dokumen');

Route::get('/welcome', function () {
    return view('welcome');
});
// // Route::get('/dokumen', function () {
// //     return view('dokumen');
// // });
// Route::get('/dokumen','InfoController@test');
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
});

//CLEAR CACHE
Route::get('/clear-cache', function() {
  Artisan::call('cache:clear');
  return "Cache is cleared";
});

//CONFIG CACHE
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Config is cache";
});

//CONFIG CLEAR
Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return "Config is CLEAR";
});

//SYMLINK
Route::get('/symlink', function() {
    Artisan::call('storage:link');
    return "symlink OK";
});

