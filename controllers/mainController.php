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
    $datos['conectado'] = 1;
    $datos['sala'] = 1;
    $datos['ultimaConexion'] = 0;
    $_SESSION['user'] = new User($datos);
}
else if (isset($_SESSION['user']))
{
    userRepository::cambiarConectado($_SESSION['user']->getId());
}

if (isset($_GET['login']))
{
    require_once('controllers/loginController.php');
    die();
}


// añadimos un nuevo mensaje en la base de datos
if (isset($_POST['publicar']))
{
    require_once('controllers/interactuarController.php');
    die();
}




// crea una nueva sala
if (isset($_GET['addSala']))
{
    require_once('controllers/newSalaController.php');
    die();
}


if (isset($_GET['sala']))
{
    $sala = $_GET['sala'];
    userRepository::ultimaConexion($_SESSION['user']->getId()); //Recargar tambien actualiza la conexion
}
else
    $sala = 1;

userRepository::updateSala($sala);
$idsala = SalaRepository::getSalaById($sala);
$mensajes = SalaRepository::getMensajesSalas($sala);
$salas = SalaRepository::getSalas();
$online = userRepository::getUserOnline($sala);


require_once("views/mainView.phtml");
?>