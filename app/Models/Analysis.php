<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;

    protected $fillable = ['diet_id','user_id', 'age', 'gender', 'weight',
    'height','imc','activity', 'notes', 'goal', 'meal_frecuency',
    'meal_schedule', 'regularly_consumed'];

    // Laravel follows a convention and it expects your table to be plural from the model name.
    protected $table = 'analysis'; 

    public function diets(){
        return $this->belongsTo(Diet::class, 'diet_id');
    }
    
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
