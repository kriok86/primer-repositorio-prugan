<?php

namespace App\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    
    use WithPagination;

    public $search;
    
    public function render()
    {
        $courses = Course::where('title', 'like', '%'.$this->search.'%')
                ->where('user_id',auth()->user()->id)
                ->paginate(8);
                        //->latest('id');         
        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function limpiar_page(){
        $this->reset('paginators');
    }
}
