<?php
include_once("../../libs/PDOConfig.php");
$descripcion = $_POST['descripcion'];
$idZona = (int)$_POST['idZona'];
$idUsuario = (int)$_POST['idUsuario'];
$duracion=strtotime(time()+(8*60*60));
$fechaInicio=date('Y-m-d H:i:s');
$fechaFin=date('Y-m-d H:i:su', $duracion);
$sql = "INSERT INTO colaboracion (fechaInicio, fechaFin, activo, idZona, idUsuario, descripcion)VALUES(\"$fechaInicio\", \"$fechaFin\", \"true\", $idZona, $idUsuario, \"$descripcion\");";
$db = new PDOConfig();
$db->query($sql);
$db=null;
$response = [];
$response["success"]=true;
echo json_encode($response);