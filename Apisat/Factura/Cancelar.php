<?php
namespace Apisat\Factura;


class Cancelar extends Apisat {

    /**
     * @var
     */
    protected $rfc;

    /**
     * Constructor la clase Cancelar puede inicializarse vacio o darle los valores necesarios
     * new Cancelar($llave_publica, $llave_privada, $uuid, $rfc)
     */
    public function __construct()
    {

        if(func_num_args()==0)
        {
            $this->llave_publica=null;
            $this->llave_privada=null;
            $this->time=date('c');
            $this->uuid=null;
            $this->url=null;
            $this->rfc=null;
            $this->metodo=Config::CANCELADO_MET;
            $this->raw_url=Config::SCHEME.Config::BASE_URL.Config::PATH_DETALLE_CANCELAR;
        }
        if(func_num_args()==4)
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

    /**
     * @return string
     */
    public function cancelarFactura()
    {
        $parametros = array(
            'http' => array(
                'ignore_errors' => true,
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