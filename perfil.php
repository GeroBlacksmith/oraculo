<?php
include("libs/PDOConfig.php");
include("libs/Login.php");
$oLogin = new Login();
$insert = null;
$columnas = 0;
$activa = false;
if ($oLogin->activa()) {

    $activa = true;
    $nombre = $_SESSION['nombreUsuario'];
    $rol = $_SESSION['Rol'];
    if ($rol == 1) {
        header("location:admin.php");
    }
} else {
    header("location:index.php");
}
$nombre = $_SESSION['nombreUsuario'];
$idUsuarios = $_SESSION['idUsuario'];
if ($_POST) {
    if (isset($_POST['zonas'])) {
        $idZona = $_POST['zonas'];

        $db = new PDOConfig();
        $sql1 = "SELECT idZona FROM asociarzona WHERE idZona= $idZona AND idUsuarios=$idUsuarios";
        $columnas = $db->query($sql1)->rowCount();
        //$columnas=$resultado->fetchAll(PDO::FETCH_ASSOC);

        $db = null;
        if ($columnas === 0) {

            $db = new PDOConfig();
            $sql = "INSERT INTO asociarzona(idZona, idUsuarios)VALUES (" . $_POST['zonas'] . ", " . $idUsuarios . ")";
            if ($db->query($sql)) {
                $insert = "ok";
            }
            $db = null;
        }
    }
}
/*
require_once ('core/init.php');
$user = new User();*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oraculo</title>
    <!-- Iconos especiales de materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <!-- Jquery -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <!-- Estilos principal -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="idusuario"><?= $_SESSION['idUsuario'] ?></div>

<nav class="black darken-1">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo left">ORACULO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <?php if ($oLogin->activa()): ?>
                <li><a href="perfil.php"><?= $oLogin->getNombreUsuario() ?></a></li>
            <?php endif; ?>
            <li><a href="clima.php">Clima</a></li>
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

                Zonas elegidas:<br>
                <div class="zonas_elegidas">
                    <?php
                    $db = new PDOConfig();


                    $sql = "SELECT zona.idZona, zona.descripcion FROM asociarzona JOIN zona ON asociarzona.idZona=zona.idZona WHERE idUsuarios = $idUsuarios";
                    $resultado = $db->query($sql);
                    $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    echo '<ol class="collection">';
                    foreach ($arreglo as $item) {
                        $aux = $item['idZona'];
                        echo "<li class=\"collection-item\"><a href='alertas.php?idZona=$aux'>";
                        echo $item['descripcion'];
                        $descr=$item['descripcion'];
                        echo "</a>";
                        echo "<a href='eliminar-zona.php?idZona=$aux'>";
                        echo "<button class='btn-tiny right' href='eliminar-zona.php?idZona=$aux'>X</button></a></li>";


                    }
                    echo '</ol>';
                    $db = null;
                    ?>
                </div>
                <!-- trae de la base de datos las zonas elegidas -->

                Agregar una zona para monitorear:<br>
                <!-- carga dinamica de las zonas -->
                <div id="resultado-zonas">
                    <form method="post" action="">
                        <select name="zonas">
                            <?php
                            $db = new PDOConfig();


                            $sql = "SELECT * FROM zona";
                            $resultado = $db->query($sql);
                            $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
                            $descr="";
                            foreach ($arreglo as $item) {
                                echo "<option value=\"";
                                echo $item['idZona'];
                                echo "\">";

                                echo $item['descripcion'];
                                echo "</option>";
                            }
                            $db = null;
                            ?>
                        </select>
                        <input class="waves-effect waves-light btn green darken-1" type="submit" value="AGREGAR ZONA">
                    </form>
                </div>


            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">
                <div>
                    <?php
                    /**
                     * Created by PhpStorm.
                     * User: Gero
                     * Date: 14/10/2016
                     * Time: 07:57 AM
                     */
                    $api_key = "db47f4964efc61e282950fb851d1b7b0";
                    $descr=urlencode($descr);
                    $url = "http://api.openweathermap.org/data/2.5/weather?q=Allen,Argentina&units=metric&APPID=$api_key";
                    $json = json_decode(file_get_contents($url), true);
                    $img="img/weather_cloud.png";
                    //$img="http://openweathermap.org/img/w/"+$json["weather"][0]["icon"]+".png";
                    $clima='';
                    if($json['weather'][0]['main']=="Clear"){
                        $img="img/weather_sun.png";
                        $clima="despejado";
                    }
                    if($json['weather'][0]['main']=="Rain"){
                        $img="img/weather_rain.png";
                        $clima="lluvia";
                    }
                    if($json['weather'][0]['main']=="Snow"){
                        $img="img/weather_snow.png";
                        $clima="nieve";
                    }
                    if($json['weather'][0]['main']=="Cloud"){
                        $img="img/weather_cloud.png";
                        $clima="nublado";
                    }
                    echo $clima, "<br>";
                    echo $json['name'];
                    ?>
                    webservice de alertas<br>
                    <img src="<?=$img?>" alt="imagen que representa el clima actual"><br>


                </div>
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Alertas recientes</h4></li>

                </ul>

            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">
                <button class="btn" id="btn_mias">Mias</button><button class="btn" id="btn_otros">Otros</button>
                <div class="mias">
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large red" alt="agregar contribucion" href="contribuir.php">
                            <i class="large material-icons">add</i>
                        </a>
                    </div>
                    <ul class="collection with-header" id="mi_coleccion">
                        <li class="collection-header"><h4>Mis Contribuciones</h4></li>
                        <!--obtener las contribuciones que otros usuarios han hecho sobe las misma szonas -->
                        <?php
                        $db = new PDOConfig();
                        $sql = "SELECT * FROM colaboracion WHERE idUsuario=$idUsuarios ORDER BY fechaInicio DESC";
                        $resultado = $db->query($sql);
                        $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($arreglo as $value) {
                            echo "<li class='collection-item'>";
                            echo $value["descripcion"],"<br>";
                            echo " <span class='date'>";
                            echo $value['fechaInicio'];
                            echo "</span>";
                            echo "</li>";
                        }


                        $db = null;
                        ?>
                    </ul>
                </div>
                <div class="nomias">
                    <ul class="collection with-header" id="otros_coleccion">
                        <li class="collection-header"><h4>Contribuciones de los demas</h4></li>
                    <?php
                    $db = new PDOConfig();
                    $sql = "SELECT DISTINCT idZona FROM asociarzona WHERE idUsuarios=$idUsuarios";
                    //echo $sql;
                    $resultado = $db->query($sql);
                    $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    $limite=5;
                    $acumulador_1 = 0;
                    foreach ($arreglo as $value) {
                        $idZona=$value['idZona'];
                        $sql="SELECT * FROM colaboracion JOIN usuarios ON usuarios.idUsuarios=colaboracion.idUsuario WHERE idZona=$idZona AND colaboracion.idUsuario<>$idUsuarios ORDER BY fechaInicio DESC";

                        $resultado = $db->query($sql);
                        $arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($arreglo as $valor){
                            echo "<li class='collection-item'>";
                            echo " <span class='nombre-colaboracion'>";
                            echo $valor['nombre'], "<br>";
                            echo "</span>";
                            echo ( $valor["descripcion"]);
                            echo " <span class='date'>";
                            echo ( $valor["fechaInicio"]);
                            echo "</span>";

                            echo "</li>";
                        }

                    }


                    $db = null;
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/perfil_1.js"></script>
</body>
</html>
