<?php

namespace Apisat\Clases;
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 16/01/15
 * Time: 02:42 PM
 */

class Files extends Apisat
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
        if (func_num_args() == 0) {
            $this->llave_publica = '';
            $this->llave_privada = '';
            $this->time = date('c');
            $this->uuid = '';
            $this->url = '';
            $this->metodo = Configuration::ARCHIVO_MET;
        }
        if (func_num_args() == 5) {
            $argumentos = func_get_args();

            $this->llave_publica = $argumentos[0];
            $this->llave_privada = $argumentos[1];
            $this->uuid = $argumentos[2];
            $this->metodo = Configuration::ARCHIVO_MET;
            $this->setTime(date('c'));
            if($argumentos[3])
                $this->raw_url=Configuration::SCHEME.Configuration::BASE_URL.Configuration::PATH_XML;
            else
                $this->raw_url=Configuration::SCHEME.Configuration::BASE_URL.Configuration::PATH_PDF;
        }
    }

    public function getFile()
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