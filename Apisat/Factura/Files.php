<?php

namespace Apisat\Factura;


class Files extends Apisat
{


    /**
     *Este constructor funciona en base a la cantidad de argumentos, si no tiene ninguno, se instancia como comunmente se haria dando valores vacios
     * a los atributos de la clase padre
     * Sin embargo cuando se ingresan los 4 parametros. el $tipo es xml o pdf
     * Este es el orden
     * new Detalle($llave_publica, $llave_privada, $uuid, $tipo)
     */
    public function __construct()
    {
        if (func_num_args() == 0) {
            $this->llave_publica = null;
            $this->llave_privada = null;
            $this->time = date('c');
            $this->uuid = null;
            $this->url = null;
            $this->metodo = Config::ARCHIVO_MET;
        }
        if (func_num_args() == 4) {
            $argumentos = func_get_args();

            $this->llave_publica = $argumentos[0];
            $this->llave_privada = $argumentos[1];
            $this->uuid = $argumentos[2];
            $this->metodo = Config::ARCHIVO_MET;
            $this->setTime(date('c'));
            if($argumentos[3]=='xml')
                $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_XML;
            else
                $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_PDF;
        }
    }

    public function getFile()
    {

        $parametros = array(
            'http' => array(
                'ignore_errors' => true,
                'header' => "llave_publica: " . $this->getLlavePublica() . " \r\n" .
                    "llave_privada: " . $this->llave_privada . " \r\n" .
                    "timestamp: " . $this->getTime() . " \r\n",
                'method' => strtoupper($this->getMetodo()),
            ),
        );
        $context = stream_context_create($parametros);
        $result = file_get_contents($this->getUrl(), false, $context);
        return $result;

    }
}