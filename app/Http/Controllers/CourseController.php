<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index');
    }

    public function show(Course $courses){
        return view('courses.show', compact('courses'));
    }

    public function enrolled(Course $courses){
        $courses->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $courses);
    }

  
}
