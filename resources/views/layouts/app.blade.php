<?php

namespace App\Services;

use App\Models\Venta;

class XmlService
{

    public static function generarPorVenta($venta)
    {

        // 🔥 Agrupar por establecimiento
        $grupos = $venta->lineas->groupBy(function ($linea) {
            return $venta->num_identificacion_establec;
        });

        $xmls = [];

        foreach ($grupos as $establecimiento => $lineas) {

            $xml = new \SimpleXMLElement(
                '<?xml version="1.0" encoding="UTF-8"?>
                <Envio xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>'
            );

            $xml->addAttribute('NumEnvio', $venta->num_envio);

            $establecimientos = $xml->addChild('EstablecimientosVenta');

            $est = $establecimientos->addChild('EstablecimientoVenta');
            $est->addAttribute('NumIdentificacionEstablec', $establecimiento);

            $ventas = $est->addChild('Ventas');

            foreach ($lineas as $linea) {

                $unidad = $ventas->addChild('VentasUnidadProductiva');

                $datos = $unidad->addChild('DatosUnidadProductiva');
                $granja = $datos->addChild('Granja');

                $granja->addChild('MetodoProduccion', $linea->especie->metodo_produccion);
                $granja->addChild('CodigoREGA', 'PENDIENTE');
                $granja->addChild('FechaProduccion', now());

                $especies = $unidad->addChild('Especies');

                $esp = $especies->addChild('Especie');

                $esp->addAttribute('NumDocVenta', self::generarNumDoc($venta, $linea));

                $esp->addChild('EspecieAL3', $linea->especie->especie_al3);
                $esp->addChild('EspecieComercial', $linea->especie->especie_comercial);
                $esp->addChild('EspecieCientifico', $linea->especie->especie_cientifica);
                $esp->addChild('PaisAL3', $linea->especie->pais_al3);

                $esp->addChild('CodEspecieConservacion', $linea->especie->cod_conservacion);
                $esp->addChild('CodEspeciePresentacion', $linea->especie->cod_presentacion);

                // null control
                $esp->addChild('CodEspecieFrescura', $linea->especie->cod_frescura ?? '');
                $esp->addChild('CodEspecieCalibre', $linea->especie->cod_calibre ?? '');

                $esp->addChild('FechaVenta', $linea->fecha_venta);
                $esp->addChild('Lote', $linea->lote);

                // vendedor
                $esp->addChild('NIFVendedor', $linea->vendedor->nif);
                $esp->addChild('NombreVendedor', $linea->vendedor->nombre);
                $esp->addChild('DireccionVendedor', $linea->vendedor->direccion);

                // comprador
                $esp->addChild('NIFComprador', $linea->comprador->nif);
                $esp->addChild('NombreComprador', $linea->comprador->nombre);
                $esp->addChild('DireccionComprador', $linea->comprador->direccion);

                $esp->addChild('Cantidad', $linea->cantidad);

            }

            $xmls[$establecimiento] = $xml->asXML();

        }

        return $xmls;

    }

    private static function generarNumDoc($venta, $linea)
    {
        return 'NV01' . date('Y') . '0000001';
    }

}
