<?php

use App\Http\Controllers\StudentController;
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


Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/home', [StudentController::class, 'index'])->name('students.index');

Route::get('student/{student}', [StudentController::class, 'show'])->name('students.show');

Route::get('student-create', [StudentController::class, 'create'])->name('students.create'); 
Route::post('student-create', [StudentController::class, 'store'])->name('students.store'); 
 
Route::get('student-edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('student-edit/{student}', [StudentController::class, 'update']);
Route::delete('student-edit/{student}', [StudentController::class, 'destroy']);
