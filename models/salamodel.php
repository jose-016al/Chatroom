<?php

class tabla {

    private $id;
    private $mensaje;
    private $name;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> mensaje = $datos['mensaje'];
        $this -> name = $datos['name'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function getRol() {
        return $this -> rol;
    }

} 

?>