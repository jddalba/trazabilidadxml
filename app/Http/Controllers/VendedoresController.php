<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedoresController extends Controller
{

    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {

        Vendedor::create([

            'nombre' => $request->nombre,
            'tipo_documento' => $request->tipo_documento,
            'nif' => $request->nif,
            'direccion' => $request->direccion

        ]);

        return redirect()->route('vendedores.index');

    }

    public function edit($id)
    {

        $vendedor = Vendedor::find($id);

        return view('vendedores.edit', compact('vendedor'));

    }

    public function update(Request $request, $id)
    {

        $vendedor = Vendedor::find($id);

        $vendedor->update([

            'nombre' => $request->nombre,
            'tipo_documento' => $request->tipo_documento,
            'nif' => $request->nif,
            'direccion' => $request->direccion


        ]);

        return redirect()->route('vendedores.index');

    }

    public function destroy($id)
    {

        $vendedor = Vendedor::find($id);

        $vendedor->delete();

        return redirect()->route('vendedores.index');

    }

}
