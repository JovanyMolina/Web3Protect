<?php 
require_once '../Conexion/auth2.php';
require_once '../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();
$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";


if ($conn->ExecuteQuery($sql)) {
    echo "<script>alert('Usuario actualizado exitosamente.'); window.location.href = '../panel.php';</script>";
} else {
    echo "<script>alert('Error al actualizar el usuario.'); window.location.href = '../RegistrarUsuario.php';</script>";
} 

$conn->CloseConnection();
?>