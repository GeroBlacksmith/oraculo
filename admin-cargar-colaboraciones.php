<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 29/10/2016
 * Time: 08:15 PM
 */
include "libs/PDOConfig.php";
$html="";
$bd = new PDOConfig();
//Obtiene los usuarios que tienen asignada una zona
//Muestra solo el nombre del usuario y la descripcion del area asignada.
$sql="SELECT DISTINCT usuarios.nombre, colaboracion.descripcion, zona.descripcion as zona
             FROM usuarios JOIN colaboracion LEFT JOIN zona ON ( colaboracion.idUsuario=usuarios.idUsuarios) WHERE colaboracion.idZona=zona.idZona ";
//$sql = "SELECT * FROM usuarios WHERE idRol=2";
$resultado=$bd->query($sql);
$arreglo =$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach ($arreglo as $value){
    $html.="<div class='row'>";

    $html.= "    <div class='col s4'><a href='#'>";
    $html.= $value['nombre'];
    $html.= "    </a></div>";
    $html.= "    <div class='col s4'><a href='#'>";
    $html.= $value['descripcion'];
    $html.= "    </a></div>";
    $html.= "    <div class='col s4'><a href='#'>";
    $html.= $value['zona'];
    $html.= "    </a></div>";
    $html.= "</div>";
}
$bd = null;
echo $html;