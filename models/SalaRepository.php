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
        $result = $db -> query("INSERT INTO salas(user, name, descripcion) VALUES ($user, $name, $descripcion);");
        return $result; 
    }

}

?>