<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    protected $table = 'ventas';

    protected $fillable = [
        'num_envio',
        'num_identificacion_establec',
        'fecha'
    ];

    // 🔗 Relación: una venta tiene muchas líneas
    public function lineas()
    {
        return $this->hasMany(VentaLinea::class);
    }

}
