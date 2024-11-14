<?php
require_once '../Conexion/ConnecionMySql.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new ConnectionMySQL();
    $db->CreateConnection(); 
    
    $usuario = $db->EscapeString($_POST['usuario']);
    $password = $db->EscapeString($_POST['password']);

    $checkUserSql = "SELECT * FROM sudo WHERE Usuario = '$usuario'";
    $result = $db->ExecuteQuery($checkUserSql);

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('El usuario ya está ocupado por alguien más.'); window.location.href = '../RegistrarAdmin.php';</script>";
        $db->SetFreeResult($result); 
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO sudo (Usuario, password) VALUES ('$usuario', '$hashed_password')";

        if ($db->ExecuteQuery($sql)) {
            echo "<script>alert('Administrador registrado exitosamente.'); window.location.href = '../RegistrarAdmin.php';</script>";
        } else {
            echo "<script>alert('Error al registrar el administrador.'); window.location.href = '../RegistrarAdmin.php';</script>";
        }
    }

    $db->CloseConnection();
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.location.href = '../RegistrarAdmin.php';</script>";
}
?>
