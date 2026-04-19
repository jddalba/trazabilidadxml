<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table = 'especies';
    protected $fillable = [
        'codigo',
        'especie_comercial',
        'especie_cientifica',
        'especie_al3',
        'pais_al3',
        'metodo_produccion',
        'cod_conservacion',
        'cod_presentacion'
    ];
    public function metodo()
    {
        return $this->belongsTo(\App\Models\MetodoProduccion::class, 'metodo_produccion');
    }
}

