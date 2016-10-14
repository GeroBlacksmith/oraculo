<!DOCTYPE html>
<?php
include "inicializar.php";
if(isset($_POST['nombre'])){
    header("location: index.php");
}else{

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
<h4>Bienvenido nuevo usuario</h4>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="formulario">
    <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo">
    <input type="text" id="cuenta" placeholder="Nombre de la cuenta (debe ser unico)">
    <input type="email" id="email" placeholder="Email@nuevo.ya">
    <input type="password" id="clave" placeholder="Clave">
    <input type="password" id="verificar-clave" placeholder="Repetir clave">
    <input type="submit" class="btn" value="Ingresar">

</form>
<?php
// put your code here
?>
</body>
</html>
