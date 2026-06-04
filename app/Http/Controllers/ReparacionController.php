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
}
