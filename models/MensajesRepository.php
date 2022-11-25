<?php

class MensajesRepository {

        // Devuelve un array con los mensajes que no esten ocultos
    public static function getMensajes() {
        $mensajes = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM mensajes WHERE mostrar = 1 AND sala = 1");
        while ($datos = $result -> fetch_assoc()) {
            $mensajes[] = new Mensajes($datos);
        }
        return $mensajes;
    }


        // añadimos un nuevo mensaje a la base de datos
    public static function addMensaje($mensaje, $sala) {
        $db=Conectar::conexion();
        $user = $_SESSION['user']->getId();
        $result = $db -> query("INSERT INTO mensajes(user, mensaje, fecha, mostrar, sala) VALUES ($user, '$mensaje', NOW(), 1, ".$sala.");");
        return $result;
    }

}

?>