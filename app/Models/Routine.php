<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'level', 'duration'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'exercise_routine_user', 'routine_id', 'user_id')
            ->withPivot('exercise_id')->withTimestamps();
    }
    
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_routine_user', 'routine_id', 'exercise_id')
            ->withPivot('user_id', 'sets', 'reps')->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    

}