<?php

// añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar']))
{
    if (!empty($_POST['mensaje']))
    {
        if(isset($_GET['sala'])){
            MensajesRepository::addMensaje($_POST['mensaje'], $_GET['sala']);
            echo $_GET['sala'];
            // header('location: index.php?sala='.$_GET['sala']);
        }else{
            echo $_GET['sala'];

            MensajesRepository::addMensaje($_POST['mensaje'], 1);
            // header('location: index.php');
        }
        userRepository::ultimaConexion($_SESSION['user']->getId());
    }
}
?>