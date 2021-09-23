<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table='proveedores';

    function entrada(){
        return $this->hasMany(Entrada::class);
    }

    function material(){
        return $this->hasMany(Material::class);
    }
}
