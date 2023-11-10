<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class CoursesLesson extends Component
{
    public $section, $lesson, $name, $url;
    protected $rules = [
        'lesson.name'=>'required',
        'lesson.url'=>['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
        
    ];

    public function mount(Section $section){
        $this->section = $section;

        $this->lesson = new Lesson();
    }
    
    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function store(){
        $rules = [
            'name'=>'required',
            'url'=>['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
            
        ];
        $this->validate($rules);

        Lesson::create([
            'name'=> $this->name,
            'url'=> $this->url,
            'section_id'=> $this->section->id
        ]);
        $this->reset(['name', 'url']);
        $this->section = Section::find($this->section->id);
    }

    public function edit(Lesson $lesson){
        $this->resetValidation();
        $this->lesson = $lesson;
       
    }

    public function update(){
        $this->validate();
        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->section = Section::find($this->section->id);
    }

    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->section = Section::find($this->section->id);
    }

    public function cancel(){
        $this->lesson = new Lesson();
    }
}
