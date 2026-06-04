<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function index()
    {
        $reparaciones = Reparacion::all();
        
        return view('reparaciones.index', compact('reparaciones'));
    }

    public function create()
    {
        return view('reparaciones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion_falla' => 'required|string',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Ingresado,En reparación,Reparado,Entregado',
        ], [
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'marca.required' => 'La marca es obligatoria.',
            'modelo.required' => 'El modelo es obligatorio.',
            'descripcion_falla.required' => 'La descripción de la falla es obligatoria.',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'La fecha de ingreso debe ser una fecha válida.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ]);

        Reparacion::create($validated);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación registrada correctamente.');
    }
}
