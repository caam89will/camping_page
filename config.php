<?php
// Iniciar la sesión para poder pasar mensajes entre páginas.
session_start();

// --- Configuración de la Base de Datos ---
define('DB_SERVER', 'localhost'); // O el servidor que te dé tu hosting
define('DB_USERNAME', 'tu_usuario_db'); // Reemplaza con tu usuario
define('DB_PASSWORD', 'tu_contraseña_db'); // Reemplaza con tu contraseña
define('DB_NAME', 'tu_nombre_db'); // Reemplaza con el nombre de tu DB

// --- Intentar conectar a la Base de Datos ---
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if($mysqli === false){
    die("ERROR: No se pudo conectar. " . $mysqli->connect_error);
}
?>