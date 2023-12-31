<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;



class CoursePolicy
{

    
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $courses){
        return $courses->students->contains($user->id);
    }
    public function published(?User $user, Course $courses){
        if ($courses->status == 3) {
            return true;
        }else {
            return false;
        }
    }
    public function dicatated(User $user, Course $course){
        if ($course->user_id == $user->id) {
            return true;
        }else {
            return false;
        }
    }

    public function revision(User $user, Course $course){
        if ($course->status == 2) {
            return true;
        }else {
            return false;
        }
    }
}
