<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calibre;

class CalibresController extends Controller
{

    public function index()
    {
        $calibre = Calibre::all();

        return view('calibre.index', compact('calibre'));
    }

    public function create()
    {
        return view('calibre.create');
    }

    public function store(Request $request)
    {

        Calibre::create([
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('calibres.index');

    }

    public function edit($id)
    {

        $calibre = Calibre::find($id);

        return view('calibre.edit', compact('calibre'));

    }

    public function update(Request $request, $id)
    {

        $calibre = Calibre::find($id);

        $calibre->update([
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('calibres.index');

    }

    public function destroy($id)
    {

        $calibre = Calibre::find($id);

        $calibre->delete();

        return redirect()->route('calibres.index');

    }

}
