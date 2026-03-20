<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Conservacion extends Model
{
    protected $table = 'conservaciones_maestras';
    protected $fillable = [
        'codigo',
        'descripcion'
    ];
}
