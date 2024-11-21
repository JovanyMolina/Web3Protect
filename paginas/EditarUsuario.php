<?php
require_once '../Conexion/auth2.php';
require_once '../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$id = $_POST['id'];
$nombre = $conn->EscapeString($_POST['Nombre']);
$apellidos = $conn->EscapeString($_POST['Apellidos']);
$telefono = $conn->EscapeString($_POST['Telefono']);
$cedulaProf = $conn->EscapeString($_POST['CedulaProf']);
$maestria = $conn->EscapeString($_POST['Maestría']);

$sql = "UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos', Telefono='$telefono', CedulaProf='$cedulaProf', Maestría='$maestria' WHERE id='$id'";

if ($conn->ExecuteQuery($sql)) {
    echo "<script>alert('Usuario actualizado exitosamente.'); window.location.href = '../panel.php';</script>";
} else {
    echo "<script>alert('Error al actualizar el usuario.'); window.location.href = '../RegistrarUsuario.php';</script>";
}

$conn->CloseConnection();

?>
