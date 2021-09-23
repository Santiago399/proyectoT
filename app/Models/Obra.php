<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
    protected $table = "obras";

    function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    function salida(){
        return $this->hasMany(Salida::class);
    }
}
