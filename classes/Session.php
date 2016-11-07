<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 06/11/2016
 * Time: 01:03 PM
 */
class Session
{
    /**
     * @param $name
     * @return bool
     * * funcion para comprobar que la sesion con nombre de indice $name exista
     * return bool
     */
    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     * funcion para agregar a la sesion el indice $name el valor $value
     */
    public static function put($name, $value){
        return $_SESSION[$name]=$value;


    }

    /**
     * @param $name
     * borra la sesion con el indice $name
     */
    public static function delete($name){

        if(self::exists($name)){
            unset($_SESSION[$name]);
        }
    }
    public static function get($name){
        return $_SESSION[$name];
    }

    public static function flash($name, $string=''){
        if(self::exists($name)){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }else{
            self::put($name, $string);
        }


    }

}