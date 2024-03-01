<?php 

class ctrUsuarios {

    static public function ctrIngresoUsuarios() {
        if (isset($_POST["log_user"], $_POST["log_pass"])) {
            $encriptarPass = crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $tabla = "usuarios";
            $item = "usuario";
            $valor = $_POST["log_user"];

            $respuesta = mdlUsuarios::mdlMostrarUsuariosl($tabla, $item, $valor);

            // Verificamos que la respuesta no sea false y que las claves 'usuario' y 'password' existan en el array $respuesta
            if ($respuesta !== false && isset($respuesta["usuario"], $respuesta["password"]) && 
                $respuesta["usuario"] == $valor && $respuesta["password"] == $encriptarPass) {
                $_SESSION["validarSession"] = "ok";
                $_SESSION["idBackend"] = $respuesta["id"];

                echo '<script>window.location = "usuarios";</script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
            }
        }
    }

    // Continúa el resto de los métodos sin cambios...

    // Método para eliminar usuarios
    static public function ctrEliminarUsuarios($id, $rutafoto) {
        // ... código para eliminar usuarios
    }

    // Método para mostrar un usuario específico
    static public function ctrMostrarUsuarios1($item, $valor) {
        // ... código para mostrar un usuario específico
    }

    // Método para mostrar todos los usuarios
    static public function ctrMostrarUsuarios() {
        // ... código para mostrar todos los usuarios
    }

    // Método para editar usuarios
    static public function ctrEditarusuarios() {
        // ... código para editar usuarios
    }

    // Método para guardar usuarios
    static public function ctrGuardarusuarios() {
        // ... código para guardar usuarios
    }

}

?>
