<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión activa, redirige al inicio de sesión
    header("Location: index.html");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>
