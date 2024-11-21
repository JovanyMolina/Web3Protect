<?php 
require_once '../Conexion/auth2.php';
require_once '../Conexion/ConnecionMySql.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new ConnectionMySQL();
    $db->CreateConnection();

    $nombre = $db->EscapeString($_POST['nombre']);
    $apellidos = $db->EscapeString($_POST['apellido']);
    $telefono = $db->EscapeString($_POST['telefono']);
    $cedulaProf = $db->EscapeString($_POST['cedulaProfesional']);
    $maestria = $db->EscapeString($_POST['maestria']);

    $sql = "INSERT INTO usuarios (Nombre, Apellidos, Telefono, CedulaProf, Maestría) VALUES ('$nombre', '$apellidos', '$telefono', '$cedulaProf', '$maestria')";

    if($db->ExecuteQuery($sql)) {
        echo "<script>alert('Usuario registrado exitosamente.'); window.location.href = '../panel.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el usuario.'); window.location.href = '../RegistrarUsuario.php';</script>";
    }

    $db->CloseConnection();
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.location.href = '../RegistrarUsuario.php';</script>";
}





?>

