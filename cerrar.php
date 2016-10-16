<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 16/10/2016
 * Time: 07:15 PM
 */
include "libs/Login.php";
$o=new Login();
if($o->activa()){
    $o->cerrar();
}
header("location:index.php");