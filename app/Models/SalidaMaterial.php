<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaMaterial extends Model
{
    use HasFactory;
    protected $table='salida_materiales';

    function material(){
        return $this->belongsTo(Material::class);
    }

    function salida(){
        return $this->belongsTo(salida::class);
    }

}
