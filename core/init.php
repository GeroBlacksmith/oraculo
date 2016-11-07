<?php

/** *
 * este script php es el que se tendra que ejecutar al principio de pada pagina que se cargue.
 *
 * Tutorial de youtube.com/codecurse
 *
 */
session_start();

$GLOBALS['config'] = [
    'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'oraculo'
    ],
    'remember' => [
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ],
    'session' => [
        'session_name' => 'user',
        'token_name' => 'token'
    ]

];

/*
require_once 'classes/Config.php';
require_once 'classes/Cookie.php';
require_once 'classes/DB.php';*/
//para evitar el uso de los require usamos lo siguiente
spl_autoload_register(function ($class) {
    require_once('classes/' . $class . '.php');
});
//require_once('functions/sanitize.php');
/**
if (Cookie::exists(Config::get('remember/cookie_name')) && Session::exists(Config::get("session/session_name")))
{
    $hash = Cookie::get(Config::get("remember/cookie_name"));
    $hashCheck = DB::getInstance()->get("users_session", ['hash','=', $hash]);
    if($hashCheck->count()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }

}
//require_once "../libs/PDOConfig.php";
//require_once  "../libs/Login.php";
/**
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

**/