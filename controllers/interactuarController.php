<?php

// añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar']))
{
    if (!empty($_POST['mensaje']))
    {
        MensajesRepository::addMensaje($_POST['mensaje']);
        header("location:index.php");
    }
}
if (isset($_POST['crearSala']))
{
    if (!empty($_POST['mensaje']))
    {
        SalaRepository::setSala($_SESSION['user']->getId(), $_POST['mensaje']);
        $sala = SalaRepository::getSala($_SESSION['user']->getId(), $_POST['mensaje']);
        header('location: index.php?sala=' . $sala->getId());
    }
}

?>