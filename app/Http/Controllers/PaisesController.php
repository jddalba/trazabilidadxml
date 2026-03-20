<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisesController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(Request $request)
    {
        Pais::create([
            'nombre' => $request->nombre,
            'codigo_al3' => $request->codigo_al3
        ]);
        return redirect()->route('paises.index');
    }

    public function edit($id)
    {
        $pais = Pais::find($id);
        return view('paises.edit', compact('pais'));
    }

    public function update(Request $request, $id)
    {
        $pais = Pais::find($id);
        $pais->update([
            'nombre' => $request->nombre,
            'codigo_al3' => $request->codigo_al3
        ]);
        return redirect()->route('paises.index');
    }

    public function destroy($id)
    {
        $pais = Pais::find($id);
        $pais->delete();
        return redirect()->route('paises.index');
    }
}
