<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balsa extends Model
{

    protected $table = 'balsas';

    protected $fillable = [
        'nombre',
        'instalacion_id'
    ];

    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }

}
