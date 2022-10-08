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
Route::get('/read/{readmore}', [PostController::class, 'read_more']);
Route::get('/categories/{category}', [PostController::class, 'post_by_category']);

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/article', [PostController::class, 'user_articles'])->middleware('auth');
Route::post('/dashboard/article', [PostController::class, 'search_article'])->middleware('auth');

Route::get('/dashboard/user', [UserController::class, 'view_user'])->middleware('auth');
Route::get('/dashboard/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/dashboard/user/add', [UserController::class, 'add_user'])->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

//Category
Route::get('/dashboard/category', [CategoryController::class, 'index'])->middleware('auth');
Route::post('/dashboard/category/add', [CategoryController::class, 'add_category'])->middleware('auth');
Route::post('/dashboard/category/edit/{edit_id}', [CategoryController::class, 'category_edit'])->middleware('auth');

//Contact
Route::get('/dashboard/contact', [ContactController::class, 'admin_contact_manager'])->middleware('auth');
Route::get('/contact', fn() => view('contact'));
Route::post('/contact', [ContactController::class, 'contact_developer']);

//Login
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login']);

//Register
Route::get('/register', fn() => view('register'));
Route::post('/register', [UserController::class, 'add_user']);

//comments
Route::get('/dashboard/comments', [CommentController::class, 'index'])->middleware('auth');
Route::post('/comment/{readmore}', [PostController::class, 'comment_article']);

//About
Route::get('/about', fn() => view('about'));


