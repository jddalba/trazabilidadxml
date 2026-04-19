<?php

namespace App\Services;

class XmlService
{
    public static function generarPorVenta($venta)
    {
        $lineas = \App\Models\VentaLinea::where('venta_id', $venta->id)->get();

        $establecimiento = trim($venta->num_identificacion_establec);

        $grupos = [
            $establecimiento => $lineas
        ];

        $xmls = [];
        $grupos = $lineas->groupBy('instalacion_id');
        //dd($grupos);
        foreach ($grupos as $establecimiento => $lineas) {

            $xml = new \SimpleXMLElement(
                '<?xml version="1.0" encoding="UTF-8"?>
                <Envio xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>'
            );

            $xml->addAttribute('NumEnvio', $venta->num_envio ?? '1');

            $establecimientos = $xml->addChild('EstablecimientosVenta');

            $est = $establecimientos->addChild('EstablecimientoVenta');
            $est->addAttribute('NumIdentificacionEstablec', $codigoRega);

            $ventas = $est->addChild('Ventas');

            foreach ($lineas as $linea) {
                $instalacion = \App\Models\Instalacion::find($establecimiento);

                $codigoRega = trim($instalacion->codigo_rega);

                $linea->load(['especie','vendedor','comprador']);

                $unidad = $ventas->addChild('VentasUnidadProductiva');

                $datos = $unidad->addChild('DatosUnidadProductiva');
                $granja = $datos->addChild('Granja');

                $granja->addChild('MetodoProduccion', $linea->especie->metodo_produccion ?? '1');
                $granja->addChild('CodigoREGA', $codigoRega);
                $granja->addChild('FechaProduccion', now()->format('Y-m-d'));

                $especies = $unidad->addChild('Especies');
                $esp = $especies->addChild('Especie');

                $esp->addAttribute('NumDocVenta', self::generarNumDoc($venta, $linea));

                $esp->addChild('EspecieAL3', $linea->especie->especie_al3 ?? '');
                $esp->addChild('EspecieComercial', $linea->especie->especie_comercial ?? '');
                $esp->addChild('EspecieCientifico', $linea->especie->especie_cientifica ?? '');
                $esp->addChild('PaisAL3', $linea->especie->pais_al3 ?? '');

                $esp->addChild('CodEspecieConservacion', $linea->especie->cod_conservacion ?? '1');
                $esp->addChild('CodEspeciePresentacion', $linea->especie->cod_presentacion ?? '1');

                if ($linea->especie->cod_frescura) {
                    $esp->addChild('CodEspecieFrescura', $linea->especie->cod_frescura);
                }

                if ($linea->especie->cod_calibre) {
                    $esp->addChild('CodEspecieCalibre', $linea->especie->cod_calibre);
                }

                $esp->addChild('FechaVenta', date('Y-m-d', strtotime($linea->fecha_venta)));
                $esp->addChild('Lote', $linea->lote ?? '');

                // Vendedor
                $esp->addChild('NIFVendedor', $linea->vendedor->nif ?? '');
                $esp->addChild('TipoCifNifVendedor', '02');
                $esp->addChild('NombreVendedor', $linea->vendedor->nombre ?? '');
                $esp->addChild('DireccionVendedor', $linea->vendedor->direccion ?? '');

                // Comprador
                $esp->addChild('NIFComprador', $linea->comprador->nif ?? '');
                $esp->addChild('NombreComprador', $linea->comprador->nombre ?? '');
                $esp->addChild('DireccionComprador', $linea->comprador->direccion ?? '');

                $cantidad = number_format((float)$linea->cantidad, 2, '.', '');
                $esp->addChild('Cantidad', $cantidad);
            }

            $nombre = "venta_{$venta->id}_{$establecimiento}.xml";
            $ruta = "xml/" . $nombre;

            \Storage::put($ruta, $xml->asXML());

            $xmls[] = $ruta;
        }

        return $xmls;
    }

    private static function generarNumDoc($venta, $linea)
    {
        return 'NV01' . date('Y') . str_pad($linea->id, 7, '0', STR_PAD_LEFT);
    }
}
