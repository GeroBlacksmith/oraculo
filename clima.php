<?php
include('libs/PDOConfig.php');

$db = new PDOConfig();
$sql = "SELECT descripcion FROM zona";
$result = $db->query($sql);
$arreglo = $result->fetchAll(PDO::FETCH_ASSOC);

$api_key = "db47f4964efc61e282950fb851d1b7b0";
echo "<a href='index.php'>indice</a><br>";
foreach ($arreglo as $value) {
    $locale = ($value['descripcion']);
    $localeurl = urlencode($value['descripcion']);
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$localeurl&units=metric&APPID=$api_key";
    $json = json_decode(file_get_contents($url), true);
    /**
     * Created by PhpStorm.
     * User: Gero
     * Date: 08/11/2016
     * Time: 12:19 AM
     */
    echo "$locale<br>";
    echo 'Coordenadas<br>Longitud: ', $json['coord']['lon'], '<br>';
    echo 'Latitud, ', $json['coord']['lat'], '<br>';
    echo 'Clima: ', $json['weather'][0]['main'], '<br>';
    echo 'Descripcion: ', $json['weather'][0]['description'], '<br>';
    echo 'Temperatura: ', $json['main']['temp'], '°C - ';
    echo 'Minima: ',$json['main']['temp_min'], '°C - ';
    echo 'Maxima: ',$json['main']['temp_max'], '°C <br> ';
    echo 'Presion: ', $json['main']['pressure'], ' hPa<br>';
    echo 'Viento: ', $json['wind']['speed'],'m/s <br>';
    echo "<hr>";
}
$db = null;