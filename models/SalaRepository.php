<?php

class SalaRepository
{

    // Devuelve un array con las salas
    public static function getSalas()
    {
        $salas = [];
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM salas");
        while ($datos = $result->fetch_assoc())
        {
            $salas[] = new Sala($datos);
        }
        return $salas;
    }

    public static function getSalaById($id_sala)
    {
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM salas WHERE id = '" . $id_sala . "'");
        if ($datos = $result->fetch_assoc())
        {
            return new Sala($datos);
        }
    }
    public static function getSalaByName($name)
    {
        $db = Conectar::conexion();
        $result = $db->query("SELECT id FROM salas WHERE name = '" . $name . "'");
        return intval($result->fetch_column());
    }

    // creacion de una nueva sala
    public static function addSala($name, $descripcion)
    {
        $db = Conectar::conexion();
        $result = $db->query("INSERT INTO `salas` (`name`, `descripcion`) VALUES ('" . $name . "', '" . $descripcion . "');");
        return $result;
    }

    public static function getMensajesSalas($id_sala)
    {
        $mensajes = [];
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM mensajes WHERE mostrar = 1 AND sala = $id_sala");
        while ($datos = $result->fetch_assoc())
        {
            $mensajes[] = new Mensajes($datos);
        }
        return $mensajes;
    }
}

?>