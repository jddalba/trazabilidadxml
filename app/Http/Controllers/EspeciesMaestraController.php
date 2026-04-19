<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EspecieMaestra;

class EspeciesMaestraController extends Controller
{

    public function index()
    {
        $especies = EspecieMaestra::all();

        return view('especies_maestra.index', compact('especies'));
    }

    public function create()
    {
        return view('especies_maestra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_comercial' => 'required',
            'nombre_cientifico' => 'required',
            'codigo_al3' => 'required',
        ]);
        EspecieMaestra::create([

            'nombre_comercial' => $request->nombre_comercial,
            'nombre_cientifico' => $request->nombre_cientifico,
            'codigo_al3' => $request->codigo_al3

        ]);

        return redirect()->route('especies-maestra.index');
    }

    public function edit($id)
    {
        $especie = EspecieMaestra::find($id);

        return view('especies_maestra.edit', compact('especie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_comercial' => 'required',
            'nombre_cientifico' => 'required',
            'codigo_al3' => 'required',
        ]);
        $especie = EspecieMaestra::find($id);

        $especie->update([

            'nombre_comercial' => $request->nombre_comercial,
            'nombre_cientifico' => $request->nombre_cientifico,
            'codigo_al3' => $request->codigo_al3

        ]);

        return redirect()->route('especies-maestra.index');
    }

    public function destroy($id)
    {
        $especie = EspecieMaestra::find($id);

        $especie->delete();

        return redirect()->route('especies-maestra.index');
    }

}
