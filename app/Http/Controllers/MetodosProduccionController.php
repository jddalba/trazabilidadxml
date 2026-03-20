<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoProduccion;

class MetodosProduccionController extends Controller
{

    public function index()
    {

        $metodos = MetodoProduccion::all();

        return view('metodos_produccion.index', compact('metodos'));

    }

    public function create()
    {

        return view('metodos_produccion.create');

    }

    public function store(Request $request)
    {

        MetodoProduccion::create([
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('metodos-produccion.index');

    }

    public function edit($id)
    {

        $metodo = MetodoProduccion::find($id);

        return view('metodos_produccion.edit', compact('metodo'));

    }

    public function update(Request $request, $id)
    {

        $metodo = MetodoProduccion::find($id);

        $metodo->update([
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('metodos-produccion.index');

    }

    public function destroy($id)
    {

        $metodo = MetodoProduccion::find($id);

        $metodo->delete();

        return redirect()->route('metodos-produccion.index');

    }

}
