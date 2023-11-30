<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;


class MisCursos extends Component
{
   public $course;
   
    public function enrolled(Course $courses){
        $courses->students()->attach(auth()->user()->id);

        
    }

    public function mount(Course $courses){
        $this->course = $courses;
    }
    
    
    public function render()
    {
        $courses = Course::where('id', auth()->user()->id)->get();
        
        return view('livewire.mis-cursos', compact('courses'));
    }
}
