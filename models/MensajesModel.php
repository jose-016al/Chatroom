<?php

class Mensajes {

    private $id;
    private $user;
    private $mensaje;
    private $imagen;
    private $fecha;
    private $mostrar;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> user = userRepository::getUserById($datos['user']);
        $this -> mensaje = $datos['mensaje'];
        $this -> imagen = $datos['imagen'];
        $this -> fecha = $datos['fecha'];
        $this -> mostrar = $datos['mostrar'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getUser() {
        return $this -> user;
    }

    public function getMensaje() {
        return $this -> mensaje;
    }

    public function getImagen() {
        return $this -> imagen;
    }

    public function getFecha() {
        return $this -> fecha;
    }

    public function getMostrar() {
        return $this -> mostrar;
    }

} 

?>