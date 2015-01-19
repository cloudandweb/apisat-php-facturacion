<?php

namespace Apisat\Factura\Clases;

use stdClass;
/*
 * NOTA no cambiar el nombre de las variables en las clases debido a que son usados para general el JSON...
 */
class ObjetoFactura {

    public $receptor;
    public $articulos=[];
    public $totales;
    public $opciones;

    public function __construct()
    {
        $this->receptor=new Receptor();
        $this->opciones=new Opcion();
        $this->totales= new Total();
    }


    /**
     * @return Opcion
     */
    public function getOpciones()
    {
        return $this->opciones;
    }

    /**
     * @param Opcion $opciones
     */
    public function setOpciones(Opcion $opciones)
    {
        $this->opciones = $opciones;
    }

    /**
     * @return Total
     */
    public function getTotales()
    {
        return $this->totales;
    }

    /**
     * @param Total $totales
     */
    public function setTotales(Total $totales)
    {
        $this->totales = $totales;
    }

    /**
     * @return Articulo
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * @param Articulo $articulos
     */
    public function setArticulos(Articulo $articulos)
    {
        $this->articulos[] = $articulos;
    }

    /**
     * @return Receptor
     */
    public function getReceptor()
    {
        return $this->receptor;
    }

    /**
     * @param Receptor $receptor
     */
    public function setReceptor(Receptor $receptor)
    {
        $this->receptor = $receptor;
    }

    public function toJSON()
    {

        $json_object= new stdClass();
        $json_object->factura= new stdClass();
        $json_object->factura->receptor=$this->getReceptor();
        $json_object->factura->opciones=$this->getOpciones();
        $json_object->factura->totales=$this->getTotales();
        $json_object->factura->articulos=$this->getArticulos();

        return json_encode($json_object);
    }



}