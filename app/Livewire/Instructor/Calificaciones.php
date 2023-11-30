<?php

namespace App\Livewire\Instructor;

use App\Models\Calificacion;
use App\Models\Course;
use Livewire\Component;

class Calificaciones extends Component
{
    protected $rules=[
        'calificacion.name'=>'required'
    ];
    public $course, $search, $calificacion;
    
    public function mount(Course $course){
        $this->course= $course;
        $this->calificacion = new Calificacion();
    }
    
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%'.$this->search. '%')->paginate(4);
        return view('livewire.instructor.calificaciones', compact('students'));
    }
    
    public function edit(Calificacion $calificacion){
        $this->calificacion = $calificacion;
    }
}
