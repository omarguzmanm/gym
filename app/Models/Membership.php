<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'plan', 'price' ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'membership_user')
            ->withPivot(['inscription', 'renew_date', 'status']);
            // ->withTimestamps(); // Esto cargará automáticamente created_at y updated_at en la tabla pivote
    }
}