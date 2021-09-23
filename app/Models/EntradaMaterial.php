<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaMaterial extends Model
{
    use HasFactory;

    protected $table='entrada_materiales';

    function material(){
        return $this->belongsTo(Material::class);
    }
}
