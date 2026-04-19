<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';

    protected $fillable = [
        'nombre',
        'tipo_documento',
        'nif',
        'direccion'
    ];
    public function getTipoDocumentoTextoAttribute()
    {
        return match((int) $this->tipo_documento) {
            1 => 'CIF',
            2 => 'NIF',
            3 => 'NIE',
            default => 'Desconocido',
        };
    }
}
