<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conservacion;

class ConservacionesController extends Controller
{
    public function index()
    {
        $conservaciones = Conservacion::all();
        return view('conservaciones.index', compact('conservaciones'));
    }
    public function create()
    {
        return view('conservaciones.create');
    }
    public function store(Request $request)
    {
        Conservacion::create([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion
        ]);
        return redirect()->route('conservaciones.index');
    }

    public function edit($id)
    {
        $conservacion = Conservacion::find($id);
        return view('conservaciones.edit', compact('conservacion'));
    }

    public function update(Request $request, $id)
    {
        $conservacion = Conservacion::find($id);
        $conservacion->update([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion
        ]);
        return redirect()->route('conservaciones.index');
    }

    public function destroy($id)
    {
        $conservacion = Conservacion::find($id);
        $conservacion->delete();
        return redirect()->route('conservaciones.index');
    }
}
