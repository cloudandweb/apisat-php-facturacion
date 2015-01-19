<?php
namespace Apisat\Factura;

abstract class Apisat
{
    //Metodo al que corresponde la peticion
    protected $metodo;
    //Folio fiscal
    protected $uuid;
    //Llave privada para facturar
    protected $llave_privada;
    //llave publica para facturar
    protected $llave_publica;
    //Timestamp UTC correspondiente al formato ISO 8601
    protected $time;
    //Url de la peticion
    protected $url;
    //Url del path de la peticion ver sandbox.apisat.mx o prod.apisat.mx
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
        //Cuando es para obtener algun archivo
        if($file && $tipo!='')
            $this->url =Config::SCHEME.Config::BASE_URL.'/factura/'.$uuid.'/'.$tipo;
        else {

            if ($uuid == '')
                //Para el timbrado
                $this->url = Config::SCHEME . Config::BASE_URL . Config::PATH_TIMBRADO;
            else
                //Para el detalle o cancelacion
                $this->url = Config::SCHEME . Config::BASE_URL . '/factura/' . $uuid;
        }
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
     *
     *
     * Este metodo realiza el hash HMAC y la codificacion a base64 para mandar la llave privada encriptada
     */
    public function transformarLlave($url_base)
    {

        //Toma la url como esta descrita el http://sandbox.apisat.mx ej: http://sandbox.apisat.mx/api/1.0/factura/{uuid} tal cual
        $url_parsed=parse_url($url_base);
        //Concatena la informacion Metodo, Nombre del host, el Path, el Scheme de la ruta http o https el timestamp y la llave publica separadas por @
        $data=$this->getMetodo().'@'.$url_parsed['host'].$url_parsed['path'].'@'.$url_parsed['scheme'].'@'.$this->getTime().'@'.$this->getLlavePublica();

        //Una vez parseada la ruta se procede a realizar el HMAC
        $hash=hash_hmac('sha256',$data,$this->getLlavePrivada());

        //Para mayor seguridad al enviar la llave privada se codifica
        $hash=base64_encode($hash);

        $this->setLlavePrivada($hash);
    }







}