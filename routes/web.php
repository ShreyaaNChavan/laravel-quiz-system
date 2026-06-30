<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin-login','admin-login');

Route::post('/admin-login',[AdminController::class,'login']);
Route::get('/admin-logout',[AdminController::class,'logout']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('admin-categories',[AdminController::class,'categories']);
Route::post('add-category',[AdminController::class,'addCategory']);
Route::delete('category/delete/{id}',[AdminController::class,'deleteCategory']);