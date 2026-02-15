<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $fillable = [
        'tipo_tramite',
        'idvehicular_path',
        'licencia_path',
        'soat_path',
        'certificacion_path',
        'status',
        'verificado', // Agregar el nuevo campo
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tarjetaCirculacion()
    {
        return $this->hasOne(TarjetaCirculacion::class);
    }
}
