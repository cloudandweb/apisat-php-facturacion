<?php


namespace Apisat\Factura\Clases;


class Opcion {

    //Tipo de factura Ingres, Egreso ....
    public $tipo_factura;
    //Moneda en el pago MXN, EUR, etc.
    public $moneda;
    //Como se realizo el pago en efectivo, monedero, tarjeta de credito, debido ,etc...
    public $pago;
    //Si es Pago en una sola exhibicion o Pago parcial, por el momento solo soportamos Pago en una sola exhibicion
    public $forma_pago;

    public function __construct()
    {
        $this->tipo_factura=null;
        $this->moneda=null;
        $this->pago=null;
        $this->forma_pago=null;
    }

    /**
     * @return mixed
     */
    public function getTipoFactura()
    {
        return $this->tipo_factura;
    }

    /**
     * @param mixed $tipo_factura
     */
    public function setTipoFactura($tipo_factura)
    {
        $this->tipo_factura = $tipo_factura;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    /**
     * @return mixed
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * @param mixed $moneda
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
        return $this->forma_pago;
    }

    /**
     * @param mixed $forma_pago
     */
    public function setFormaPago($forma_pago)
    {
        $this->forma_pago = $forma_pago;
    }


}