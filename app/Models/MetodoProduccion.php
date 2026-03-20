<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoProduccion extends Model
{
    protected $table = 'metodos_produccion_maestras';
    protected $fillable = [
        'descripcion'
    ];
}
