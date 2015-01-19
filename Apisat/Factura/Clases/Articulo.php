<?php


namespace Apisat\Factura\Clases;


class Articulo {
    //ID del producto
    public $id;
    //Nombre-descripcion del producto
    public $descripcion;
    //Precio por pieza del producto
    public $precio;
    //Cantidad del producto comprado
    public $cantidad;
    //Monto total del producto comprado
    public $total;

    function __construct()
    {
        $this->id = null;
        $this->total = null;
        $this->precio = null;
        $this->descripcion = null;
        $this->cantidad = null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $identificado
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getPrecioUnitario()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecioUnitario($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }






}