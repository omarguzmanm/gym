<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'group',
        'group',
        'info',
        'portion'
    ];

    // Relación muchos a muchos con la tabla de dietas
    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_food', 'food_id', 'diet_id');
    }

}
