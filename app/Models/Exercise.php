<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'muscle_group', 'type', 'equipment', 'media'];

    public function routines()
    {
        return $this->belongsToMany(Routine::class, 'exercise_routine_user', 'exercise_id', 'routine_id')
            ->withPivot('user_id')->withTimestamps();
    }


}