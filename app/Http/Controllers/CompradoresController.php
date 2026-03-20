<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprador;

class CompradoresController extends Controller
{

    public function index()
    {
        $compradores = Comprador::all();
        return view('compradores.index', compact('compradores'));
    }

    public function create()
    {
        return view('compradores.create');
    }

    public function store(Request $request)
    {

        Comprador::create([

            'nombre' => $request->nombre,
            'nif' => $request->nif,
            'direccion' => $request->direccion

        ]);

        return redirect()->route('compradores.index');

    }

    public function edit($id)
    {

        $compradores = Comprador::find($id);

        return view('compradores.edit', compact('compradores'));

    }

    public function update(Request $request, $id)
    {

        $compradores = Comprador::find($id);

        $compradores->update([

            'nombre' => $request->nombre,
            'nif' => $request->nif,
            'direccion' => $request->direccion

        ]);

        return redirect()->route('compradores.index');

    }

    public function destroy($id)
    {

        $compradores = Comprador::find($id);

        $compradores->delete();

        return redirect()->route('compradores.index');

    }

}
