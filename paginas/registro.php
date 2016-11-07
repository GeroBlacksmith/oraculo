<?php
/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 07/11/2016
 * Time: 02:06 PM
 */?>

<form action="" method="post">
    <div class="field">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
    </div>
    <div class="field">
        <label for="cuenta">Cuenta</label>
        <input type="text" id="cuenta" name="cuenta">
    </div>
    <div class="field">
        <label for="correo">E-Mail</label>
        <input type="text" id="correo" name="correo">
    </div>
    <div class="field">
        <label for="clave">Clave</label>
        <input type="password" id="clave" name="clave">
    </div>
    <div class="field">
        <label for="clave_repetir">Repetir clave</label>
        <input type="password" id="clave_repetir" name="clave_repetir">
    </div>
    <div class="field">
        <label for="terminos">
            <input type="checkbox" id="terminos" name="terminos">Acepta los terminos y condiciones.
        </label>

    </div>
    <input type="submit" value="Registrarce">

</form>
