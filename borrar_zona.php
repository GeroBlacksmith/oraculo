<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 30/10/2016
 * Time: 03:49 PM
 */

include "libs/Login.php";



$idZona = $_GET['idzona'];
$oLogin=new Login();
if($oLogin->activa()){
    $idUsuario = $oLogin->getIdUsuario();
    $db=new PDOConfig();
    $sql = "DELETE FROM asociarzona WHERE idUsuarios=$idUsuario AND idZona=$idZona";
    $db->query($sql);
    $db=null;
    echo $idUsuario;
}
echo "";