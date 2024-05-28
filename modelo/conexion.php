<?php
class Conexion {
    public static function conectar() {
        $link = new PDO("mysql:host=localhost;dbname=mi_base_datos", "root", "");
        $link->exec("set names utf8");
        return $link;
    }
}
?>
