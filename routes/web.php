<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DirectoryController;
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
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/home', [AuthController::class, 'home'])->name('home');


Route::get('blog', [BlogController::class, 'index'])->name('blog.index'); 
Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth'); 
Route::post('blog-create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth'); 
Route::get('blog-edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{blog}', [BlogController::class, 'update'])->middleware('auth');;
Route::delete('blog-edit/{blog}', [BlogController::class, 'destroy'])->middleware('auth');;

Route::get('file', [DirectoryController::class, 'index'])->name('file.index'); 
Route::get('file/{directory}', [DirectoryController::class, 'show'])->name('file.show')->middleware('auth');
Route::get('file-create', [DirectoryController::class, 'create'])->name('file.create')->middleware('auth'); 
Route::post('file-create', [DirectoryController::class, 'upload'])->name('file.upload')->middleware('auth'); 
Route::get('file-download/{directory}', [DirectoryController::class, 'download'])->name('file.download')->middleware('auth');
Route::get('file-edit/{directory}', [DirectoryController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('file-edit/{directory}', [DirectoryController::class, 'update'])->middleware('auth');;
Route::delete('file/{directory}', [DirectoryController::class, 'destroy'])->name('file.delete')->middleware('auth');;


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authentification'])->name('user.auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('user/{user}', [AuthController::class, 'show'])->name('user.show');
Route::get('signup', [AuthController::class, 'create'])->name('auth.create'); 
Route::post('signup', [AuthController::class, 'store'])->name('auth.store'); 
Route::get('user-edit/{user}', [AuthController::class, 'edit'])->name('user.edit');
Route::put('user-edit/{user}', [AuthController::class, 'update']);
Route::delete('user-edit/{user}', [AuthController::class, 'destroy']);


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');