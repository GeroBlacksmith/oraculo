<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 03/12/2016
 * Time: 04:10 PM
 */
error_reporting(0);
include_once "../../libs/PDOConfig.php";
$db = new PDOConfig();

$idUsuarios = (int)$_POST['idUsuarios'];
$idZona= (int)$_POST['idZona'];
$colaboracion = [];
$colaboracion["success"] = true;
$colaboracion["errorMessage"] = "Sin errores";
$sql_ = "SELECT DISTINCT colaboracion.descripcion as descripcion, Usuario.nombre as nombre, zona.descripcion as zona FROM colaboracion JOIN zona,usuarios ON colaboracion.idZona=zona.idZona AND colaboracion.idUsuarios = usuarios.idUsuarios WHERE colaboracion.idUsuarios<>$idUsuarios AND idZona=$idZona;";
$sql ="SELECT colaboracion.descripcion, colaboracion.fechaInicio, usuarios.nombre FROM colaboracion JOIN usuarios ON colaboracion.idUsuario=usuarios.idUsuarios WHERE colaboracion.idUsuario<>$idUsuarios AND idZona=$idZona;";
$result = $db->query($sql);
if ($result) {
    $contador=0;
    $arreglo = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arreglo as $item) {
        $colaboracion[$contador]['descripcion'] = $item['descripcion'];
        $colaboracion[$contador]['fechaInicio'] = $item['fechaInicio'];
        $colaboracion[$contador]['nombre'] = $item['nombre'];
      
        $contador++;
    }
    $colaboracion['max']=$contador;
} else {
    $colaboracion["success"] = false;
    $colaboracion["errorMessage"] = "Error en la consulta";
}
echo json_encode($colaboracion);
