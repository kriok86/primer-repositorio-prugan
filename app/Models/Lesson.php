<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
        
    use HasFactory;
    protected $guarded = ['id'];

    public function getCompleteAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //realcion uno a uno
    public function description(){
        return $this->hasOne('App\Models\Description');
    }
    //relacion uno a muchos inversa

    public function sections(){
        return $this->belongsTo('App\Models\Section');
    }

    //relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

}
