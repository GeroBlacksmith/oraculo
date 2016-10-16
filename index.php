<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

<!-- Esto no deberia ir aca TODO: Poneer en script aparte o algo asi. -->
<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 14/10/2016
 * Time: 07:57 AM
 */
$api_key = "db47f4964efc61e282950fb851d1b7b0";
$url = "http://api.openweathermap.org/data/2.5/weather?q=neuquen,Argentina&APPID=$api_key";
$json = json_decode(file_get_contents($url), true);
?>

<div class="content">
    <div class="row">
        <div class="col s4">
            <div class="card-panel">

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <i class="material-icons">perm_identity</i>

                    <input type="text" id="nombre" placeholder="Nombre de usuario">
                    <i class="material-icons">vpn_key</i>
                    <input type="text" id="clave" placeholder="Clave">
                    <input type="submit" class="btn waves-effect waves-light" value="Iniciar sesion"
                           alt="Iniciar sesion, asegurece de haber ingresado su nombre y contraseña en los campos previos">
                </form>
                <form action="registro.php">
                    <input type="submit" class="btn" value="Registrarce"
                           alt="Registrece en nuestro sistema clickeando aqui.">
                </form>
                Usuario - clave:
                Admin - admin //
                usuarioPrueba - 1234
            </div>
        </div>

        <div class="col s8">
            <div class="card-panel hoverable">

                <div class="row">
                    <div class="col s12"><?= $json['name'] ?></div>
                    <div class="col s12"><?= date("d/m/Y h:m", ($json['dt'])) ?></div>
                    <div class="col s12">Clima principal <?= $json['weather'][0]['main'] ?></div>

                    <div class="col s6">
                        <div>
                            imagen de clima principal<br>
                            temperatura grados c o f <?= $json['main']['temp'] ?><br>
                        </div>
                    </div>
                    <div class="col s6">
                        <div>
                            Probabilidad de precipitaciones<br>
                            Humedad<br>
                            viento<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
