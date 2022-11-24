<?php
//cargamos el modelo
require_once("models/UserModel.php");
require_once("models/UserRepository.php");
require_once("models/MensajesModel.php");
require_once("models/MensajesRepository.php");
require_once("models/SalaModel.php");
require_once("models/SalaRepository.php");

session_start();
// Login y registro
if (!isset($_SESSION['user']))
{
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


if (isset($_GET['interactuar']))
{
    require_once('controllers/interactuarController.php');
    die();
}



$online = userRepository::getUserOnline();

// cargar la vista
require_once("views/mainView.phtml");
?>