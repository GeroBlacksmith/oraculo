<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 31/10/2016
 * Time: 11:55 PM
 */
include "libs/PDOConfig.php";
$db=new PDOConfig();
$idu=$_GET['idUsuarios'];
$idz=$_GET['idZona'];
$sql="SELECT *FROM asociarzona WHERE idUsuarios=$idu AND idZona=$idZona";
$res = $db->query($sql);
if(!$res){
    echo "es falso, se puede insertar";
}else{
    echo "esta repetido no se puede.";
}