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
        'especie_id',
        'lote',
        'fecha_venta',
        'cantidad',
        'vendedor_id',
        'comprador_id'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function comprador()
    {
        return $this->belongsTo(Comprador::class);
    }

}
