<?php

if(isset($_POST['addSala'])){
    if(!empty($_POST['name'])){
        SalaRepository::addSala($_SESSION['user']->getId(), $_POST['name'], $_POST['descripcion']);
        
    }
}
require_once("views/newSalaView.phtml");
die();

?>