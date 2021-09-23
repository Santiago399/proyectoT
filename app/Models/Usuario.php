<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table='usuarios';

    function rol(){
        return $this->belongsTo(Rol::class);
    }

    function obra(){
        return $this->hasMany(Obra::class);
    }
}
