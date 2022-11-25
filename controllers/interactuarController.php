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
?>