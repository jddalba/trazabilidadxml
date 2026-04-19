<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendedor;
use App\Models\Comprador;
use App\Models\Especie;

class VentaLinea extends Model
{

    protected $table = 'venta_lineas';

    protected $fillable = [
        'venta_id',
        'instalacion_id',
        'especie_id',
        'calibre',     // 🔥 nuevo
        'frescura',   // 🔥 nuevo
        'lote',
        'cantidad',
        'vendedor_id',
        'comprador_id'
    ];

    public function instalacion()
    {
        return $this->belongsTo(\App\Models\Instalacion::class);
    }

    public function especie()
    {
        return $this->belongsTo(\App\Models\Especie::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(\App\Models\Vendedor::class);
    }

    public function comprador()
    {
        return $this->belongsTo(\App\Models\Comprador::class);
    }


}
