<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Database\Factories\CourseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(8)->create();

        foreach($courses as $course){
            Image::factory(1)->create([
                'imageable_id' =>$course->id,
                'imageable_type'=>'App\Models\Course',
            ]);

            Requirement::factory(4)->create([
                'course_id'=> $course->id,
            ]);

            Goal::factory(4)->create([
                'course_id'=> $course->id,
            ]);

            $sections= Section::factory(4)->create([
                'course_id'=> $course->id,
            ]);
            foreach($sections as $section){
                $lessons= Lesson::factory(4)->create(['section_id'=> $section->id]);

                foreach($lessons as $lesson){
                    Description::factory(1)->create(['lesson_id'=>$lesson->id]);
                }
            }
        }
    }
}
