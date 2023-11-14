<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;
use Livewire\Attributes\Layout;
use  Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{

    use AuthorizesRequests;
    public $course, $current;

    public function mount(Course $courses){
        $this->course = $courses;

        foreach ($courses->lessons as $lesson) {
            if (!$lesson->complete) {
                $this->current = $lesson;      
                
                break;
            }
        }
        if (!$this->current) {
            $this->current = $courses->lessons->last();
        }

        $this->authorize('enrolled', $courses);
    }

    public function render()
    {
        return view('livewire.course-status');
                
                
    }

    //Metodos

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;

          
    }
    public function complete(){
        if($this->current->complete){
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades computadas

    public function getIndexProperty(){
       return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty(){
        if ($this->index == 0) {
           return  null;
        }else{
            return $this->course->lessons[$this->index -1];
        }
    }
    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count()-1) {
            return null;
        }else{
            return $this->course->lessons[$this->index +1];
        }
    }
    public function getAdvanceProperty(){
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if($lesson->complete){
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        return round($advance, 2);
    }

}
