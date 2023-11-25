<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    protected $fillable = ['description', 'type', 'kcal'];

    // public function analysis(){
    //     return $this->hasMany(Analysis::class, 'id_user');
    // }

    public function analyses()
    {
        return $this->belongsToMany(Analysis::class, 'analysis_diet_user')->withPivot('analysis_id', 'diet_id', 'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'analysis_diet_user')->withPivot('analysis_id', 'diet_id', 'user_id');
    }

    // Relación muchos a muchos con la tabla de comidas
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'diet_food', 'diet_id', 'food_id')
            ->withPivot('name');
    }

}
