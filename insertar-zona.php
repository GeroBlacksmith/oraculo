<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 28/10/2016
 * Time: 11:47 PM
 */
include "libs/PDOConfig.php";
$descripcion = filter_input(INPUT_POST,"descripcion");
$latitud = filter_input(INPUT_POST,"latitud");
$longitud=filter_input(INPUT_POST, "longitud");
$db = new PDOConfig();
$sql = "INSERT INTO zona(descripcion, latitud, longitud)VALUES(\"$descripcion\",\"$latitud\",\"$longitud\");";
$db->query($sql);
$db=null;
header("location:admin.php");