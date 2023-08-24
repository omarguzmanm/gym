<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'plan', 'price', ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_membership');
    }
}