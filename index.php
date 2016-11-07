<?php
include "libs/PDOConfig.php";
include "libs/Login.php";

$post = filter_input_array(INPUT_POST);
$oLogin = new Login();

if (isset($post) && is_array($post)) {
    //session_start();
    $nombre = $post['nombre'];
    $clave = $post['clave'];

    $oLogin->iniciar($nombre, $clave);
    $oLogin->validar();
    if ($oLogin->activa()) {
        header("location:perfil.php");
    }

}

?>
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
    <link rel="stylesheet" href="css/main.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
</head>
<body>

<!-- Navbar -->
<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <?php if($oLogin->activa()):?>
                <li><a href="perfil.php"><?= $oLogin->getNombreUsuario()?></a></li>
                <li><a href="cerrar.php">Cerrar sesion</a></li>
            <?php endif; ?>

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
$url = "http://api.openweathermap.org/data/2.5/weather?q=neuquen,Argentina&units=metric&APPID=$api_key";
$json = json_decode(file_get_contents($url), true);
$img="img/weather_cloud.png";
//$img="http://openweathermap.org/img/w/"+$json["weather"][0]["icon"]+".png";
if($json['weather'][0]['main']=="Clear"){
    $img="img/weather_sun.png";
}
if($json['weather'][0]['main']=="Rain"){
    $img="img/weather_rain.png";
}
if($json['weather'][0]['main']=="Snow"){
    $img="img/weather_snow.png";
}
if($json['weather'][0]['main']=="Cloud"){
    $img="img/weather_sun.png";
}
if($json['weather'][0]['main']=="Clear"){
    $img="img/weather_cloud.png";
}
?>

<div class="content">

    <div class="row">
    <?php if(!$oLogin->activa()):?>
        <div class="col s4">
            <div class="card-panel">

                <form action="index.php" method="post">
                    <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" id="nombre" name="nombre" class="validate" placeholder="Cuenta">

                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">vpn_key</i>
                        <input type="password" id="clave" name="clave" class="validate" placeholder="Clave">

                    </div>
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
        <?php endif?>
        <?php if(!$oLogin->activa()):?>
        <div class="col s8">
            <?php else:?>
            <div class="col s12">
            <?php endif?>
            <div class="card-panel hoverable">

                <div class="row">
                    <div class="col s12"><?= $json['name'] ?></div>
                    <div class="col s12"><?= date("d/m/Y h:m", ($json['dt'])) ?></div>
                    <div class="col s12">Clima principal <?= $json['weather'][0]['main'] ?></div>

                    <div class="col s6">
                        <div>
                            <img src="<?=$img?>"><br>
                            t°:<?= $json['main']['temp'] ?>°C<br>
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
