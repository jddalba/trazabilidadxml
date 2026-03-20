<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentacion;

class PresentacionesController extends Controller
{

    public function index()
    {
        $presentaciones = Presentacion::all();

        return view('presentaciones.index', compact('presentaciones'));
    }

    public function create()
    {
        return view('presentaciones.create');
    }

    public function store(Request $request)
    {

        Presentacion::create([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('presentaciones.index');

    }

    public function edit($id)
    {

        $presentacion = Presentacion::find($id);

        return view('presentaciones.edit', compact('presentacion'));

    }

    public function update(Request $request, $id)
    {

        $presentacion = Presentacion::find($id);

        $presentacion->update([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('presentaciones.index');

    }

    public function destroy($id)
    {

        $presentacion = Presentacion::find($id);

        $presentacion->delete();

        return redirect()->route('presentaciones.index');

    }

}
