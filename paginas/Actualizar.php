<?php 
require_once '../Conexion/auth2.php';
require_once '../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();
$id = $_GET['id'];


$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$result = $conn->ExecuteQuery($sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("<p>Error: No se encontró el usuario con el ID especificado o hubo un problema con la consulta.</p>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../Estilos/EstilosActualizar.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <form action="EditarUsuario.php" method="POST">
        <div class="titulo">
            <h2>Editar Usuario</h2>
            <i class='bx bx-edit-alt'></i>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?>">

        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo isset($row['Nombre']) ? htmlspecialchars($row['Nombre']) : ''; ?>" required minlength="2"
                maxlength="50"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                title="Solo se permiten letras y espacios.">

        <label for="Apellidos">Apellidos:</label>
        <input type="text" id="Apellidos" name="Apellidos" value="<?php echo isset($row['Apellidos']) ? htmlspecialchars($row['Apellidos']) : ''; ?>" required minlength="2"
                maxlength="50"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                title="Solo se permiten letras y espacios.">

        <label for="Telefono">Teléfono:</label>
        <input type="text" id="Telefono" name="Telefono" value="<?php echo isset($row['Telefono']) ? htmlspecialchars($row['Telefono']) : ''; ?>" required pattern="[0-9]{10}"
                maxlength="10"
                title="Debe contener exactamente 10 números.">

        <label for="CedulaProf">Cédula Profesional:</label>
        <input type="text" id="CedulaProf" name="CedulaProf" value="<?php echo isset($row['CedulaProf']) ? htmlspecialchars($row['CedulaProf']) : ''; ?>" required maxlength="10"
                pattern="[0-9]{7,10}"
                title="Debe contener entre 7 y 10 dígitos numéricos.">

        <label for="Maestria">Maestría:</label>
        <input type="text" id="Maestria" name="Maestría" value="<?php echo isset($row['Maestría']) ? htmlspecialchars($row['Maestría']) : ''; ?>" required minlength="3"
                maxlength="50"
                title="Ingrese un nombre válido de maestría.">

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

