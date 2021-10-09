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

    function material(){
        return $this->hasMany(Material::class);
    }
}
