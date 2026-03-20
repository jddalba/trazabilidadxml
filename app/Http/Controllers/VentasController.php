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
        // TEMPORAL para que no falle
        return back()->with('success', 'Guardado (temporal)');
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

    public function xml($id)
    {

        $venta = Venta::with(
            'lineas.especie',
            'lineas.vendedor',
            'lineas.comprador'
        )->find($id);

        // 🔥 CONTROL ERRORES
        if (!$venta) {
            return "❌ No existe la venta con ID $id";
        }

        if ($venta->lineas->isEmpty()) {
            return "❌ La venta no tiene líneas";
        }

        // 🔥 GENERAR XML
        $xmls = \App\Services\XmlService::generar($venta);

        foreach ($xmls as $establecimiento => $xmlString) {

            $dom = new \DOMDocument();
            $dom->loadXML($xmlString);

            libxml_use_internal_errors(true);

            if (!$dom->schemaValidate(storage_path('app/xsd/Esquema_WS_Envio_DocVenta_Andalucia.xsd'))) {

                $errors = libxml_get_errors();

                foreach ($errors as $error) {
                    echo $error->message . "<br>";
                }

                libxml_clear_errors();

                return "❌ XML inválido";
            }

            $nombre = "NV_01_" .
                substr(preg_replace('/\D/', '', $establecimiento), -6) . "_" .
                date('Ymd_His') . ".xml";

            \Storage::put("xml/$nombre", $xmlString);
        }

        return "✅ XML generados correctamente";

    }
}


