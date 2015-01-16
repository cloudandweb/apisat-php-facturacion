<?php
/**
 * Created by PhpStorm.
 * User: Kurogane
 * Date: 15/01/2015
 * Time: 12:15
 */
class Timbrar extends Apisat
{
    public function __constructor()
    {
        if(func_num_args()==0)
        {
            $this->llave_publica='';
            $this->llave_privada='';
            $this->time=date('c');
            $this->url='';
            $this->metodo='';
        }
        if(func_num_args()==4)
        {
            $argumentos=func_get_args();
            $this->llave_publica=$argumentos[0];
            $this->llave_privada=$argumentos[1];
            $this->url=$argumentos[2];
            $this->metodo=$argumentos[3];
        }

    }
}