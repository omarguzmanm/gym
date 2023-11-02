<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrRecord extends Model
{
    
    use HasFactory;

    protected $table = 'pr_records'; // Especificamos el nombre de la tabla
    protected $fillable = ['user_id', 'exercise', 'pr', 'reps'];

    // Define las relaciones
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
