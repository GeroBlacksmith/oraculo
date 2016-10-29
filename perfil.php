<!DOCTYPE html>
<?php
include("libs/PDOConfig.php");
include("libs/Login.php");
$oLogin = new Login();

$activa = false;
if ($oLogin->activa()) {

    $activa = true;
    $nombre = $_SESSION['nombreUsuario'];
    $rol = $_SESSION['Rol'];
    if($rol == 1){
        header("location:admin.php");
    }
} else {
    header("location:index.php");
}

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Oraculo</title>
    <!-- Iconos especiales de materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Estilos principal -->
    <link rel="stylesheet" href="main.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <!-- Jquery -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>

<div class="idusuario"><?=$_SESSION['idUsuario']?></div>

<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <?php if ($oLogin->activa()): ?>
                <li><a href="perfil.php"><?= $oLogin->getNombreUsuario() ?></a></li>
            <?php endif; ?>
            <li><a href="cerrar.php">Cerrar sesion</a></li>
            <li><a href="#">Nuestros Servicios</a></li>
            <li><a href="#">Quienes Somos</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="cerrar.php">Cerrar sesion</a></li>
        </ul>
    </div>
</nav>
<div class="content">
    <div class="row">
        <div class="col s4 ">
            <div class="card-panel">
                Usuario: <?= $nombre ?><br>
                Zonas elegidas:<br>
                <div class="zonas_elegidas"></div>
                Agregar una zona para monitorear:<br>
                <!-- carga dinamica de las zonas -->
                <div id="resultado-zonas"></div>
                <a class="waves-effect waves-light btn green darken-1" id="boton-agregar-zona" href="#"><i
                        class="material-icons right">add</i>Agregar zona</a>

            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">
                <div>
                    webservice de alertas<br>
                    <img src="img/weather_rain.png" alt="imagen que representa el clima actual">

                </div>
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Alertas recientes</h4></li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                </ul>

            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">

                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red" alt="agregar contribucion" href="#">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Contribuciones</h4></li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                    <li class="collection-item">Alvin</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="perfil.js"></script>
</body>
</html>
