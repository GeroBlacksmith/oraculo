<?php
include_once 'libs/PDOConfig.php';
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 24/10/2016
 * Time: 12:49 AM
 */
if ($_POST) {
    $db = new PDOConfig();

    if(isset($_POST['descripcion'])){
        $descripcion=$_POST['descripcion'];
        $sql="SELECT idZona FROM zona WHERE descripcion=\"$descripcion\";";
        $resultado=$db->query($sql);
        $arreglo=$resultado->fetchAll(PDO::FETCH_ASSOC);
        if($arreglo) {
            echo $arreglo[0]['idZona'];
        }else{
            echo "no funciona fetchAll";
        }


    }else {
        if(isset($_POST['idzona'])) {
            $idzona = $_POST['idzona'];
        }else{
            $error=   "No entro post idzona";
        }
        if(isset($_POST['idusuario'])) {
            $idusuario = $_POST['idusuario'];
        }else{
            $error=   "No entro post idusuario";
        }

        $sql = "INSERT INTO asociarzona(idzona, idusuario)VALUES ($idzona, $idusuario);";
        $db->query($sql);
        echo "Ok";

    }
    $db = null;
    if(isset($error)){
        echo $error;
    }

} else {
    $db = new PDOConfig();
    $sql = "SELECT * FROM zona;";
    $resultado = $db->query($sql);
    $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);

    $html = '<select class="browser-default" id="zona_select">';
    foreach ($arreglo as $valor) {
        $zona=$valor["descripcion"];
        $id=$valor["idZona"];
        $html.='<option><div>'.$id.'</div> - '.$zona.'</option>';
    }
    $db = null;
    $html .= '</select>';
    echo $html;
}