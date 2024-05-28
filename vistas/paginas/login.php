<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Autenticar al usuario
    $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password");
    $stmt->bindParam(":usuario", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();

    $usuario = $stmt->fetch();

    if ($usuario) {
        $_SESSION["validarSession"] = "ok";
        $_SESSION["idBackend"] = $usuario["id"];
        header("Location: index.php?pagina=usuarios");
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <div class="login-box">
        <form method="post">
            <div class="form-group">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
