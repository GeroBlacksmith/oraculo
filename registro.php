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
    <!-- iconos especiales de materialize -->
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
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card-panel">

                <form action="ejecutar-registro.php" method="post" onsubmit="return validarTodo()">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" onkeydown="limpiar()"><i class="material-icons" id="i_error_nombre">error</i>
                    <div id="div_error_nombre"></div>
                    <input type="text" id="cuenta" name="cuenta" placeholder="Nombre de la cuenta (debe ser unico)" onkeydown="limpiar()"><i class="material-icons" id="i_error_cuenta">error</i>
                    <div id="div_error_cuenta"></div>
                    <input type="email" id="email" name="mail" placeholder="Email@nuevo.ya" onkeydown="limpiar()"><i class="material-icons" id="i_error_mail">error</i>
                    <div id="div_error_email"></div>
                    <input type="password" id="clave" name="clave" placeholder="Clave" onkeydown="limpiar()"><i class="material-icons" id="i_error_clave">error</i>
                    <div id="div_error_clave"></div>
                    <input type="password" id="verificar-clave" name="rep-clave" placeholder="Repetir clave" onkeydown="limpiar()"><i class="material-icons" id="i_error_repetir_clave">error</i>
                    <div id="div_error_repetir_clave"></div>
                    <input type="submit" class="btn" value="Ingresar">
                    <br>
                    Usuario - clave:
                    Admin - admin //
                    usuarioPrueba - 1234
                </form>
            </div>
        </div>
    </div>
</div>


<!-- scripts -->
<script src="validar.js"></script>

</body>
</html>
