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
    $html="<div class='row'><ul class='collection col s12'>";
    foreach ($arreglo as $fila){
        $html.="<li class='collection-item'>";
        $sql="SELECT * FROM zona WHERE idZona=".$fila['idZona'];
        $result=$db->query($sql);
        $arreglo=$result->fetchAll(PDO::FETCH_ASSOC);
        $html.=$arreglo[0]['descripcion'];
        $html.="<button class=' btn right'><i
                        class=\"material-icons right\">delete</i></button>";
        $html.="<button class=' btn right'><i
                        class=\"material-icons right\">settings</i></button>";
        $html.="</li>";
    }
    $html.="</div></ul>";
    echo $html;
}else{
    echo "Ninguna zona asociada todavia.";
}
$db=null;