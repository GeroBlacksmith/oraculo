<!DOCTYPE html>
<?php
include("libs/PDOConfig.php");
include("libs/Login.php");
$oLogin = new Login();

$activa = false;
if ($oLogin->activa()) {

    $activa = true;
    $nombre = $_SESSION['nombreUsuario'];
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
    <script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
</head>
<body>
<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
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
                Agregar una zona para monitorear:<br>
                <!-- carga dinamica de las zonas -->
                <select class="browser-default">
                    <option>Neuquen</option>
                    <option>Allen</option>
                </select>
                <a class="waves-effect waves-light btn green darken-1"><i class="material-icons right">add</i>Agregar zona</a>
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


</body>
</html>
