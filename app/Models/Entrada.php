<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Entrada extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'fecha',
        'proveedor_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='entradas';

    function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    function materiales(){
        return $this->belongsToMany(Material::class);
    }

    public static function obtenerDatosTrimestre(){
        $primer_dia= DB::select('select sum(cantidad) as primer_dia  from entrada_materiales where created_at >= DAY(now())-5 AND created_at <= now()', [1]);
        $segundo_dia= DB::select('select sum(cantidad) as segundo_dia  from entrada_materiales where created_at >= DAY(now())-4 AND created_at <= now()', [1]);
        $tercer_dia= DB::select('select sum(cantidad) as tercer_dia  from entrada_materiales where created_at >= DAY(now())-3 AND created_at <= now()', [1]);
        $cuarto_dia= DB::select('select sum(cantidad) as cuarto_dia  from entrada_materiales where created_at >= DAY(now())-2 AND created_at <= now()', [1]);
        $quinto_dia= DB::select('select sum(cantidad) as quinto_dia  from entrada_materiales where created_at >= DAY(now())-1 AND created_at <= now()', [1]);
        $datos=[$primer_dia,$segundo_dia,$tercer_dia,$cuarto_dia,$quinto_dia];
        return $datos;
    }
}
