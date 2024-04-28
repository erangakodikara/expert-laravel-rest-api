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
//use App\Http\Controllers\PostController;
use App\Models\Post;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/post',[App\Http\Controllers\PostController::class, 'index']);
Route::post('/savepost', [App\Http\Controllers\PostController::class, 'store']);

Route::get('/postinactive/{id}',[App\Http\Controllers\PostController::class, 'updatPostStatus']);
Route::get('/deletepost/{id}',[App\Http\Controllers\PostController::class, 'deletePost']);
Route::get('/updatepostview/{id}',[App\Http\Controllers\PostController::class, 'updatePostView']);
Route::post('/updatepost', [App\Http\Controllers\PostController::class, 'update']);