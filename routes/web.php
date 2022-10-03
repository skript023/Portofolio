<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

//Group Route Dashboard
// Route::group(['middleware' => 'auth'], function()
// {
//     Route::get('/dashboard', [UserController::class, 'dashboard']);
// });

//Home
Route::get('/', [PostController::class, 'index']);
Route::get('/categories/{category}', [PostController::class, 'post_by_category']);
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

//Category
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{edit}', [CategoryController::class, 'category_edit']);

//Contact
Route::get('/contact', [ContactController::class, 'admin_contact_manager'])->middleware('auth');
Route::get('/contact', fn() => view('contact'));
Route::post('/contact', [ContactController::class, 'contact_developer']);

//Login
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login']);

//Register
Route::get('/register', fn() => view('register'));
Route::post('/register', [UserController::class, 'add_user']);

//comments
Route::get('/comments', [CommentController::class, 'index']);

//About
Route::get('/about', fn() => view('about'));


