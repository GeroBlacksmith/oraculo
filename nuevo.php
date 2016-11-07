<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 07/11/2016
 * Time: 01:32 PM
 */
require_once 'core/init.php';

$user = new User('usuarioPrueba');
echo $user->data()->cuenta, '<br>';
$lista = $user->listaDeZonas();
$zona = new Zona(3);

//echo ($zona->data()->first()->descripcion);
foreach ($lista as $cosas){
    echo $cosas['idZona'];
}
//prueba