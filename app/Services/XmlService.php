<?php

namespace App\Services;

use App\Models\Venta;

class XmlService
{

    public static function generar($venta)
    {

        // 🔥 1. Agrupar por establecimiento
        $porEstablecimiento = $venta->lineas->groupBy(function ($l) use ($venta) {
            return $venta->num_identificacion_establec;
        });

        $xmls = [];

        foreach ($porEstablecimiento as $establecimiento => $lineasEst) {

            // 🔥 XML base
            $xml = new \SimpleXMLElement(
                '<?xml version="1.0" encoding="UTF-8"?>
                <Envio xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>'
            );

            $xml->addAttribute('NumEnvio', $venta->num_envio);

            $estVentas = $xml->addChild('EstablecimientosVenta');
            $est = $estVentas->addChild('EstablecimientoVenta');
            $est->addAttribute('NumIdentificacionEstablec', $establecimiento);

            $ventas = $est->addChild('Ventas');

            // 🔥 2. Agrupar por REGA (unidad productiva)
            $porRega = $lineasEst->groupBy(function ($l) {
                return $l->especie->codigo_rega ?? 'SIN_REGA';
            });

            foreach ($porRega as $rega => $lineasRega) {

                $unidad = $ventas->addChild('VentasUnidadProductiva');

                // 🔥 Datos unidad productiva
                $datos = $unidad->addChild('DatosUnidadProductiva');
                $granja = $datos->addChild('Granja');

                $granja->addChild('MetodoProduccion', $lineasRega->first()->especie->metodo_produccion);
                $granja->addChild('CodigoREGA', $rega);
                $granja->addChild('FechaProduccion', date('Y-m-d\TH:i:s'));

                $especies = $unidad->addChild('Especies');

                foreach ($lineasRega as $i => $linea) {

                    $esp = $especies->addChild('Especie');

                    // 🔥 NumDocVenta REAL
                    $esp->addAttribute('NumDocVenta',
                        self::generarCodigoDocumento($venta, $establecimiento, $i)
                    );

                    // 🔥 DATOS ESPECIE
                    $esp->addChild('EspecieAL3', $linea->especie->especie_al3);
                    $esp->addChild('EspecieComercial', $linea->especie->especie_comercial);
                    $esp->addChild('EspecieCientifico', $linea->especie->especie_cientifica);

                    // 🔥 PAÍS
                    $esp->addChild('PaisAL3', $linea->especie->pais_al3);

                    // 🔥 CONSERVACIÓN / PRESENTACIÓN
                    $esp->addChild('CodEspecieConservacion', $linea->especie->cod_conservacion);
                    $esp->addChild('CodEspeciePresentacion', $linea->especie->cod_presentacion);

                    // 🔥 NULL CONTROL (IMPORTANTE)
                    $esp->addChild('CodEspecieFrescura', $linea->especie->cod_frescura ?? '');
                    $esp->addChild('CodEspecieCalibre', $linea->especie->cod_calibre ?? '');

                    // 🔥 FECHA
                    $esp->addChild('FechaVenta', date('Y-m-d\TH:i:s', strtotime($linea->fecha_venta)));

                    $esp->addChild('Lote', $linea->lote);

                    // 🔥 VENDEDOR
                    //$esp->addChild('TipoCifNifVendedor', $linea->vendedor->tipo_documento);
                    $esp->addChild('TipoCifNifVendedor', $linea->vendedor->tipo_documento ?? '2');
                    $esp->addChild('NIFVendedor', $linea->vendedor->nif);
                    $esp->addChild('NombreVendedor', $linea->vendedor->nombre);
                    $esp->addChild('DireccionVendedor', $linea->vendedor->direccion);

                    // 🔥 COMPRADOR
                    $esp->addChild('NIFComprador', $linea->comprador->nif);
                    $esp->addChild('NombreComprador', $linea->comprador->nombre);
                    $esp->addChild('DireccionComprador', $linea->comprador->direccion);

                    // 🔥 CANTIDAD
                    $esp->addChild('Cantidad', $linea->cantidad);
                }
            }

            $xmls[$establecimiento] = $xml->asXML();
        }

        return $xmls;
    }

    // 🔥 GENERAR CÓDIGO OFICIAL
    private static function generarCodigoDocumento($venta, $establecimiento, $index)
    {
        $anio = date('Y');
        $establec6 = substr(preg_replace('/\D/', '', $establecimiento), -6);
        $secuencia = str_pad($index + 1, 7, '0', STR_PAD_LEFT);

        return "NV01{$anio}{$establec6}{$secuencia}";
    }
}
