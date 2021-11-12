<?php

namespace App\Models;

use App\Http\Controllers\ObraController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class TipoMaterial extends Model
{
    use HasApiTokens, HasFactory;
    protected $table='tipo_materiales';

    protected $fillable = [
        'nombre',

    ];
    protected $hidden = [

        'remember_token',
    ];

    function materiales(){
        return $this->hasMany(Material::class);
    }

    public static function obtenerTipo($id){
        $contenido=TipoMaterial::select('nombre')
        ->where('id','=',$id)
        ->first();
        return $contenido->nombre;
    }
}
