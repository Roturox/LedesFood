<?php
session_start();
    //conexion con DB
    include("db.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        // Preparar la instrucción SQL para seleccionar el usuario
        $stmt = $conectar->prepare("SELECT id, contraseña FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el usuario existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($contraseña, $hashed_password)) {
                // Iniciar la sesión del usuario
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario'] = $usuario;
                header("Location: ../index.php"); // Redirigir a la página de inicio o panel de usuario
                exit();
            } else {
                // Contraseña incorrecta
                $error_message = "Contraseña incorrecta.";
                header("Location: ../template/login.php?error=" . urlencode($error_message));
                exit();
            }
        } else {
            // Usuario no encontrado
            $error_message = "Usuario no encontrado.";
            header("Location: ../template/login.php?error=" . urlencode($error_message));
            exit();
        }

        $stmt->close();
    } else {
        $error_message = "Por favor, completa todos los campos del formulario.";
        header("Location: ../template/login.php?error=" . urlencode($error_message));
        exit();
    }
}

$conn->close();
?>