<?php 
require_once '../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();
$id = $_GET['id'];

// Ejecuta la consulta y verifica si tuvo éxito
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$result = $conn->ExecuteQuery($sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("<p>Error: No se encontró el usuario con el ID especificado o hubo un problema con la consulta.</p>");
}
?>

<form action="EditarUsuario.php" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?>">

    <label for="Nombre">Nombre:</label>
    <input type="text" id="Nombre" name="Nombre" value="<?php echo isset($row['Nombre']) ? htmlspecialchars($row['Nombre']) : ''; ?>" required>

    <label for="Apellidos">Apellidos:</label>
    <input type="text" id="Apellidos" name="Apellidos" value="<?php echo isset($row['Apellidos']) ? htmlspecialchars($row['Apellidos']) : ''; ?>" required>

    <label for="Telefono">Teléfono:</label>
    <input type="text" id="Telefono" name="Telefono" value="<?php echo isset($row['Telefono']) ? htmlspecialchars($row['Telefono']) : ''; ?>" required>

    <label for="CedulaProf">Cédula Profesional:</label>
    <input type="text" id="CedulaProf" name="CedulaProf" value="<?php echo isset($row['CedulaProf']) ? htmlspecialchars($row['CedulaProf']) : ''; ?>" required>

    <label for="Maestria">Maestría:</label>
    <input type="text" id="Maestria" name="Maestría" value="<?php echo isset($row['Maestría']) ? htmlspecialchars($row['Maestría']) : ''; ?>" required>

    <button type="submit">Actualizar</button>
</form>

