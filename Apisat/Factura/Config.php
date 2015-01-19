<?php
namespace Apisat\Factura;

/**
 * Nota: los paths son usados para hacer referencia a una ruta tal cual se ha declarado, es diferente
 * estas rutas del path a las que se ha de accessar ej: path->sandbox.apisat.mx/api/1.0/factura/{uuid}
 * ruta de acceso->sandbox.apisat.mx/api/1.0/factura/12345678 ambos son necesarios...
 *
 */
class Config{

    const SCHEME='http://';
    const BASE_URL= 'sandbox.apisat.mx/api/1.0';
    const PATH_DETALLE_CANCELAR='/factura/{uuid}';
    const PATH_PDF='/factura/{uuid}/pdf';
    const PATH_XML='/factura/{uuid}/xml';
    const PATH_TIMBRADO='/factura';
    const ARCHIVO_MET='GET';
    const TIMBRADO_MET='POST';
    const CANCELADO_MET='DELETE';
    const DETALLE_MET='GET';
}