<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\VentaLinea;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('lineas.especie','lineas.vendedor','lineas.comprador')->latest()->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $instalaciones = \App\Models\Instalacion::all();
        $especies = \App\Models\Especie::all();
        $vendedores = \App\Models\Vendedor::all();
        $compradores = \App\Models\Comprador::all();
        $calibres = \App\Models\Calibre::all();
        $frescuras = \App\Models\Frescura::all();

        return view('ventas.create', compact(
            'instalaciones',
            'especies',
            'vendedores',
            'compradores',
            'calibres',
            'frescuras'
        ));
    }

    public function edit($id)
    {
        $venta = Venta::with('lineas')->findOrFail($id);

        return view('ventas.edit', [
            'venta' => $venta,
            'instalaciones' => \App\Models\Instalacion::all(),
            'especies' => \App\Models\Especie::all(),
            'vendedores' => \App\Models\Vendedor::all(),
            'compradores' => \App\Models\Comprador::all(),
            'calibres' => \App\Models\Calibre::all(),
            'frescuras' => \App\Models\Frescura::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);

        $venta->update([
            'fecha' => $request->fecha
        ]);

        $venta->lineas()->delete();

        foreach ($request->lineas as $linea) {

            if (empty($linea['lote']) || empty($linea['cantidad'])) {
                continue;
            }

            VentaLinea::create([
                'venta_id' => $venta->id,
                'instalacion_id' => $linea['instalacion_id'],
                'especie_id' => $linea['especie_id'],
                'lote' => $linea['lote'],
                'cantidad' => $linea['cantidad'],
                'vendedor_id' => $linea['vendedor_id'],
                'comprador_id' => $linea['comprador_id'],
                'calibre' => $linea['calibre'] ?? null,
                'frescura' => $linea['frescura'] ?? null,
            ]);
        }

        return redirect()->route('ventas.index')
            ->with('success', 'Venta actualizada correctamente');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->lineas()->delete();
        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada correctamente');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'lineas' => 'required|array|min:1',
        ]);

        $venta = Venta::create([
            'fecha' => $request->fecha,
        ]);

        foreach ($request->lineas as $linea) {

            if (empty($linea['lote']) || empty($linea['cantidad'])) {
                continue;
            }

            VentaLinea::create([
                'venta_id' => $venta->id,
                'instalacion_id' => $linea['instalacion_id'],
                'especie_id' => $linea['especie_id'],
                'lote' => $linea['lote'],
                'cantidad' => $linea['cantidad'],
                'vendedor_id' => $linea['vendedor_id'],
                'comprador_id' => $linea['comprador_id'],
                'calibre' => $linea['calibre'] ?? null,
                'frescura' => $linea['frescura'] ?? null,
            ]);
        }

        return $this->generarXML($venta->id);
    }

    public function generarXML($ventaId)
    {
        try {

            $zip = $this->procesarXML($ventaId);

            return response()->download($zip)->deleteFileAfterSend(true);

        } catch (\Exception $e) {

            return redirect()->route('ventas.index')
                ->with('error', $e->getMessage());
        }
    }

    private function procesarXML($ventaId)
    {
        $venta = Venta::with(
            'lineas.instalacion',
            'lineas.especie',
            'lineas.vendedor',
            'lineas.comprador'
        )->findOrFail($ventaId);

        $rutaCarpeta = storage_path('app/xml');

        if (!file_exists($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true);
        }

        $grupos = $venta->lineas->groupBy(function ($l) {
            return $l->instalacion->establecimiento_venta;
        });

        $archivos = [];

        foreach ($grupos as $establecimiento => $lineas) {

            $nombreFichero = $this->generarNombreFichero($establecimiento);

            $xml = new \SimpleXMLElement('<Envio/>');
            $xml->addAttribute('NumEnvio', $nombreFichero);

            $estabs = $xml->addChild('EstablecimientosVenta');
            $estab = $estabs->addChild('EstablecimientoVenta');
            $estab->addAttribute('NumIdentificacionEstablec', $establecimiento);

            $ventas = $estab->addChild('Ventas');
            $unidad = $ventas->addChild('VentasUnidadProductiva');

            $datos = $unidad->addChild('DatosUnidadProductiva');
            $granja = $datos->addChild('Granja');

            $granja->addChild('MetodoProduccion', '2');
            $granja->addChild('CodigoREGA', $lineas->first()->instalacion->codigo_rega);
            $granja->addChild('FechaProduccion', now()->format('Y-m-d\TH:i:s'));

            $especiesNode = $unidad->addChild('Especies');

            $contador = 1;

            foreach ($lineas as $l) {

                $numDocVenta = $this->generarNumDocVenta($establecimiento, $contador);

                $esp = $especiesNode->addChild('Especie');
                $esp->addAttribute('NumDocVenta', $numDocVenta);

                $esp->addChild('EspecieAL3', $l->especie->especie_al3);
                $esp->addChild('EspecieComercial', $l->especie->especie_comercial);
                $esp->addChild('EspecieCientifico', $l->especie->especie_cientifica);
                $esp->addChild('PaisAL3', $l->especie->pais_al3 ?? 'ESP');
                $esp->addChild('CodEspecieConservacion', $l->especie->cod_conservacion ?? 'FRE');
                $esp->addChild('CodEspeciePresentacion', $l->especie->cod_presentacion ?? 'WHL');
                $esp->addChild('FechaVenta', $venta->fecha . 'T00:00:00');
                $esp->addChild('Lote', $l->lote);

                $esp->addChild('TipoCifNifVendedor', (int)$l->vendedor->tipo_documento);
                $esp->addChild('NIFVendedor', $l->vendedor->nif);
                $esp->addChild('NombreVendedor', $l->vendedor->nombre);
                $esp->addChild('DireccionVendedor', $l->vendedor->direccion);

                $esp->addChild('NIFComprador', $l->comprador->nif);
                $esp->addChild('NombreComprador', $l->comprador->nombre);
                $esp->addChild('DireccionComprador', $l->comprador->direccion);

                $esp->addChild('Cantidad', $l->cantidad);

                $contador++;
            }

            $rutaXml = $rutaCarpeta . '/' . $nombreFichero . '.xml';
            $xml->asXML($rutaXml);

            $archivos[] = $rutaXml;
        }

        $zipPath = $rutaCarpeta . '/venta_' . $ventaId . '.zip';

        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($archivos as $archivo) {
            $zip->addFile($archivo, basename($archivo));
        }

        $zip->close();

        return $zipPath;
    }

    private function generarNombreFichero($establecimiento)
    {
        $ccaa = '01';
        $registro = $this->extraerRegistro($establecimiento);
        $fecha = now()->format('Ymd');
        $hora = now()->format('His');

        return "NV_{$ccaa}_{$registro}_{$fecha}_{$hora}";
    }

    private function generarNumDocVenta($establecimiento, $contador)
    {
        $ccaa = '01';
        $anio = date('Y');
        $registro = $this->extraerRegistro($establecimiento);
        $contador = str_pad($contador, 7, '0', STR_PAD_LEFT);

        return "NV{$ccaa}{$anio}{$registro}{$contador}";
    }

    private function extraerRegistro($establecimiento)
    {
        if (preg_match('/ACUI\d+/', $establecimiento, $m)) {
            return $m[0];
        }

        if (preg_match('/(\d{6})/', $establecimiento, $m)) {
            return $m[1];
        }

        return '000000';
    }
}
