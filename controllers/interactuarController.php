<?php

// añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar']))
{
    if (!empty($_POST['mensaje']))
    {
        if (isset($_GET['sala']))
        {
            MensajesRepository::addMensaje($_POST['mensaje'], $_GET['sala']);
            userRepository::ultimaConexion($_SESSION['user']->getId());

            header('location: index.php?sala=' . $_GET['sala']);
        }
        else
        {
            MensajesRepository::addMensaje($_POST['mensaje'], 1);
            userRepository::ultimaConexion($_SESSION['user']->getId());

            header('location: index.php');
        }
    }
}
?>