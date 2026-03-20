<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecieMaestra extends Model
{

    protected $table = 'especies_maestras';

    protected $fillable = [
        'nombre_comercial',
        'nombre_cientifico',
        'codigo_al3'
    ];

}
