<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 31/10/2016
 * Time: 07:19 PM
 */
interface Query
{
    public function insertar($dato);
    public function obtener($dato);
    public function actualizar($dato);
    public function borrar($dato);
}