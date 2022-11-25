<?php

class SalaRepository {

        // Devuelve un array con las salas
    public static function getSalas() {
        $salas = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM salas");
        while ($datos = $result -> fetch_assoc()) {
            $salas[] = new Sala($datos);
        }
        return $salas;
    }

        // creacion de una nueva sala
    public static function addSala($user, $name, $descripcion) {
        $db=Conectar::conexion();
        $result = $db -> query("INSERT INTO `salas` (`id`, `user`, `name`, `descripcion`) VALUES (NULL, '".$user."', '".$name."', '".$descripcion."');");
        return $result; 
    }
    
    public static function getMensajesSalas($id_sala) {
        $mensajes = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM mensajes WHERE mostrar = 1 AND sala = $id_sala");
        while ($datos = $result -> fetch_assoc()) {
            $mensajes[] = new Mensajes($datos);
        }
        return $mensajes;
    }
}

?>