<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Zona
{
    private $id_zona;
    private $descripcion;
    private $longitud;
    private $latitud;

    /**
     * @return mixed
     */
    public function getIdZona()
    {
        return $this->id_zona;
    }

    /**
     * @param mixed $id_zona
     */
    public function setIdZona($id_zona)
    {
        $this->id_zona = $id_zona;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    function __construct()
    {

    }
    function insertar(){

    }
    function actualizar(){

    }
    function borrar(){

    }
    function mostrar(){

    }
}