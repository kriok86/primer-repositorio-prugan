<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'nota',
        'user_id',
    ];
    
    
    //relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class);
    }
}
