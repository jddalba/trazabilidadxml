<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;

class InstalacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instalaciones = Instalacion::all();
        return view('instalaciones.index', compact('instalaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instalaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Instalacion::create([
            'nombre' => $request->nombre,
            'codigo_rega' => $request->codigo_rega,
            'establecimiento_venta' => $request->establecimiento_venta
        ]);

        return redirect('/instalaciones');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instalacion = Instalacion::find($id);
        return view('instalaciones.edit', compact('instalacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $instalacion = Instalacion::find($id);
        $instalacion->update([
            'nombre' => $request->nombre,
            'codigo_rega' => $request->codigo_rega,
            'establecimiento_venta' => $request->establecimiento_venta
        ]);

        return redirect()->route('instalaciones.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instalacion = Instalacion::find($id);
        $instalacion->delete();
        return redirect()->route('instalaciones.index');
    }
}
