<?php

    //cargamos el modelo
require_once("models/Usermodel.php");
require_once("models/UserRepository.php");
require_once("models/Mensajesmodel.php");
require_once("models/MensajesRepository.php");

session_start();

    // Login y registro
if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['user'] = "";
    $datos['rol'] = 1;
    $_SESSION['user'] = new User($datos);
}
if (isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

$mensajes = MensajesRepository::getMensajes();

    // añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar'])) {
    MensajesRepository::addMensaje($_POST['mensaje']);
    
    header("location:index.php");
}

if (isset($_SESSION['user'])) {
    userRepository::cambiarConectado($_SESSION['user']->getId());
}

$online = userRepository::getUserOnline();

    // cargar la vista
require_once("views/mainView.phtml");
?>