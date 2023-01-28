<?php

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontred\FrontedController::class, 'index']);

Route::get('/turorials/{category_slug}', [App\Http\Controllers\Frontred\FrontedController::class, 'viewPostCategory']);

Route::get('/turorials/{category_slug}/{post_slug}', [App\Http\Controllers\Frontred\FrontedController::class, 'viewPost']);
//comment
Route::post('comments', [App\Http\Controllers\Frontred\commentController::class, 'store']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

Route::get('/dashboard',[App\Http\Controllers\admin\dashboardController::class,'index']);
Route::get('/category',[App\Http\Controllers\admin\CategoryController::class,'index']);
Route::get('/add-category',[App\Http\Controllers\admin\CategoryController::class,'create']);
Route::post('/add-category',[App\Http\Controllers\admin\CategoryController::class,'store']);
Route::get('/edit-category/{category_id}',[App\Http\Controllers\admin\CategoryController::class,'edit']);
Route::put('/update-category/{category_id}',[App\Http\Controllers\admin\CategoryController::class,'update']);
//Route::get('/delete-category/{category_id}',[App\Http\Controllers\admin\CategoryController::class,'delete']);
Route::post('/delete-category',[App\Http\Controllers\admin\CategoryController::class,'delete']);

Route::get('/post',[App\Http\Controllers\admin\postController::class,'index']);

Route::get('/add-post',[App\Http\Controllers\admin\postController::class,'create']);

Route::post('/add-post',[App\Http\Controllers\admin\postController::class,'store']);

Route::get('/post/{id}',[App\Http\Controllers\admin\postController::class,'edit'])->name('post.edit');

Route::put('/update-post/{id}',[App\Http\Controllers\admin\postController::class,'update']);

Route::get('/delete-post/{id}',[App\Http\Controllers\admin\postController::class,'delete'])->name('post.delete');


//Route::resource('users',UserController::class);
Route::get('/users',[App\Http\Controllers\admin\UserController::class,'index']);

Route::get('/users/{id}',[App\Http\Controllers\admin\UserController::class,'edit']);

Route::put('/update-users/{id}', [App\Http\Controllers\admin\UserController::class, 'update']);




});
