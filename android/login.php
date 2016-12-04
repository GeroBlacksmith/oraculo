<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 28/11/2016
 * Time: 06:51 PM
 */
error_reporting(0);
include_once "../libs/PDOConfig.php";
$action = $_POST['action'];
$username = $_POST['username'];
$password = md5($_POST['password']);
//$rememberme =   $_POST['rememberme'];
$json = [];
$json["success"] = true;
if ($action && $action == "login") {
    $db = new PDOConfig();
    $result = $db->query("SELECT * FROM usuarios WHERE cuenta=\"$username\" AND clave=\"$password\";");
    if ($result) {
        $arreglo = $result->fetchAll(PDO::FETCH_ASSOC);

        $json['idUsuarios'] = $arreglo[0]['idUsuarios'];
        $json['idRol'] = $arreglo[0]['idRol'];
        $json['nombre'] = $arreglo[0]['nombre'];
        $json['cuenta'] = $arreglo[0]['cuenta'];
        $json['correo'] = $arreglo[0]['correo'];
        $json['clave'] = $arreglo[0]['clave'];


    } else {
        //usuario erroneo
        $json["success"] = false;
        $json["errorMessage"] = "El usuario no devolcio resultado.";
    }
} else {
    $json["success"] = false;
    $json["errorMessage"] = "no es login, aun no esta implementada otra accion.";
}

echo json_encode($json);