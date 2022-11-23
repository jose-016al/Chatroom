<?php
public static function getUserBymensaje($mensaje) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM mensajes WHERE  = '".$id_user."'");
        if ($datos = $result -> fetch_assoc()) {
            return new User($datos);
        }
    }
?>