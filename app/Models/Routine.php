<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'exercise_routine_user', 'routine_id', 'user_id')
            ->withPivot('exercise_id');
    }
    
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_routine_user', 'routine_id', 'exercise_id')
            ->withPivot('user_id');
    }
    

}