<?php

include_once 'PDOConfig.php';

/**
 * Clase Login
 * Abstrae el manejo de sesiones y validación de usuario.
 *
 */
class Login {

    /**
     * Referencia a Base de Datos
     *
     * @var PDOConfig
     */
    private $BASEDATOS;

    /**
     * Variable para guardar los mensajes de error
     *
     * @var unknown_type
     */
    private $ERROR;

    public function __construct() {
        if (!session_start()) {
            $this->ERROR = 'No se puede iniciar la sesion';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Inicia una nueva sesion de usuario si el usuario y el Clave son correctos
     *
     * @param string $nombreUsuario
     * @param string $Clave
     */
    public function iniciar($nombreUsuario, $Clave) {
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['Clave'] = md5($Clave);
        $_SESSION['activa'] = false;
    }

    /**
     * Valida que hay una sesion iniciada y es correcta
     *
     */
    public function validar() {
        if (isset($_SESSION['nombreUsuario'])) {
            $nombreUsuario = $_SESSION['nombreUsuario'];
        } else {
            $this->ERROR = 'no esta seteado el nombre de usuario';
            return false;
        }
        if (isset($_SESSION['Clave'])) {
            $Clave = $_SESSION['Clave'];
        } else {
            $this->ERROR = 'no esta seteada la clave';
            return false;
        }
        try {
            $this->BASEDATOS = new PDOConfig();
            /**
             * comentar esta linea para ver ejemplo inyección de código sql.
             */
            $nombreUsuario = $this->BASEDATOS->filtrar($nombreUsuario);
            $sql = "select * from Usuario, Rol
                where Usuario.idRol=Rol.idRol and Usuario='$nombreUsuario'";
            if (!$resultado = $this->BASEDATOS->query($sql)) {
                $this->ERROR = 'Error Consulta Base de datos';
                return false;
            } else {
                if (!($row = $resultado->fetch(PDO::FETCH_ASSOC))) {
                    $this->ERROR = 'Usuario erroneo';
                    return false;
                } else {
                    if ($row['Contrasenia'] != $Clave) {
                        $this->ERROR = 'Clave erronea';
                        return false;
                    } else {
                        $_SESSION['activa'] = true;
                        $_SESSION['Descripcion'] = $row['Descripcion'];
                        $_SESSION['Rol'] = $row['idRol'];
                        $_SESSION['idUsuario'] = $row['idUsuario'];
                        $_SESSION['Usuario'] = $row['Usuario'];
                        $_SESSION['Tiempo'] = time();
                        $_SESSION['Perfil'] = $row['foto_perfil'];
                        if ($row['Descripcion'] == 'Doctor') {
                            $this->datosDoctor($row['idUsuario']);
                        } elseif($row['Descripcion'] == 'Secretaria') {
                            $this->datosSecre($row['idUsuario']);
                        }
                        else{
                            echo $this->ERROR = 'No estoy';
                        }

                        return true;
                    }
                }
            }
        } catch (Exception $e) {
            $this->ERROR = 'Error de Base de Datos ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Devuelve el verdadero si hay una sesión activa y falso en caso contrario
     * 
     * @return boolean activa y false si no está activa o no se encuetra seteado
     */
    public function activa() {
        if (isset($_SESSION['activa'])) {
            return $_SESSION['activa'];
        } else {
            $this->ERROR = 'No tiene sesión activa';
            return false;
        }
    }

    /**
     * Cierra la session actual
     *
     * @return boolean
     */
    public function cerrar() {
        if (!session_destroy()) {
            $this->ERROR = 'No se puede cerrar la sesion';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Devuelve el mensaje de error
     *
     * @return string
     */
    public function getError() {
        return $this->ERROR;
    }

    /**
     * Devuelve el nombre de usuario de la sesión
     * 
     * @return string Nombre de usuario y false si no está activa o no se encuetra seteado
     */
    public function getNombreUsuario() {
        if ($this->activa()) {
            if (isset($_SESSION['nombreUsuario'])) {
                return $_SESSION['nombreUsuario'];
            } else {
                $this->ERROR = 'No está seteado el nombre de usuario';
                return false;
            }
        } else {
            $this->ERROR = 'No tiene una sección activa';
            return false;
        }
    }

    /**
     * Devuelve el Rol asignado al usuario de la sesión
     * 
     * @return string Rol y false si no está activa o no se encuetra seteado
     */
    public function getRol() {
        if ($this->activa()) {
            if (isset($_SESSION['Rol'])) {
                return $_SESSION['Rol'];
            } else {
                $this->ERROR = 'No está seteado el Rol';
                return false;
            }
        } else {
            $this->ERROR = 'No tiene una sección activa';
            return false;
        }
    }

    private function datosDoctor($idUsuario) {
        $sql = "Select d.*, e.Descripcion from Doctor d, Especialidad e where idDoctor = " .$idUsuario . " AND d.idEspecialidad = e.idEspecialidad";
        if (!$resultado = $this->BASEDATOS->query($sql)) {
            $this->ERROR = 'Error Consulta Base de datos';
            return false;
        } else {
            if (!($row = $resultado->fetch(PDO::FETCH_ASSOC))) {
                $this->ERROR = 'No tienes datos';
                return false;
            } else {
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['Apellido'] = $row['Apellido'];
                $_SESSION['Direccion'] = $row['Direccion'];
                $_SESSION['DNI'] = $row['DNI'];
                $_SESSION['Matricula'] = $row['Matricula'];
                $_SESSION['Especialidad'] = $row['Descripcion'];
                $_SESSION['Sueldo'] = $row['Sueldo'];
            }
        }
    }
    private function datosSecre($idUsuario) {
        $this->BASEDATOS = new PDOConfig();
        $sql = "Select * from Secretaria where idSecre = " . $idUsuario;
        if (!$resultado = $this->BASEDATOS->query($sql)) {
            $this->ERROR = 'Error Consulta Base de datos';
            return false;
        } else {
            if (!($row = $resultado->fetch(PDO::FETCH_ASSOC))) {
                $this->ERROR = 'No tienes datos';
                return false;
            } else {
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['Apellido'] = $row['Apellido'];
                $_SESSION['Direccion'] = $row['Direccion'];
                $_SESSION['DNI'] = $row['DNI'];
                $_SESSION['CUIL'] = $row['CUIL'];
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Telefono'] = $row['Telefono'];
            }
        }
    }

    public function getIdUsuario() {
        if ($this->activa()) {
            if (isset($_SESSION['idUsuario'])) {
                return $_SESSION['idUsuario'];
            } else {
                $this->ERROR = 'No está seteado el id';
                return false;
            }
        } else {
            $this->ERROR = 'No tiene una sección activa';
            return false;
        }
    }

    public function getTime() {
        if ($this->activa()) {
            if (isset($_SESSION['Tiempo'])) {
                return $_SESSION['Tiempo'];
            } else {
                $this->ERROR = 'No está seteado el Tiempo';
                return false;
            }
        } else {
            $this->ERROR = 'No tiene una sección activa';
            return false;
        }
    }

    public function getDescripcion() {
        if ($this->activa()) {
            if (isset($_SESSION['Descripcion'])) {
                return $_SESSION['Descripcion'];
            } else {
                $this->ERROR = 'No está seteado la de descripcion';
                return false;
            }
        } else {
            $this->ERROR = 'No tiene una sección activa';
            return false;
        }
    }

}

?>