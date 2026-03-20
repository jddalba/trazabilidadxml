<?php

namespace App\Services;

use App\Models\EspecieMaestra;
use App\Models\Pais;
use App\Models\MetodoProduccion;
use App\Models\Conservacion;
use App\Models\Presentacion;
use App\Models\Frescura;
use App\Models\Calibre;

class MaestroService
{
    public static function get()
    {
        return [
            'especies_maestra' => EspecieMaestra::all(),
            'paises' => Pais::all(),
            'metodos' => MetodoProduccion::all(),
            'conservaciones' => Conservacion::all(),
            'presentaciones' => Presentacion::all(),
            'frescura' => Frescura::all(),
            'calibres' => Calibre::all()
        ];
    }
}
