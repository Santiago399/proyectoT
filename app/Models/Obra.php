<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Obra extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaEntrega',
        'estado',
        'descripcion',
        'categoria_id',
        'usuario_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table = "obras";

    function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    function salida(){
        return $this->hasMany(Salida::class);
    }

    public static function obtenerObra($id){
        $dato=Obra::select('id,fechaInicio,fechaEntrega,descripcion')
        ->where('id','=',$id)
        ->first();
        return $dato;
    }

}
