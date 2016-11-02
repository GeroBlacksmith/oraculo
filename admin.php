<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 27/10/2016
 * Time: 12:30 AM
 */ ?>
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
<html>
<head>
    <meta charset="UTF-8">
    <title>ORACULO</title>
    <!-- Iconos especiales de materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Estilos principal -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <!-- Jquery -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

</head>
<body>
<!-- Navbar goes here -->

<!-- Page Layout here -->
<div class="row">

    <div class="col s12 m4 l3 menu cyan lighten-4"> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->


        <h4> Administrador</h4>
        <br>

        <ul>
            <li>Inicio</li>
            <li>Mensajes</li>
            <li>Opciones</li>
        </ul>
        <div class="row">
            <ul>
                <li>
                    <button class="btn col s8" id="boton_agregar_zona">Agregar Zona</button>
                </li>
                <li>
                    <button class="btn col s8" id="boton_ver_usuarios">Usuarios</button>
                </li>
            </ul>
        </div>

    </div>

    <div class="col s12 m8 l9 contenido cyan lighten-5"> <!-- Note that "m8 l9" was added -->
        <nav class="black">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">ORACULO</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Usuarios</a></li>
                    <li><a href="#">Alertas</a></li>
                    <li><a href="#">Colaboraciones</a></li>
                    <li><a href="cerrar.php">Cerrar sesion</a></li>
                </ul>

            </div>
        </nav>
        <hr>
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
        <div class="row" id="agregarzona">

            <form action="insertar-zona.php" class="col s12" method="post" onsubmit="return true;">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="validate" placeholder="Descrpicion" name="descripcion">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="validate" placeholder="Latitud" name="latitud">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="validate" placeholder="Longitud" name="longitud">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input class="btn" type="submit" value="Agregar zona">
                    </div>
                </div>
            </form>
        </div>
        <div class="row" id="verusuarios">
            <div class="row">
                <div class="col s8"><h4>Usuarios</h4></div>

            </div>
            <div class="row" >
                <div class="col s4">Nombre</div>
                <div class="col s4">
                    Zona
                </div>
                <div class="col s4">
                    ultima colaboracion
                </div>
            </div>
            <div id="info-usuarios"></div>
        </div>
    </div>

</div>
<script src="js/admin.js"></script>
</body>
</html>
