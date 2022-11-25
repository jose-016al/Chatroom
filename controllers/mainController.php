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


    // añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar'])) {
    require_once('controllers/interactuarController.php');
    die();
}




// crea una nueva sala
if (isset($_GET['addSala'])) {
    require_once('controllers/salaController.php');
}

if(isset($_GET['sala'])){
    $idsala= SalaRepository::getSalaById($_GET['sala']);
    $mensajes = SalaRepository::getMensajesSalas($_GET['sala']);
}else{
    $mensajes = SalaRepository::getMensajesSalas(1);
}


$salas = SalaRepository::getSalas();
$online = userRepository::getUserOnline();

require_once("views/mainView.phtml");
?>