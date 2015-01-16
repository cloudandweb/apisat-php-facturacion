<?php
namespace Apisat\Clases;
/**
 * Created by PhpStorm.
 * User: Kurogane
 * Date: 15/01/2015
 * Time: 14:18
 */

class Cancelar extends Apisat {

    protected $rfc;
    public function __construct()
    {

        if(func_num_args()==0)
        {
            $this->llave_publica='';
            $this->llave_privada='';
            $this->time=date('c');
            $this->uuid='';

            $this->url='';
            $this->rfc='';
            $this->metodo=Config::CANCELADO_MET;
            $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_DETALLE_CANCELAR;
        }
        if(func_num_args()==5)
        {
            $argumentos=func_get_args();

            $this->llave_publica=$argumentos[0];
            $this->llave_privada=$argumentos[1];
            $this->uuid=$argumentos[2];
            $this->rfc=$argumentos[3];
            $this->setTime(date('c'));
            $this->metodo=Config::CANCELADO_MET;
            $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_DETALLE_CANCELAR;


        }
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param mixed $rfc
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
    }

    public function cancelarFactura()
    {
        // Check what we received
        $parametros = array(
            'http' => array(
                'header' => "llave_publica: " .$this->getLlavePublica()." \r\n".
                    "llave_privada: ".$this->llave_privada." \r\n".
                    "timestamp: " . $this->getTime()." \r\n".
                    "rfc: " . $this->getRfc()." \r\n",
                'method' => strtoupper($this->getMetodo()),
            ),
        );
        $context = stream_context_create($parametros);

        $result = file_get_contents($this->getUrl(), false, $context);

        return $result;

    }
}