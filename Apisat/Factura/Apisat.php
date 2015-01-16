<?php
namespace Apisat\Clases;

abstract class Apisat
{
    protected $metodo;
    protected $uuid;
    protected $llave_privada;
    protected $llave_publica;
    protected $time;
    protected $url;
    protected $raw_url;

    /**
     * @return mixed
     */
    public function getRawUrl()
    {
        return $this->raw_url;
    }

    /**
     * @param mixed $raw_url
     */
    public function setRawUrl($raw_url)
    {
        $this->raw_url = $raw_url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($uuid='',$file=false, $tipo='')
    {
        if($file)
            $this->url =Config::SCHEME.Config::BASE_URL.'/factura/'.$uuid.'/'.$tipo;
        else
            $this->url = Config::SCHEME.Config::BASE_URL.'/factura/'.$uuid;
    }

    /**
     * @return mixed
     */
    public function getMetodo()
    {
        return strtolower($this->metodo);
    }

    /**
     * @param mixed $metodo
     */
    public function setMetodo($metodo)
    {
        $this->metodo = strtolower($metodo);
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getLlavePublica()
    {
        return $this->llave_publica;
    }

    /**
     * @param mixed $llave_publica
     */
    public function setLlavePublica($llave_publica)
    {
        $this->llave_publica = $llave_publica;
    }

    /**
     * @return mixed
     */
    public function getLlavePrivada()
    {
        return $this->llave_privada;
    }

    /**
     * @param mixed $llave_privada
     */
    public function setLlavePrivada($llave_privada)
    {
        $this->llave_privada = $llave_privada;
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param mixed $url
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param $url_base
     *
     * Este metodo realiza el hash HMAC y la codificacion a base64 para mandar la llave privada encriptada
     */
    public function transformarLlave($url_base)
    {
        //Toma la url como esta descrita el http://sandbox.apisat.mx
        $url_parsed=parse_url($url_base);

        $data=$this->getMetodo().'@'.$url_parsed['host'].$url_parsed['path'].'@'.$url_parsed['scheme'].'@'.$this->getTime().'@'.$this->getLlavePublica();

        //Una vez parseada la ruta se procede a realizar el HMAC
        $hash=hash_hmac('sha256',$data,$this->getLlavePrivada());

        //Para mayor seguridad al enviar la llave privada se codifica
        $hash=base64_encode($hash);

        $this->setLlavePrivada($hash);
    }







}