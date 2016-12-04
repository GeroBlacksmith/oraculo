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
$zonas = [];
$zonas["success"] = true;
$zonas["errorMessage"] = "Sin errores";
$sql = "SELECT DISTINCT zona.idZona, zona.descripcion FROM asociarzona JOIN zona ON asociarzona.idZona=zona.idZona WHERE asociarzona.idUsuarios=$idUsuarios";
$result = $db->query($sql);
if ($result) {
    $contador=0;
    $arreglo = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arreglo as $item) {
        $zonas[$contador]['idZona'] = $item['idZona'];
        $zonas[$contador]['descripcion'] = $item['descripcion'];
        $contador++;
    }
    $zonas['max']=$contador;
} else {
    $zonas["success"] = false;
    $zonas["errorMessage"] = "Error en la consutla";
}
echo json_encode($zonas);
