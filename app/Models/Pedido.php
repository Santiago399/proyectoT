<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fechaEnvio',
        'material_id',
        'cantidad',
        'descripcion',
        'estado',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='pedidos';

    function materiales(){
        return $this->belongsTo(Material::class);
    }

}
