<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'age', 'gender', 'weight',
    'height', 'activity', 'notes', 'goal', 'meal_frecuency',
    'meal_schedule', 'regularly_consumed', 'hours_sleep',
    'stress_level', 'substance_use'];

    // Laravel follows a convention and it expects your table to be plural from the model name.
    protected $table = 'analysis'; 

    public function diet(){
        return $this->hasMany(Diet::class, 'id_analysis');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
