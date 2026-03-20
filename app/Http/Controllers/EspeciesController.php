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
        $especies = Especie::orderBy('codigo')->get();

        return view('especies.index', compact('especies'));
    }

    public function create()
    {

        $especies_maestra = EspecieMaestra::all();
        $paises = Pais::all();
        $metodos = MetodoProduccion::all();
        $conservaciones = Conservacion::all();
        $presentaciones = Presentacion::all();
        $frescura = Frescura::all();
        $calibres = Calibre::all();

        return view('especies.create', compact(
            'especies_maestra',
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

        // 🔥 Formatear primero (clave)
        $codigo = str_pad($request->codigo, 2, '0', STR_PAD_LEFT);

        // 🔥 Validación correcta
        $request->validate([
            'codigo' => 'required|numeric',
            'especie_comercial' => 'required',
            'pais_al3' => 'required',
            'metodo_produccion' => 'required',
        ]);

        // 🔥 Comprobar que no exista (ya formateado)
        if (Especie::where('codigo', $codigo)->exists()) {
            return back()->withErrors(['codigo' => 'El código ya existe']);
        }

        // 🔥 Buscar datos en maestra
        $maestra = EspecieMaestra::where('nombre_comercial', $request->especie_comercial)->first();

        Especie::create([

            'codigo' => $codigo,

            'especie_comercial' => $request->especie_comercial,

            'especie_cientifica' => $maestra->nombre_cientifico ?? null,
            'especie_al3' => $maestra->codigo_al3 ?? null,

            'pais_al3' => $request->pais_al3,
            'metodo_produccion' => $request->metodo_produccion,

            'cod_conservacion' => $request->cod_conservacion,
            'cod_presentacion' => $request->cod_presentacion,

            'cod_frescura' => $request->cod_frescura ?: null,
            'cod_calibre' => $request->cod_calibre ?: null,

        ]);

        return redirect()->route('especies.index');

    }

    public function edit($id)
    {

        $especie = Especie::find($id);

        $especies_maestra = EspecieMaestra::all();
        $paises = Pais::all();
        $metodos = MetodoProduccion::all();
        $conservaciones = Conservacion::all();
        $presentaciones = Presentacion::all();
        $frescura = Frescura::all();
        $calibres = Calibre::all();

        return view('especies.edit', compact(
            'especie',
            'especies_maestra',
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

        $especie = Especie::find($id);

        // 🔥 Formatear primero
        $codigo = str_pad($request->codigo, 2, '0', STR_PAD_LEFT);

        // 🔥 Validación
        $request->validate([
            'codigo' => 'required|numeric',
            'especie_comercial' => 'required',
            'pais_al3' => 'required',
            'metodo_produccion' => 'required',
        ]);

        // 🔥 Evitar duplicados (excepto el actual)
        if (Especie::where('codigo', $codigo)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['codigo' => 'El código ya existe']);
        }

        // 🔥 Datos automáticos
        $maestra = EspecieMaestra::where('nombre_comercial', $request->especie_comercial)->first();

        $especie->update([

            'codigo' => $codigo,

            'especie_comercial' => $request->especie_comercial,

            'especie_cientifica' => $maestra->nombre_cientifico ?? null,
            'especie_al3' => $maestra->codigo_al3 ?? null,

            'pais_al3' => $request->pais_al3,
            'metodo_produccion' => $request->metodo_produccion,

            'cod_conservacion' => $request->cod_conservacion,
            'cod_presentacion' => $request->cod_presentacion,

            'cod_frescura' => $request->cod_frescura ?: null,
            'cod_calibre' => $request->cod_calibre ?: null,

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
