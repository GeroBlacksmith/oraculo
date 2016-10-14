<!DOCTYPE html>
    <?php
    include "inicializar.php";
    ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
            <title><?=(new Nucleo())->titulo?></title>

        <!-- Estilos principal -->
        <link rel="stylesheet" href="main.css">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    </head>
    <body>
    <nav class="blue darken-1">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">ORACULO</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#">#</a></li>
            </ul>
        </div>
    </nav>

    <form action="<?= $_SERVER['PHP_SELF']?>" method="post" class="formulario">

        <input type="text" id="nombre" placeholder="Nombre de usuario">
        <input type="text" id="clave" placeholder="Clave">
        <input type="submit" class="btn" value="Iniciar sesion">
        <button class="btn"><a href="registro.php">Registrarte</a></button>
    </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
