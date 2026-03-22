<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use DOMDocument;

class XmlService
{
    public function generarXmlVenta($venta)
    {
        // Asegurar carpeta
        if (!Storage::exists('xml')) {
            Storage::makeDirectory('xml');
        }

        // Agrupar por establecimiento (balsa / instalación)
        $lineasAgrupadas = $venta->lineas->groupBy('instalacion_id');

        $xmlGenerados = [];

        foreach ($lineasAgrupadas as $instalacionId => $lineas) {

            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('DocumentoVenta');
            $dom->appendChild($root);

            // CABECERA
            $cabecera = $dom->createElement('Cabecera');
            $root->appendChild($cabecera);

            $cabecera->appendChild($this->crearNodo($dom, 'Fecha', $venta->fecha ?? date('Y-m-d')));
            $cabecera->appendChild($this->crearNodo($dom, 'NumeroDocumento', $venta->id));

            // LINEAS
            $lineasNode = $dom->createElement('Lineas');
            $root->appendChild($lineasNode);

            foreach ($lineas as $linea) {

                $lineaNode = $dom->createElement('Linea');

                // ESPECIE
                $lineaNode->appendChild($this->crearNodo($dom, 'CodigoEspecie', $linea->especie->codigo ?? ''));

                // PRODUCCION (código obligatorio XSD)
                $lineaNode->appendChild($this->crearNodo($dom, 'MetodoProduccion', $linea->especie->metodo_produccion ?? '1'));

                // CONSERVACION
                $lineaNode->appendChild($this->crearNodo($dom, 'Conservacion', $linea->especie->cod_conservacion ?? '1'));

                // PRESENTACION
                $lineaNode->appendChild($this->crearNodo($dom, 'Presentacion', $linea->especie->cod_presentacion ?? '1'));

                // OPCIONALES
                $lineaNode->appendChild($this->crearNodo($dom, 'Frescura', $linea->especie->cod_frescura ?? ''));
                $lineaNode->appendChild($this->crearNodo($dom, 'Calibre', $linea->especie->cod_calibre ?? ''));

                // VENDEDOR
                $lineaNode->appendChild($this->crearNodo($dom, 'NifVendedor', $linea->vendedor->nif ?? ''));
                //$lineaNode->appendChild($this->crearNodo($dom, 'TipoDocumentoVendedor', $linea->vendedor->tipo_documento ?? '1'));
                $lineaNode->appendChild(
                    $this->crearNodo($dom, 'TipoCifNifVendedor',
                        $this->mapTipoDocumento($linea->vendedor->tipo_documento ?? '1')
                    )
                );

                // COMPRADOR
                $lineaNode->appendChild($this->crearNodo($dom, 'NombreComprador', $linea->comprador->nombre ?? ''));

                // PESO / CANTIDAD (ejemplo)
                $lineaNode->appendChild($this->crearNodo($dom, 'Cantidad', $linea->cantidad ?? '0'));

                $lineasNode->appendChild($lineaNode);
            }

            // VALIDAR XSD
            $errores = $this->validarXml($dom);

            $nombre = "venta_{$venta->id}_instalacion_{$instalacionId}.xml";
            $ruta = "xml/$nombre";

            // Guardar SIEMPRE (aunque tenga errores → debugging)
            Storage::put($ruta, $dom->saveXML());

            if (!empty($errores)) {
                Log::error("XML con errores (Venta {$venta->id})", $errores);
            }

            $xmlGenerados[] = [
                'ruta' => $ruta,
                'errores' => $errores
            ];
        }

        return $xmlGenerados;
    }

    private function crearNodo($dom, $nombre, $valor)
    {
        return $dom->createElement($nombre, htmlspecialchars($valor));
    }

    private function validarXml(DOMDocument $dom)
    {
        libxml_use_internal_errors(true);

        $xsd = storage_path('app/xsd/Esquema_WS_Envio_DocVenta_Andalucia.xsd');

        $errores = [];

        if (!$dom->schemaValidate($xsd)) {
            foreach (libxml_get_errors() as $error) {
                $errores[] = trim($error->message);
            }
        }

        libxml_clear_errors();

        return $errores;
    }
    private function mapTipoDocumento($valor)
    {
        // Si ya viene correcto (1,2,3)
        if (in_array($valor, ['1','2','3'])) {
            return $valor;
        }

        // Si viene como texto (por si acaso)
        return match (strtoupper($valor)) {
            'NIF' => '1',
            'CIF' => '2',
            'NIE' => '3',
            default => '1',
        };
    }

}
