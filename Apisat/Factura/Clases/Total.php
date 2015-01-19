<?php


namespace Apisat\Factura\Clases;


class Total {

    //Monto total de productos/servicios
    public $monto;
    //Porcentaje de IVA
    public $agregado;
    //Monto de IVA
    public $iva;
    //ISR
    public $isr;
    //Iva Retenido
    public $riva;
    //Total final +/- impuestos
    public $total;

    function __construct()
    {
        $this->monto = null;
        $this->riva = null;
        $this->total = null;
        $this->iva = null;
        $this->agregado = null;
        $this->isr = null;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
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
    public function getRiva()
    {
        return $this->riva;
    }

    /**
     * @param mixed $riva
     */
    public function setRiva($riva)
    {
        $this->riva = $riva;
    }

    /**
     * @return mixed
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param mixed $iva
     */
    public function setIva($iva)
    {
        $this->iva = $iva;
    }

    /**
     * @return mixed
     */
    public function getAgregado()
    {
        return $this->agregado;
    }

    /**
     * @param mixed $agregado
     */
    public function setAgregado($agregado)
    {
        $this->agregado = $agregado;
    }

    /**
     * @return mixed
     */
    public function getIsr()
    {
        return $this->isr;
    }

    /**
     * @param mixed $isr
     */
    public function setIsr($isr)
    {
        $this->isr = $isr;
    }




}