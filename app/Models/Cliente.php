<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'celular',
        'clave',
        'direcccion',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='clientes';


    public static function obtenerDato($id){
        $dato=Cliente::select('nombre')
        ->where('id','=',$id )
        ->first();
        return $dato->nombre;
    }
}
