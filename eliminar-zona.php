<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 07/11/2016
 * Time: 06:38 PM
 */
include "libs/PDOConfig.php";
include "libs/Login.php";
if($_GET){
    $zona = $_GET['idZona'];
    $ologin=new Login();
    $idUsuarios=$ologin->getIdUsuario();
    $db = new PDOConfig();
    $sql="DELETE FROM asociarzona WHERE idZona=$zona AND idUsuarios=$idUsuarios";
    if($db->query($sql)){
        header("Location:perfil.php");
    }else{
        echo "no se pudo";
    }
    $db = null;
}