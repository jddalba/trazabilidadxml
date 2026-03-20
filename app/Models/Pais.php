<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Pais extends Model
{
    protected $table = 'paises_maestras';
    protected $fillable = [
        'nombre',
        'codigo_al3'
    ];
}
