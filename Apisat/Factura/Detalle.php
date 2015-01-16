<?php
namespace Apisat\Clases;
/**
 * Created by PhpStorm.
 * User: Kurogane
 * Date: 15/01/2015
 * Time: 14:18
 */
// Next, make sure Requests can load internal classes


class Detalle extends Apisat
{

    /**
     *Este constructor funciona en base a la cantidad de argumentos, si no tiene ninguno, se instancia como comunmente se haria dando valores vacios
     * a los atributos de la clase padre
     * Sin embargo cuando se ingresan los 4 parametros estos son asignados a los atributos de la clase padre
     * Este es el orden
     * new Detalle($llave_publica, $llave_privada, $uuid, $metodo)
     */
    public function __construct()
    {

        if(func_num_args()==0)
        {
            $this->llave_publica='';
            $this->llave_privada='';
            $this->time=date('c');
            $this->uuid='';
            $this->url='';
            $this->metodo=Config::DETALLE_MET;
            $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_DETALLE_CANCELAR;
        }
        if(func_num_args()==4)
        {
            $argumentos=func_get_args();
            $this->llave_publica=$argumentos[0];
            $this->llave_privada=$argumentos[1];
            $this->uuid=$argumentos[2];
            $this->metodo=Config::DETALLE_MET;
            $this->setTime(date('c'));
            $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_DETALLE_CANCELAR;


        }
    }

    /**
     * Metodo para obtener el detalle de un CFDI
     */
    public function getDetalle()
    {
        // Check what we received
        $parametros = array(
            'http' => array(
                'header' => "llave_publica: " .$this->getLlavePublica()." \r\n".
                    "llave_privada: ".$this->llave_privada." \r\n".
                    "timestamp: " . $this->getTime()." \r\n",
                'method' => strtoupper($this->getMetodo()),
            ),
        );
        $context = stream_context_create($parametros);

        $result = file_get_contents($this->getUrl(), false, $context);

        return $result;

    }


}