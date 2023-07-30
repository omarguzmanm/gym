<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;

    protected $fillable = ['id_diet','id_user', 'age', 'gender', 'weight',
    'height', 'activity', 'notes', 'goal', 'meal_frecuency',
    'meal_schedule', 'regularly_consumed', 'hours_sleep',
    'stress_level', 'substance_use'];

    // Laravel follows a convention and it expects your table to be plural from the model name.
    protected $table = 'analysis'; 

    public function diets(){
        return $this->belongsTo(Diet::class, 'id_diet');
    }
    
    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }


}
