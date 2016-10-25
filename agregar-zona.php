<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 16/10/2016
 * Time: 11:08 PM
 */ ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ORACULO</title>
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

<!-- Navbar -->
<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Nuestros Servicios</a></li>
            <li><a href="#">Quienes Somos</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </div>
</nav>

<!-- content -->
<div class="content">
    <select class="browser-default">
        <option>Neuquen</option>
        <option>Allen</option>
    </select>
</div>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
</body>
</html>
