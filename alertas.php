<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 07/11/2016
 * Time: 07:07 PM
 */

include("libs/PDOConfig.php");
include("libs/Login.php");
$oLogin = new Login();
$insert = null;
$columnas = 0;
$activa = false;
if ($oLogin->activa()) {

    $activa = true;
    $nombre = $_SESSION['nombreUsuario'];
    $rol = $_SESSION['Rol'];
    if ($rol == 1) {
        header("location:admin.php");
    }
} else {
    header("location:index.php");
}
$nombre = $_SESSION['nombreUsuario'];
$idUsuarios = $_SESSION['idUsuario'];
if($_POST){
    header("Location:perfil.php");
}
/*
require_once ('core/init.php');
$user = new User();*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oraculo</title>
    <!-- Iconos especiales de materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <!-- Jquery -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <!-- Estilos principal -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="idusuario"><?= $_SESSION['idUsuario'] ?></div>

<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <?php if ($oLogin->activa()): ?>
                <li><a href="perfil.php"><?= $oLogin->getNombreUsuario() ?></a></li>
            <?php endif; ?>
            <li><a href="#">Nuestros Servicios</a></li>
            <li><a href="#">Quienes Somos</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="cerrar.php">Cerrar sesion</a></li>
        </ul>
    </div>
</nav>
<div class="content">
    <?php
    if($_GET){
        $db = new PDOConfig();
        $idzona=$_GET['idZona'];
        $sql = "SELECT * FROM zona WHERE idZona=$idzona";
        $resultado=$db->query($sql);
        $arreglado=$resultado->fetchAll(PDO::FETCH_ASSOC);
        echo $arreglado[0]['descripcion'];

        $db = null;
    }

    ?>
    <form action="" method="post">
        <select name="alerta">
            <?php
            $db = new PDOConfig();
            $sql= "SELECT * FROM lista";
            $resultado = $db->query($sql);
            $arreglo=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach($arreglo as $valor){
                $aux1=$valor['nombre'];
                echo '<option value="">';
                echo $aux1;
                echo '</option >';
            }

            $db=null;
            ?>
        </select>
        <input type="submit" value="Agregar alerta">
    </form>
</div>

</body>
</html>
