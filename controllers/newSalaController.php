<?php

if (isset($_POST['addSala']))
{
    if (!empty($_POST['name']))
    {
        userRepository::ultimaConexion($_SESSION['user']->getId());
        SalaRepository::addSala($_POST['name'], $_POST['descripcion']);
        header('location: index.php?sala=' . SalaRepository::getSalaByName($_POST['name']));
    }
}
require_once("views/newSalaView.phtml");
die();

?>