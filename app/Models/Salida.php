<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table='salidas';

    function obras(){
        return $this->belongsTo(Obra::class);
    }

    function salidaMaterial(){
        return $this->hasMany(SalidaMaterial::class);
    }
}

