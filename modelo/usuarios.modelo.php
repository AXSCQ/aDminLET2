<?php 

require_once "conexion.php";

class mdlUsuarios {

    // Método para mostrar un usuario específico
    static public function mdlMostrarUsuariosl($tabla, $item, $valor) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Método para eliminar usuarios
    static public function mdlEliminarUsuarios($tabla, $id) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo();
        }
    }

    // Método para editar usuarios
    static public function mdlEditarUsuarios($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :USUARIO, password = :PASSWORD, nombre = :NOMBRE, foto = :FOTO, rol = :ROL WHERE id = :ID");
        $stmt->bindParam(":ID", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":USUARIO", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSWORD", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMBRE", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":FOTO", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL", $datos["rol"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo();
        }
    }

    // Método para mostrar un usuario basado en un criterio específico
    static public function MdlMostrarUsuarios1($tabla, $item, $valor) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Método para mostrar todos los usuarios
    static public function mdlMostrarUsuarios($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para guardar usuarios en la base de datos
    static public function mdlGuardarUsuarios($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, nombre, foto, rol) VALUES (:USUARIO, :PASSWORD, :NOMBRE, :FOTO, :ROL)");
        $stmt->bindParam(":USUARIO", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSWORD", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMBRE", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":FOTO", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL", $datos["rol"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo();
        }
    }
}
