<?php

namespace App\Services;

class XsdValidatorService
{

    public static function validar($xmlString)
    {

        $xml = new \DOMDocument();
        $xml->loadXML($xmlString);

        return $xml->schemaValidate(storage_path('app/xsd/Esquema_WS_Envio_DocVenta_Andalucia.xsd'));

    }

}
