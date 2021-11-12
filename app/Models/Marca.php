<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Marca extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='marcas';

    function materiales(){
        return $this->hasMany(Material::class);
    }

    public static function obtenerMarca($id){
        $dato=Marca::select('nombre')
        ->where('id','=',$id)
        ->first();
        return $dato->nombre;
    }


}
