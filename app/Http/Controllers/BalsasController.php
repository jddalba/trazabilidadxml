<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balsa;
use App\Models\Instalacion;

class BalsasController extends Controller
{

    public function index()
    {
        $balsas = Balsa::with('instalacion')->get();

        return view('balsas.index', compact('balsas'));
    }

    public function create()
    {
        $instalaciones = Instalacion::all();

        return view('balsas.create', compact('instalaciones'));
    }

    public function store(Request $request)
    {

        Balsa::create([
            'nombre' => $request->nombre,
            'instalacion_id' => $request->instalacion_id
        ]);

        return redirect()->route('balsas.index');

    }

    public function edit($id)
    {

        $balsa = Balsa::find($id);
        $instalaciones = Instalacion::all();

        return view('balsas.edit', compact('balsa','instalaciones'));

    }

    public function update(Request $request, $id)
    {

        $balsa = Balsa::find($id);

        $balsa->update([
            'nombre' => $request->nombre,
            'instalacion_id' => $request->instalacion_id
        ]);

        return redirect()->route('balsas.index');

    }

    public function destroy($id)
    {

        $balsa = Balsa::find($id);

        $balsa->delete();

        return redirect()->route('balsas.index');

    }

}
