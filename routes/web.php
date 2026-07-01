<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;



Route::view('/admin-login','admin-login');
Route::post('/admin-login',[AdminController::class,'login']);
Route::get('/admin-logout',[AdminController::class,'logout']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('admin-categories',[AdminController::class,'categories']);
Route::post('add-category',[AdminController::class,'addCategory']);
Route::delete('category/delete/{id}',[AdminController::class,'deleteCategory']);
Route::get('add-quiz',[AdminController::class,'addQuiz']);
Route::post('add-mcq',[AdminController::class,'addMCQs']);
Route::get('end-quiz',[AdminController::class,'endQuiz']);
Route::get('show-quiz/{id}', [AdminController::class, 'showQuiz']);
Route::get('quiz-list/{id}/{category}', [AdminController::class, 'quizList']);


Route::get('/',[UserController::class,'welcome']);
Route::get('user-quiz-list/{id}/{category}',[UserController::class,'userQuizList']);
Route::get('start-quiz/{id}/{name}',[UserController::class,'startQuiz']);
Route::view('user-signup','user-signup');
Route::post('user-signup',[UserController::class,'userSignup']);
Route::get('user-logout', [UserController::class, 'userLogout']);
Route::get('user-signup-quiz', [UserController::class, 'userSignupQuiz']);
Route::view('user-login','user-login');
Route::post('user-login',[UserController::class,'userLogin']);
Route::get('user-login-quiz',[UserController::class,'userLoginQuiz']);
Route::get('mcq/{id}/{name}', [UserController::class, 'mcq']);
Route::post('submit-next/{id}', [UserController::class, 'submitAndNext']);

