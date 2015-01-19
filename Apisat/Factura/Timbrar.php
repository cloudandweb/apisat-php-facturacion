<?php

namespace Apisat\Factura;

use Apisat\Factura\Clases\ObjetoFactura;


class Timbrar extends Apisat
{
    /**
     * @var ObjetoFactura
     */
    protected $objeto_factura;

    /**
     *Este constructor funciona en base a la cantidad de argumentos, si no tiene ninguno, se instancia como comunmente se haria dando valores vacios
     * a los atributos de la clase padre
     * Sin embargo cuando se ingresan los 3 parametros. el $tipo es xml o pdf
     * Este es el orden
     * new Detalle($llave_publica, $llave_privada, ObjetoFactura $objeto)
     */
    public function __construct()
    {
        if (func_num_args() == 0) {
            $this->llave_publica = null;
            $this->llave_privada = null;
            $this->objeto_factura = new ObjetoFactura();
            $this->time = date('c');
            $this->url = Config::SCHEME . Config::BASE_URL . Config::PATH_TIMBRADO;
            $this->metodo = Config::TIMBRADO_MET;
            $this->raw_url = Config::SCHEME . Config::BASE_URL . Config::PATH_TIMBRADO;
        }
        if (func_num_args() == 3) {
            $argumentos = func_get_args();
            $this->llave_publica = $argumentos[0];
            $this->llave_privada = $argumentos[1];
            $this->setObjetoFactura( $argumentos[2]);
            $this->metodo = Config::TIMBRADO_MET;
            $this->setTime(date('c'));
            $this->url = Config::SCHEME . Config::BASE_URL . Config::PATH_TIMBRADO;
            $this->raw_url = Config::SCHEME . Config::BASE_URL . Config::PATH_TIMBRADO;
        }
    }

    /**
     * @return mixed
     */
    public function getObjetoFactura()
    {
        return $this->objeto_factura;
    }

    /**
     * @param mixed $objeto_factura
     * Es importante no olvidar este metodo antes de enviar la peticion ya que convierte al json necesario los datos de ingresado del objeto factura
     */
    public function setObjetoFactura(ObjetoFactura $objeto_factura)
    {
        $json=$objeto_factura->toJSON();

        $this->objeto_factura =$json;
    }


    /**
     * @return string
     */
    public function Timbrado()
    {

        $data=array('datos'=>$this->getObjetoFactura());

        $parametros = array(
            'http' => array(
                'ignore_errors' => true,
                'header' => "llave_publica: " .$this->getLlavePublica()." \r\n".
                    "llave_privada: ".$this->llave_privada." \r\n".
                    "timestamp: " . $this->getTime()." \r\n".
                    "Content-type: application/x-www-form-urlencoded \r\n",
                'method' => strtoupper($this->getMetodo()),
                'content'=> http_build_query($data)
            )
        );

        $context = stream_context_create($parametros);

        $result = file_get_contents($this->getUrl(), false, $context);

        return $result;




    }
}