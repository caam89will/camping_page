<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {

    // 1. Validar y sanitizar el email
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // 2. Preparar una consulta para verificar si el email ya existe
        $sql_check = "SELECT id FROM usuarios WHERE email = ?";
        
        if ($stmt_check = $mysqli->prepare($sql_check)) {
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();
            
            if ($stmt_check->num_rows == 0) {
                // 3. El email no existe, proceder con la inserción
                $sql_insert = "INSERT INTO usuarios (email) VALUES (?)";
                if ($stmt_insert = $mysqli->prepare($sql_insert)) {
                    $stmt_insert->bind_param("s", $email);
                    if ($stmt_insert->execute()) {
                        $_SESSION['message'] = "¡Gracias por suscribirte! Recibirás nuestras mejores ofertas.";
                        $_SESSION['message_type'] = "success";
                    } else {
                        $_SESSION['message'] = "Algo salió mal. Por favor, inténtalo de nuevo.";
                        $_SESSION['message_type'] = "danger";
                    }
                    $stmt_insert->close();
                }
            } else {
                // El email ya está registrado
                $_SESSION['message'] = "Este correo electrónico ya está registrado. ¡Gracias!";
                $_SESSION['message_type'] = "info";
            }
            $stmt_check->close();
        }
    } else {
        $_SESSION['message'] = "Por favor, introduce una dirección de correo válida.";
        $_SESSION['message_type'] = "warning";
    }
    $mysqli->close();
}
// 4. Redirigir de vuelta a la página desde la que se envió el formulario
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>