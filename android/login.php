<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 28/11/2016
 * Time: 06:51 PM
 */
include_once "../libs/PDOConfig.php";
$action     =   $_POST['action'];
$username   =   $_POST['username'];
$password   =   md5($_POST['password']);
//$rememberme =   $_POST['rememberme'];
$json = [];
$json["success"] =true;
if($action && $action=="login"){
    $db = new PDOConfig();
    $result = $db->query("SELECT * FROM usuarios WHERE nombre='$username';");
    if($result) {
        $arreglo = $result->fetchAll(PDO::FETCH_ASSOC);
        if($arreglo[0]['clave']==$password){
            $json['idUsuario']=$arreglo[0]['idUsuario'];
            $json['idRol']=$arreglo[0]['idRol'];
            $json['nombre']=$arreglo[0]['nombre'];
            $json['cuenta']=$arreglo[0]['cuenta'];
            $json['correo']=$arreglo[0]['correo'];
            $json['clave']=$arreglo[0]['clave'];
        }else{
            $json["success"] =false;
            //contraseña incorrecta
        }
    }else{
        //usuario erroneo
        $json["success"] =false;
    }
}else{
    $json["success"] =false;
}

echo json_encode($json);