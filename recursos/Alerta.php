<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 31/10/2016
 * Time: 06:24 PM
 */
include 'Query.php';
class Alerta implements Query
{
    private $nombre;
    private $temperatura;
    private $humedad;
    private $viento;
    private $presion;
    public function __construct(){

    }
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * @param mixed $temperatura
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;
    }

    /**
     * @return mixed
     */
    public function getHumedad()
    {
        return $this->humedad;
    }

    /**
     * @param mixed $humedad
     */
    public function setHumedad($humedad)
    {
        $this->humedad = $humedad;
    }

    /**
     * @return mixed
     */
    public function getViento()
    {
        return $this->viento;
    }

    /**
     * @param mixed $viento
     */
    public function setViento($viento)
    {
        $this->viento = $viento;
    }

    /**
     * @return mixed
     */
    public function getPresion()
    {
        return $this->presion;
    }

    /**
     * @param mixed $presion
     */
    public function setPresion($presion)
    {
        $this->presion = $presion;
    }

    public function insertar($dato){
        return;
    }
    public function obtener($dato){
        return;
    }
    public function actualizar($dato){
        return;
    }
    public function borrar($dato){
        return;
    }
}