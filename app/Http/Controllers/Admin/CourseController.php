<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
//use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Models\Calificacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){

        $courses = Course::where('status', 2)->paginate();

        return view('admin.courses.index', compact('courses'));
    }
    public function show(Course $course){

        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){

        //$this->authorize('revision', $course);

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image ) {
            return back()->with('info', 'No se puede publicar un curso que no este completo');
        }
        
        $course->status=3;
        $course->save();
       
        //aca se va a enviar el correo electronico de confirmacion

        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->mail)->send($mail);

        return redirect()->route('admin.courses.index')->with('info','El curso se publico con exito');
    }

    public function notas(Course $course){
        $course->students();

        return view('admin.courses.notas', compact('course'));
    }
}
