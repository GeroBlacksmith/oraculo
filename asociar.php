<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 25/10/2016
 * Time: 01:17 PM
 */
include 'libs/PDOConfig.php';

$db=new PDOConfig();

$idUsuario = $_GET['idusuario'];
$sql = "SELECT idZona FROM asociarzona WHERE idUsuarios=".$idUsuario;
$result=$db->query($sql);
if($result){
    $arreglo=$result->fetchAll(PDO::FETCH_ASSOC);
    $html="<ul class='collection'>";
    foreach ($arreglo as $fila){
        $html.="<li class='collection-item'>";
        $sql="SELECT * FROM zona WHERE idZona=".$fila['idZona'];
        $result=$db->query($sql);
        $arreglo=$result->fetchAll(PDO::FETCH_ASSOC);
        $html.=$arreglo[0]['descripcion'];
        $html.="<button class=' btn right'>Borrar</button>";
        $html.="</li>";
    }
    echo $html;
}else{
    echo "Ninguna zona asociada todavia.";
}
$db=null;