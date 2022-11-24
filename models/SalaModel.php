<?php

class Sala
{

    private $id;
    private $user;
    private $name;

    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->user = $datos['user'];
        $this->name = $datos['name'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

}

?>