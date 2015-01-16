<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 16/01/15
 * Time: 10:11 AM
 */

require_once('Apisat/Factura/Detalle.php');

class Example
{
    public static function Detalle()
    {
        $detalle= new Apisat\Clases\Detalle('key_f7f99088d457278fa1b059c34f01df5d','key_6b305bf82216f505d826e4c1cf8df5b2','1234','GET');
        $detalle->transformarLlave($detalle->getRawUrl());
        $detalle->setUrl($detalle->getUuid());

        $detail=$detalle->getDetalle();
        var_dump($detail);
    }

    public static function Cancelar()
    {
        $cancelar= new Apisat\Clases\Cancelar('key_f7f99088d457278fa1b059c34f01df5d','key_6b305bf82216f505d826e4c1cf8df5b2','1234','DELETE','AAD990814BP7');
        $cancelar->transformarLlave($cancelar->getRawUrl());
        $cancelar->setUrl($cancelar->getUuid());

        $detail=$cancelar->cancelarFactura();
        var_dump($detail);
    }

    public static function filePdf()
    {
        $archivo= new Apisat\Clases\Files('key_f7f99088d457278fa1b059c34f01df5d','key_6b305bf82216f505d826e4c1cf8df5b2','1234','GET');
        $archivo->transformarLlave($archivo->getRawUrl());
        $archivo->setUrl($archivo->getUuid(),true,'pdf');

        $detail=$archivo->getFile();
        var_dump($detail);
    }

    public static function fileXML()
    {
        $archivo= new Apisat\Clases\Files('key_f7f99088d457278fa1b059c34f01df5d','key_6b305bf82216f505d826e4c1cf8df5b2','1234','GET');
        $archivo->transformarLlave($archivo->getRawUrl());
        $archivo->setUrl($archivo->getUuid(),true,'xml');

        $detail=$archivo->getFile();
        var_dump($detail);
    }
}