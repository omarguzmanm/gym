<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;

    protected $fillable = ['age', 'gender', 'weight',
    'height','imc','activity', 'notes', 'goal', 'meal_frecuency',
    'meal_schedule', 'regularly_consumed'];

    // Laravel follows a convention and it expects your table to be plural from the model name.
    // protected $table = 'analyses'; 
    
    public function diets(){
        return $this->belongsToMany(Diet::class, 'analysis_diet_user', 'analysis_id', 'diet_id')->withPivot('analysis_id', 'diet_id', 'user_id');
    }
    
    public function users(){
        return $this->belongsToMany(User::class, 'analysis_diet_user')->withPivot('analysis_id', 'diet_id', 'user_id');
    }


}
