<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('students', [StudentController::class, 'index'])->name('student.index');
Route::get('student/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('student', [StudentController::class, 'create'])->name('student.create');
Route::post('student', [StudentController::class, 'store'])->name('student.store');
Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/edit/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('teacher', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/edit/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');