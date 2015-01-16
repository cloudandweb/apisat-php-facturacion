<?php
namespace Apisat\Clases;
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 16/01/15
 * Time: 03:06 PM
 */
class Config{

    const SCHEME='http://';
    const BASE_URL= 'sandbox.apisat.mx/api/1.0';
    const PATH_DETALLE_CANCELAR='/factura/{uuid}';
    const PATH_PDF='/factura/{uuid}/pdf';
    const PATH_XML='factura/{uuid}/xml';
    const PATH_TIMRBADO='/factura';
    const ARCHIVO_MET='GET';
    const TIMBRADO_MET='POST';
    const CANCELADO_MET='DELETE';
    const DETALLE_MET='GET';
}