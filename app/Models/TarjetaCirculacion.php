<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaCirculacion extends Model
{
    use HasFactory;

    protected $table = 'tarjetas_circulacion';

    protected $fillable = [
        'empresa_asociacion',
        'razon_social',
        'vehiculo',
        'placa',
        'color',
        'marca',
        'chasis',
        'tipo_servicio',
        'numero_motor',
        'fecha_expedicion',
        'fecha_vencimiento',
        'tramite_id',
    ];

    public function tramite()
    {
        return $this->belongsTo(Tramite::class);
    }
}
