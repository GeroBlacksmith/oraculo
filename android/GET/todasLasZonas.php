<?php

error_reporting(0);
include_once "../../libs/PDOConfig.php";
$db = new PDOConfig();


$zonas = [];
$zonas["success"] = true;
$zonas["errorMessage"] = "Sin errores";
$sql = "SELECT * FROM zona";
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
