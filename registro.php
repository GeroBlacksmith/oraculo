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
                <i class="material-icons">error</i>
                <form action="ejecutar-registro.php" method="post" onsubmit="validarTodo()">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo">
                    <input type="text" id="cuenta" name="cuenta" placeholder="Nombre de la cuenta (debe ser unico)">
                    <input type="email" id="email" name="mail" placeholder="Email@nuevo.ya">
                    <input type="password" id="clave" name="clave" placeholder="Clave">
                    <input type="password" id="verificar-clave" name="rep-clave" placeholder="Repetir clave">
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
