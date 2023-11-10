<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Livewire\CourseStatus;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{courses}',[CourseController::class, 'show'])->name('courses.show');

Route::post('cursos/{courses}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.erolled');

Route::get('course-status/{courses}', CourseStatus::class)->name('courses.status');
