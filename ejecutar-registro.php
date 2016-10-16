<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 16/10/2016
 * Time: 07:32 PM
 */
include ("libs/PDOConfig.php");
$db=new PDOConfig();

$post = filter_input_array(INPUT_POST);

$idRol=2;
$nombre=$post['nombre'];
$cuenta=$post['cuenta'];
$mail=$post['mail'];
$clave=md5($post['clave']);

$sql = "INSERT INTO usuarios(idRol, nombre, cuenta, correo, clave) VALUES ($idRol, \"$nombre\",\"$cuenta\",\"$mail\",\"$clave\");";

$db->query($sql);
header("location:index.php");
$db=null;