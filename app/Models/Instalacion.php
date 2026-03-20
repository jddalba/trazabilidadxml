<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Instalacion extends Model
{
    protected $table = 'instalaciones';
    protected $fillable = [
        'nombre',
        'codigo_rega',
        'establecimiento_venta'
    ];
}
