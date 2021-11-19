<?php

use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/admin',[App\Http\Controllers\UsersController::class,'admins']);
Route::get('/users/user',[App\Http\Controllers\UsersController::class,'users']);
Route::resource('/users',App\Http\Controllers\UsersController::class);
//show images
Route::get('users/profilePic/{filename}',function($filename){
    $path = storage_path("app/profilePics/$filename"); 
    if(!\Illuminate\Support\Facades\File::exists($path)) abort(404);
    $file = \Illuminate\Support\Facades\File::get($path);
    $type =\Illuminate\Support\Facades\File::mimeType($path);
    $response = Response::make($file,200);
    $response->header('Content-Type',$type);
    return $response;
});
