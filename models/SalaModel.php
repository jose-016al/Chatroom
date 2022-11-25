<?php

class Sala {

    private $id;
    private $user;
    private $name;
    private $descripcion;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['name'];
        $this -> descripcion = $datos['descripcion'];
        $this -> user = $datos['user'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getUser() {
        return $this -> user;
    }

} 

?>