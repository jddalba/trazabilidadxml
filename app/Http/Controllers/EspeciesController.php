<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;
use App\Models\EspecieMaestra;
use App\Models\Pais;
use App\Models\MetodoProduccion;
use App\Models\Conservacion;
use App\Models\Presentacion;
use App\Models\Frescura;
use App\Models\Calibre;

class EspeciesController extends Controller
{

    public function index()
    {
        //$especies = Especie::orderBy('codigo')->get();
        $especies = Especie::with('metodo')->orderBy('codigo')->get();

        return view('especies.index', compact('especies'));
    }

    public function create()
    {

        $especies_maestras = EspecieMaestra::all();
        $paises = Pais::all();
        $metodos = MetodoProduccion::all();
        $conservaciones = Conservacion::all();
        $presentaciones = Presentacion::all();
        $frescura = Frescura::all();
        $calibres = Calibre::all();

        return view('especies.create', compact(
            'especies_maestras',
            'paises',
            'metodos',
            'conservaciones',
            'presentaciones',
            'frescura',
            'calibres'
        ));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        // ✅ VALIDAR PRIMERO
        $request->validate([
            'codigo' => 'required|numeric',
            'especie_maestra_id' => 'required|exists:especies_maestras,id',
            'pais_al3' => 'required',
            'metodo_produccion' => 'required',
            'cod_conservacion' => 'required',
            'cod_presentacion' => 'required',
        ]);

        // ✅ FORMATEAR DESPUÉS
        $codigo = str_pad($request->codigo, 2, '0', STR_PAD_LEFT);

        // ✅ CHECK UNIQUE
        if (Especie::where('codigo', $codigo)->exists()) {
            return back()->withErrors(['codigo' => 'El código ya existe'])->withInput();
        }

        $maestra = EspecieMaestra::find($request->especie_maestra_id);

        if (!$maestra) {
            return back()->withErrors(['especie_maestra_id' => 'Especie no válida'])->withInput();
        }

        // ✅ CREAR
        Especie::create([
            'codigo' => $codigo,
            'especie_comercial' => $maestra->nombre_comercial,
            'especie_cientifica' => $maestra->nombre_cientifico,
            'especie_al3' => $maestra->codigo_al3,
            'pais_al3' => $request->pais_al3,
            'metodo_produccion' => $request->metodo_produccion,
            'cod_conservacion' => $request->cod_conservacion,
            'cod_presentacion' => $request->cod_presentacion,
            'cod_frescura' => $request->cod_frescura ?: null,
            'cod_calibre' => $request->cod_calibre ?: null,
        ]);

        return redirect()->route('especies.index')
            ->with('success', 'Especie creada correctamente');
    }


    public function edit($id)
    {

        $especie = Especie::find($id);

        $especies_maestras = EspecieMaestra::all();
        $paises = Pais::all();
        $metodos = MetodoProduccion::all();
        $conservaciones = Conservacion::all();
        $presentaciones = Presentacion::all();
        $frescura = Frescura::all();
        $calibres = Calibre::all();

        return view('especies.edit', compact(
            'especie',
            'especies_maestras',
            'paises',
            'metodos',
            'conservaciones',
            'presentaciones',
            'frescura',
            'calibres'
        ));
    }

    public function update(Request $request, $id)
    {
        $especie = Especie::findOrFail($id);

        $codigo = str_pad($request->codigo, 2, '0', STR_PAD_LEFT);

        $request->validate([
            'codigo' => 'required|numeric',
            'especie_maestra_id' => 'required|exists:especies_maestras,id',
            'pais_al3' => 'required',
            'metodo_produccion' => 'required',
        ]);

        if (Especie::where('codigo', $codigo)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['codigo' => 'El código ya existe']);
        }

        $maestra = EspecieMaestra::find($request->especie_maestra_id);

        $especie->update([
            'codigo' => $codigo,
            'especie_comercial' => $maestra->nombre_comercial,
            'especie_cientifica' => $maestra->nombre_cientifico,
            'especie_al3' => $maestra->codigo_al3,
            'pais_al3' => $request->pais_al3,
            'metodo_produccion' => $request->metodo_produccion,
            'cod_conservacion' => $request->cod_conservacion ?? null,
            'cod_presentacion' => $request->cod_presentacion ?? null,
            'cod_frescura' => $request->cod_frescura ?? null,
            'cod_calibre' => $request->cod_calibre ?? null,
        ]);

        return redirect()->route('especies.index');
    }

    public function destroy($id)
    {

        $especie = Especie::find($id);

        $especie->delete();

        return redirect()->route('especies.index');

    }

}
