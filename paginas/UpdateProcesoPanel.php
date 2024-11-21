<?php
require_once '../Conexion/auth2.php';
require_once '../Conexion/ConnecionMySql.php';
$id = $_GET['id'];

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->PrepareStatement($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $telefono = $_POST['Telefono'];
    $cedula_profesional = $_POST['CedulaProf'];
    $maestria = $_POST['Maestría'];

    $sql = "UPDATE usuarios SET Nombre=?, Apellidos=?, Telefono=?, CedulaProf=?, Maestría=? WHERE id=?";
    $stmt = $conn->PrepareStatement($sql);
    $stmt->bind_param("sssssi", $nombre, $apellidos, $telefono, $cedula_profesional, $maestria, $id);
    $stmt->execute();

    header("Location: panel.php"); 
}
 
$conn->CloseConnection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required>
        <input type="text" name="apellidos" value="<?php echo htmlspecialchars($user['apellidos']); ?>" required>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($user['telefono']); ?>" required>
        <input type="text" name="cedula_profesional" value="<?php echo htmlspecialchars($user['cedula_profesional']); ?>" required>
        <input type="text" name="maestria" value="<?php echo htmlspecialchars($user['maestria']); ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
