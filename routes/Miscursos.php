<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\MisCursos;


Route::redirect('','Miscursos/misCursos');

Route::get('misCursos', MisCursos::class)->name('Miscursos.misCursos.index');

