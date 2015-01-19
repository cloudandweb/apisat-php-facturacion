<?php


namespace Apisat\Factura\Clases;




class Direccion {
    public $calle;
    public $exterior;
    public $interior;
    public $colonia;
    public $localidad;
    public $referencia;
    public $ciudad;
    public $estado;
    public $pais;
    public $codigo_postal;
    public $correo;
    public $nombre_contacto;

    function __construct()
    {
        $this->calle = null;
        $this->exterior = null;
        $this->interior = null;
        $this->colonia = null;
        $this->localidad = null;
        $this->referencia = null;
        $this->ciudad = null;
        $this->correo=null;
        $this->nombre_contacto=null;
        $this->estado = null;
        $this->pais = null;
        $this->codigo_postal = null;
    }

    /**
     * @return mixed
     */
    public function getNombreContacto()
    {
        return $this->nombre_contacto;
    }

    /**
     * @param mixed $nombre_contacto
     */
    public function setNombreContacto($nombre_contacto)
    {
        $this->nombre_contacto = $nombre_contacto;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }



    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getCodigopostal()
    {
        return $this->codigo_postal;
    }

    /**
     * @param mixed $codigo_postal
     */
    public function setCodigopostal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    /**
     * @return mixed
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * @param mixed $colonia
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    /**
     * @return mixed
     */
    public function getInterior()
    {
        return $this->interior;
    }

    /**
     * @param mixed $interior
     */
    public function setInterior($interior)
    {
        $this->interior = $interior;
    }

    /**
     * @return mixed
     */
    public function getExterior()
    {
        return $this->exterior;
    }

    /**
     * @param mixed $exterior
     */
    public function setExterior($exterior)
    {
        $this->exterior = $exterior;
    }
}