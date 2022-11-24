<?php
class SalaRepository
{

    public static function setSala($user, $name)
    {
        $db = Conectar::conexion();
        $resultado = $db->query("INSERT INTO salas (user, name) VALUES('" . $user . "', " . $name . ")");
    }

    public static function getSala($user, $name)
    {
        $db = Conectar::conexion();
        $resultado = $db->query("SELECT * FROM salas WHERE user='" . $user . "' and name='" . $name . "'");
        if ($datos = $resultado->fetch_assoc())
        {
            return new Sala($datos);
        }
    }

}

?>