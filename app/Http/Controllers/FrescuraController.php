<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frescura;

class FrescuraController extends Controller
{

    public function index()
    {
        $frescura = Frescura::all();

        return view('frescura.index', compact('frescura'));
    }

    public function create()
    {
        return view('frescura.create');
    }

    public function store(Request $request)
    {

        Frescura::create([
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('frescura.index');

    }

    public function edit($id)
    {

        $frescura = Frescura::find($id);

        return view('frescura.edit', compact('frescura'));

    }

    public function update(Request $request, $id)
    {

        $frescura = Frescura::find($id);

        $frescura->update([
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('frescura.index');

    }

    public function destroy($id)
    {

        $frescura = Frescura::find($id);

        $frescura->delete();

        return redirect()->route('frescura.index');

    }

}
