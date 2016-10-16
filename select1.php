<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 16/10/2016
 * Time: 03:23 PM
 */
include_once "libs/PDOConfig.php";

$db = new PDOConfig();
$sql="SELECT cuenta FROM usuarios";
$resultado=$db->query($sql);
$result=$resultado->fetchAll(PDO::FETCH_ASSOC);

$json = "{\"cuenta\":[";
foreach ($result as $value){
    $aux=$value['cuenta'];
    $json.="\"$aux\"";
    $json.=",";

}
$json.="\"final\"]}";
echo $json;