<?php

class userRepository {

        // Funcion para hacer el login
    public static function login($user, $password) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE user = '$user' AND password = '$password';");
        if ($datos = $result -> fetch_assoc()) {
            return new User($datos);
        }
    }

        // Funcion que comprueba si ya existe el user en la BD
    public static function comprobarUsuarioDuplicado($user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT user FROM users WHERE user = '$user';");
        return $result -> num_rows;
    }

        // Funcion para registrar un user en la BD
    public static function registro($user, $password) {
        $db = Conectar::conexion();
        $result = $db -> query("INSERT INTO users(user, password, rol) VALUES ('$user', md5('$password'), 1)");
    }

        // Devuelve un array con los usuarios que no son admin
    public static function getUsuarios() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE rol = 1");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

        // Devuelve un array con los usuarios con rol admin
    public static function getUsuariosAdmin() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE rol = 0");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

        // Devuelve un usuario concreto segun la id que se pasa por parametro
    public static function getUserById($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE id = '".$id_user."'");
        if ($datos = $result -> fetch_assoc()) {
            return new User($datos);
        }
    }

        // Actualiza el rol del user admin para dejarlo sin permisos de admin
    public static function quitarAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET rol = 1 WHERE id = '".$id_user."'");
        return $result;
    }

        // Actualizamos el rol del user añadiendolo a los administradores
    public static function addAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET rol = 0 WHERE id = '".$id_user."'");
        return $result;
    }

    public static function getUserOnline() {
        $online = [];
        $db = Conectar::conexion();
        $user = $_SESSION['user']->getId();
        $result = $db -> query("SELECT * FROM users WHERE conectado = 1");
        while ($datos = $result -> fetch_assoc()) {
            $online[] = new User($datos);
        }
        return $online;
    }

    public static function cambiarConectado($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET conectado = 1 WHERE id = '".$id_user."'");
        return $result;
    }

    public static function quitarConectado($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET conectado = 0 WHERE id = '".$id_user."'");
        return $result;
    }

}

?>