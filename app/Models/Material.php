<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Material extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'peso',
        'tamaño',
        'cantidad',
        'tipo_id',
        'marca_id',
        'estado',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='materiales';

    function tipo(){
        return $this->belongsTo(TipoMaterial::class);
    }
    function marca(){
        return $this->belongsTo(Marca::class);
    }
    function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    function entradaMaterial(){
        return $this->belongsToMany(EntradaMaterial::class);
    }
}
