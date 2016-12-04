<?php
include_once("../libs/PDOConfig.php");

$nombre=$_POST["name"];
$cuenta=$_POST["username"];
$correo=$_POST["mail"];
$clave=md5($_POST["password"]);

$db = new PDOConfig();
$json=[];
$json["success"]=false;
$sql="INSERT INTO usuarios (idRol, nombre, cuenta, correo, clave) VALUES (2, \"$nombre\", \"$cuenta\", \"$correo\", \"$clave\");";
if($db->query($sql) != false){
    $json["success"]=true;
}
echo json_encode($json);