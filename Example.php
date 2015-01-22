<?php

use Apisat\Factura\Detalle;
use Apisat\Factura\Cancelar;
use Apisat\Factura\Files;
use Apisat\Factura\Timbrar;
use Apisat\Factura\Clases\ObjetoFactura;
use Apisat\Factura\Clases\Receptor;
use Apisat\Factura\Clases\Opcion;
use Apisat\Factura\Clases\Total;
use Apisat\Factura\Clases\Direccion;
use Apisat\Factura\Clases\Articulo;
use Apisat\Factura\Config;

class Example
{
    public static function Detalle()
    {
        $detalle= new Detalle(Config::LLAVE_PUBLICA,Config::LLAVE_PRIVADA,'1234');
        $detalle->transformarLlave($detalle->getRawUrl());
        $detalle->setUrl($detalle->getUuid());

        $detail=$detalle->getDetalle();
        var_dump($detail);
    }

    public static function Cancelar()
    {
        $cancelar= new Cancelar(Config::LLAVE_PUBLICA,Config::LLAVE_PRIVADA,'1234','AAD990814BP7');
        $cancelar->transformarLlave($cancelar->getRawUrl());
        $cancelar->setUrl($cancelar->getUuid());

        $detail=$cancelar->cancelarFactura();
        var_dump($detail);
    }

    public static function filePdf()
    {
        $archivo= new Files(Config::LLAVE_PUBLICA,Config::LLAVE_PRIVADA,'1234','pdf');
        $archivo->transformarLlave($archivo->getRawUrl());
        $archivo->setUrl($archivo->getUuid(),true,'pdf');

        $detail=$archivo->getFile();
        var_dump($detail);
    }

    public static function fileXML()
    {
        $archivo= new Files(Config::LLAVE_PUBLICA,Config::LLAVE_PRIVADA,'1234','xml');
        $archivo->transformarLlave($archivo->getRawUrl());
        $archivo->setUrl($archivo->getUuid(),true,'xml');

        $detail=$archivo->getFile();
        var_dump($detail);


    }

    public static function Timbrar()
    {
        $object = new ObjetoFactura();


        //Direccion de la empresa receptora
        $direccion_receptor = new Direccion();
        $direccion_receptor->setCalle('Blvd. Casa Blanca');
        $direccion_receptor->setCodigopostal('22207');
        $direccion_receptor->setColonia('Los Lobos');
        $direccion_receptor->setEstado('Baja California');
        $direccion_receptor->setCiudad('Tijuana');
        $direccion_receptor->setExterior('2001');
        $direccion_receptor->setCorreo('correo@correo.com');
        $direccion_receptor->setNombreContacto('Contacto');

        //Datos del receptor
        $receptor = new Receptor();
        $receptor->setRfc('AAD990814BP8');
        $receptor->setNombre('Empresa Receptora');
        $receptor->setDireccion($direccion_receptor);
        $receptor->setTelefono('(664) 000-0000');

        //Basicamente algunos datos de la factura.
        $opciones = new Opcion();
        $opciones->setFormaPago('Pago en una sola exhibicion');
        $opciones->setMoneda('MXN');
        $opciones->setPago('efectivo');
        $opciones->setTipoFactura('Egreso');

        //Los articulos que se agregaran a la factura estos pueden ser varios
        $articulos = new Articulo();
        $articulos->setId('APTX4869');
        $articulos->setDescripcion('Apotoxin 4869');
        $articulos->setCantidad('1');
        $articulos->setPrecioUnitario('100');
        $articulos->setTotal('100');

        $totales = new Total();
        $totales->setMonto('100');
        $totales->setAgregado('16.00');
        $totales->setIsr('0.00');
        $totales->setRiva('0.00');
        $totales->setIva('16.00');
        $totales->setTotal('116.00');

        $object->setOpciones($opciones);

        //Agrega los datos del receptor al objeto
        $object->setReceptor($receptor);

        //Puede agregar varios articulos con este mismo metodo
        $object->setArticulos($articulos);

        $object->setTotales($totales);


        $timbre = new Timbrar('key_f7f99088d457278fa1b059c34f01df5d', 'key_6b305bf82216f505d826e4c1cf8df5b2', $object);
        $timbre->transformarLlave($timbre->getRawUrl());
        $detail = $timbre->Timbrado();
        var_dump($detail);

    }
}