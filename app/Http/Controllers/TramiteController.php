<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class TramiteController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view tramites', only: ['index', 'verificados']),
            new Middleware('permission:create tramites', only: ['create', 'store']),
            new Middleware('permission:update tramites', only: ['updateStatus']),
            new Middleware('permission:seguimiento tramites', only: ['seguimiento']),
        ];
    }

    // Muestra el formulario para crear un trámite
    public function create()
    {
        return view('tramites.create');
    }

    public function edit($id)
    {
        $tramite = Tramite::with('user')->findOrFail($id);
        return view('tramites.update', compact('tramite'));
    }

    // Guarda un trámite
    public function store(Request $request)
    {
        $request->validate([
            'tipo_tramite' => 'required|in:tarjeta_circulacion_carga_descarga,tarjeta_circulacion_mototaxi,tarjeta_circulacion_automoviles',
            'idvehicular' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'licencia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'soat' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificacion' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tramite = new Tramite();
        $tramite->tipo_tramite = $request->tipo_tramite;

        if ($request->hasFile('idvehicular')) {
            $tramite->idvehicular_path = $request->file('idvehicular')->store('documentos/idvehicular', 'public');
        }

        if ($request->hasFile('licencia')) {
            $tramite->licencia_path = $request->file('licencia')->store('documentos/licencias', 'public');
        }

        if ($request->hasFile('soat')) {
            $tramite->soat_path = $request->file('soat')->store('documentos/soat', 'public');
        }

        if ($request->hasFile('certificacion')) {
            $tramite->certificacion_path = $request->file('certificacion')->store('documentos/certificaciones', 'public');
        }

        // Asociar el trámite al usuario autenticado
        $tramite->user_id = Auth::id();

        $tramite->save();

        return redirect()->route('tramites.create')->with('message', 'Trámite guardado exitosamente.');
    }

    // Actualiza el estado del trámite
    public function updateStatus(Request $request, $id)
    {
        $tramite = Tramite::findOrFail($id);

        $request->validate([
            'status' => 'required|in:aprobado,rechazado',
        ]);

        $nuevoEstado = $request->input('status');
        $tramite->status = $nuevoEstado;

        if ($nuevoEstado === 'rechazado') {
            $tramite->verificado = true;
        }

        $tramite->save();

        if ($nuevoEstado === 'rechazado') {
            return redirect()->route('tramites.verified')->with('success', 'El trámite fue rechazado y se movió a verificados.');
        } elseif ($nuevoEstado === 'aprobado') {
            return redirect()->route('tramites.list')->with('success', 'El trámite fue aprobado y sigue pendiente de verificación.');
        }
    }

    // Muestra la lista de trámites aprobados no verificados
    // Muestra la lista de trámites aprobados no verificados
    public function index()
    {
        $tramites = Tramite::where(function ($query) {
            $query->whereNull('status')
                ->orWhere('status', 'pendiente')
                ->orWhere('status', 'aprobado'); // Agregar trámites aprobados
        })
        ->where('verificado', false) // Excluir trámites verificados
        ->with('user')
        ->get();

        return view('tramites.list', compact('tramites'));
    }



    // Muestra la lista de trámites verificados
    public function verificados()
    {
        $tramites = Tramite::where('verificado', true)->with('user')->get();
        return view('tramites.verified', compact('tramites'));
    }

    public function seguimiento()
    {
        // Obtener trámites del usuario autenticado, incluyendo la tarjeta de circulación asociada
        $tramites = Tramite::where('user_id', Auth::id())
                            ->with('tarjetaCirculacion') // Cargar la relación de tarjeta de circulación
                            ->get();

        return view('tramites.seguimiento', compact('tramites'));
    }

}
