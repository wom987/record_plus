<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DisksController;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// custom Routes
Route::prefix("users")->group(function () {
    Route::get('/createuser', [UsersController::class, 'createuser']);
    Route::get('/createadmin', [UsersController::class, 'createadmin']);
    Route::post('/createuser', [UsersController::class, 'storeuser']);
    Route::post('/createadmin', [UsersController::class, 'storeadmin']);
    Route::prefix("user")->group(function () {
        Route::get('', [UsersController::class, 'users']);
        Route::get('/{id}', [UsersController::class, 'showuser']);
        Route::put('/{id}', [UsersController::class, 'updateuser']);
        Route::get('/create', [UsersController::class, 'createuser']);
    });
    Route::prefix("admin")->group(function () {
        Route::get('', [UsersController::class, 'admins']);
        Route::get('/{id}', [UsersController::class, 'showadmin']);
        Route::put('/{id}', [UsersController::class, 'updateadmin']);
        Route::get('/new', [UsersController::class, 'newadmin']);
    });
});

//resource routes
Route::resource('/users', UsersController::class);
Route::resource('/disks', DisksController::class);
//show images
Route::get('users/profilePic/{filename}', function ($filename) {
    $path = storage_path("app/profilePics/$filename");
    if (!\Illuminate\Support\Facades\File::exists($path)) abort(404);
    $file = \Illuminate\Support\Facades\File::get($path);
    $type = \Illuminate\Support\Facades\File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
});
Route::get('disk/diskPic/{filename}', function ($filename) {
    $path = storage_path("app/disksPics/$filename");
    if (!\Illuminate\Support\Facades\File::exists($path)) abort(404);
    $file = \Illuminate\Support\Facades\File::get($path);
    $type = \Illuminate\Support\Facades\File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
});
