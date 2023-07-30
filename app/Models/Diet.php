<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = ['description'];


    // public function analysis(){
    //     return $this->hasMany(Analysis::class, 'id_user');
    // }

    public function analysis(){
        return $this->hasMany(Analysis::class, 'id_diet');
    }



}
