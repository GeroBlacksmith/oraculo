<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 16/10/2016
 * Time: 07:32 PM
 */
include("libs/PDOConfig.php");
include("recursos/Usuario.php");


$db = new PDOConfig();
$post = filter_input_array(INPUT_POST);
$usuario = new Usuario();

$idRol = 2;
$usuario->setIdRol(2);
$nombre = $post['nombre'];
$usuario->setNombre($nombre);
$cuenta = $post['cuenta'];
$usuario->setCuenta($cuenta);
$mail = $post['mail'];
$usuario->setEmail($mail);
$clave = md5($post['clave']);
$usuario->setClave($clave);
if (!($nombre == "" || $cuenta == "" || $mail == "" || $clave == "")) {
    //$sql = "INSERT INTO usuarios(idRol, nombre, cuenta, correo, clave) VALUES ($idRol, \"$nombre\",\"$cuenta\",\"$mail\",\"$clave\");";
    $sql = $usuario->insertar();
    if(!($db->query($sql)))
        echo "<a href=\"index.php\">No se pudo realizar el registro</a>";
}

$db = null;
//echo $sql;
header("location:index.php");
