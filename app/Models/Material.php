<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table='materiales';

    function tipoMaterial(){
        return $this->belongsTo(TipoMaterial::class);
    }
    function marca(){
        return $this->belongsTo(Marca::class);
    }
    function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    function entradaMaterial(){
        return $this->hasMany(EntradaMaterial::class);
    }

}
