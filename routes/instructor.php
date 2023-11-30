<?php

use App\Http\Controllers\Instructor\CalificacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Livewire\Instructor\CoursesAsistencia;
use App\Livewire\Instructor\CoursesCurriculum;
use App\Livewire\Instructor\CoursesStudents;
use App\Livewire\Instructor\Asistencias;

Route::redirect('','instructor/courses');
Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)->name('courses.students');

Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');
//rutas calificaciones(notas)
Route::get('courses/{course}/notas', [CourseController::class, 'notas'])->name('courses.notas');
//ruta Asistencia
Route::get('courses/{course}/asistencia',[CourseController::class, 'asistencia'])->name('courses.asistencia');


