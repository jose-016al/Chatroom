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
    
    public function getMensaje() {
        return $this -> mensaje;
    }

    public function getName() {
        return $this -> name;
    }

} 

?>