<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 06/11/2016
 * Time: 01:02 PM
 *
 * ejemplo
 * Redirect::to(404);
 */
class Redirect
{
    public static function to($location=null){
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 404:
                            header('HTTP/1.0 404 Not Found');
                            include '../inclusiones/errores/404.php';
                            exit();
                        break;
                }
            }
            header("Location: ".$location);
            exit();
        }
    }
}