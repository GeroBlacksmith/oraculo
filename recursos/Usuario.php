<?php
require 'Query.php';
class Usuario implements Query
{
    private $id_usuario;
    private $id_rol;
    private $nombre;
    private $cuenta;
    private $email;
    private $clave;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->id_rol;
    }

    /**
     * @param mixed $id_rol
     */
    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
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
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param mixed $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    function __construct()
    {
        $this->id_usuario;
        $this->id_rol;
        $this->nombre;
        $this->cuenta;
        $this->email;
        $this->clave;
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function insertar($dato)
    {

        $sql = "INSERT INTO usuarios(idRol, nombre,cuenta, correo, clave)  VALUES(";
        //$sql.="\"";
        $sql .= $this->getIdRol();
        //$sql.="\",";
        $sql .= ", ";
        $sql .= "\"";
        $sql .= $this->getNombre();
        $sql .= "\",";
        $sql .= "\"";
        $sql .= $this->getCuenta();
        $sql .= "\",";
        $sql .= "\"";
        $sql .= $this->getEmail();
        $sql .= "\",";
        $sql .= "\"";
        $sql .= $this->getClave();
        $sql .= "\");";
        return $sql;
    }

    public function obtener($dato)
    {
        // TODO: Implement obtener() method.
    }

    public function actualizar($dato)
    {
        // TODO: Implement actualizar() method.
    }

    public function borrar($dato)
    {
        // TODO: Implement borrar() method.
    }
}