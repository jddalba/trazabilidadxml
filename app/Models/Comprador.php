<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{

    protected $table = 'compradores';

    protected $fillable = [
        'nombre',
        'nif',
        'direccion'
    ];

}
