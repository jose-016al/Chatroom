<?php
class SalaRepository{

    public static function addsala() {
        $sala = [];
        $db = Conectar::conecxion();
        $result = $db -> query("SELECT * FROM sala WHERE mostrar = 1 AND sala = '.$id_sala.' ");
        while ($datos = $result -> fetch_assoc()) {
            $salas[] = new Salas($datos);
        }
        return $salas;
    }


}

?>