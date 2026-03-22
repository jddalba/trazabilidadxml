<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Services\XmlService;
use App\Services\XsdValidatorService;

class VentasController extends Controller
{
    /**
     * Listado de ventas
     */
    public function index()
    {
        $ventas = Venta::latest()->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Guardar venta
     */
    /*public function store(Request $request)
    {
        // Aquí iría tu lógica actual (no la tocamos)
        return redirect()->route('ventas.index');
    }*/
    public function store(Request $request)
    {
        $venta = Venta::create([
            'num_envio' => $request->num_envio,
            'num_identificacion_establec' => $request->num_identificacion_establec,
            'fecha' => $request->fecha,
        ]);

        foreach ($request->lineas as $linea) {
            $venta->lineas()->create($linea);
        }

        return redirect()->route('ventas.index');
    }

    /**
     * Mostrar una venta
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    /**
     * Formulario de edición
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Actualizar venta
     */
    public function update(Request $request, $id)
    {
        // Tu lógica actual
        return redirect()->route('ventas.index');
    }

    /**
     * Eliminar venta
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index');
    }

    public function generarXml($id, XmlService $xmlService)
    {
        $venta = Venta::with(['lineas.especie', 'lineas.vendedor', 'lineas.comprador'])
            ->findOrFail($id);

        $resultado = $xmlService->generarXmlVenta($venta);

        // Si solo hay 1 XML → descarga directa
        if (count($resultado) === 1) {
            return Storage::download($resultado[0]['ruta']);
        }

        // Si hay varios → ZIP
        $zipName = "venta_{$venta->id}.zip";
        $zipPath = storage_path("app/xml/$zipName");

        $zip = new \ZipArchive;
        $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($resultado as $xml) {
            $zip->addFile(storage_path("app/".$xml['ruta']), basename($xml['ruta']));
        }

        $zip->close();

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}




