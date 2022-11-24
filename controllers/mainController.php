<?php

    //cargamos el modelo
require_once("models/Usermodel.php");
require_once("models/UserRepository.php");
require_once("models/Mensajesmodel.php");
require_once("models/MensajesRepository.php");
require_once("models/Salamodel.php");
require_once("models/SalaRepository.php");

session_start();

    // Login y registro
if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['user'] = "";
    $datos['rol'] = 1;
    $datos['conectado']=1;
    $datos['ultimaConexion']=0;
    $_SESSION['user'] = new User($datos);
}else if (isset($_SESSION['user']))
{
    userRepository::cambiarConectado($_SESSION['user']->getId());
}

if (isset($_GET['login']))
{
    require_once('controllers/loginController.php');
    die();
}

$mensajes = MensajesRepository::getMensajes();

    // añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar'])) {
    MensajesRepository::addMensaje($_POST['mensaje']);
    header("location:index.php");
}



$online = userRepository::getUserOnline();

    // crea una nueva sala
if (isset($_GET['addSala'])) {
    require_once('controllers/salaController.php');
}

$salas = SalaRepository::getSalas();

    // cargar la vista
require_once("views/mainView.phtml");
?>