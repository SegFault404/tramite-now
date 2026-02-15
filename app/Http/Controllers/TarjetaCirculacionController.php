<?php

namespace App\Http\Controllers;

use App\Models\TarjetaCirculacion;
use App\Models\Tramite;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class TarjetaCirculacionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tramite_id' => 'required|exists:tramites,id',
            'empresa_asociacion' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'vehiculo' => 'required|string|max:255',
            'placa' => 'required|string|max:20',
            'color' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'chasis' => 'required|string|max:50',
            'tipo_servicio' => 'required|string|max:50',
            'numero_motor' => 'required|string|max:50',
            'fecha_expedicion' => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
        ]);

        // Marca el trámite como verificado
        $tramite = Tramite::findOrFail($validated['tramite_id']);
        $tramite->verificado = true;
        $tramite->save();

        // Guarda los datos en la tabla tarjetas_circulacion
        $tarjeta = new TarjetaCirculacion();
        $tarjeta->tramite_id = $validated['tramite_id'];
        $tarjeta->empresa_asociacion = $validated['empresa_asociacion'];
        $tarjeta->razon_social = $validated['razon_social'];
        $tarjeta->vehiculo = $validated['vehiculo'];
        $tarjeta->placa = $validated['placa'];
        $tarjeta->color = $validated['color'];
        $tarjeta->marca = $validated['marca'];
        $tarjeta->chasis = $validated['chasis'];
        $tarjeta->tipo_servicio = $validated['tipo_servicio'];
        $tarjeta->numero_motor = $validated['numero_motor'];
        $tarjeta->fecha_expedicion = $validated['fecha_expedicion'];
        $tarjeta->fecha_vencimiento = $validated['fecha_vencimiento'];
        $tarjeta->save();

        return redirect()->route('tramites.verified')->with('success', 'Tarjeta de circulación generada, datos guardados y trámite movido a verificados.');
    }

    public function pdf($id){
        // Obtener los datos de la tarjeta
        $tarjeta = TarjetaCirculacion::findOrFail($id);

        // Generar el PDF
        $pdf = PDF::loadView('tarjetas.pdf', [
            'numero' => $tarjeta->id,
            'razon_social' => $tarjeta->razon_social,
            'placa' => $tarjeta->placa,
            'color' => $tarjeta->color,
            'marca' => $tarjeta->marca,
            'chasis' => $tarjeta->chasis,
            'tipo_servicio' => $tarjeta->tipo_servicio,
            'numero_motor' => $tarjeta->numero_motor,
            'fecha_expedicion' => $tarjeta->fecha_expedicion,
            'fecha_vencimiento' => $tarjeta->fecha_vencimiento,
            'tramite_id' => $tarjeta->tramite_id,
        ]);
        return $pdf->stream();
    }
}
