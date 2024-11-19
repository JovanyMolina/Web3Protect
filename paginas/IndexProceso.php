<?php
session_start(); 

require_once '../Conexion/ConnecionMySql.php';
$conn = new ConnectionMySQL();
$conn->CreateConnection();

$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

$usuario = $conn->EscapeString($usuario);

$sql = "SELECT * FROM sudo WHERE Usuario = ?";
$stmt = $conn->PrepareStatement($sql);

if ($stmt) {
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($contrasena, $user['password'])) {
            $_SESSION['usuario'] = $usuario; 
            header("Location: ../panel.php");
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='../index.html ';</script>";
        }
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='../index.html';</script>";
    }

    $conn->SetFreeResult($result);
} else {
    echo "Error en la consulta.";
}

$conn->CloseConnection();
?>