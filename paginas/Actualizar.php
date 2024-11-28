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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <form action="EditarUsuario.php" method="POST" class="box">
        <div class="titulo">
            <h2>Actualizar Usuario</h2>
        </div>

        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?>">

        <div class="input-container">
            <label for="Nombre"><strong>Nombre:</strong></label>
            <div class="input-wrapper">
                <input type="text" id="Nombre" name="Nombre" value="<?php echo isset($row['Nombre']) ? htmlspecialchars($row['Nombre']) : ''; ?>" required minlength="2"
                maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios.">
                <i class="fa fa-user"></i>
            </div>
        </div>

        <div class="input-container">
            <label for="Apellidos"><strong>Apellidos:</strong></label>
            <div class="input-wrapper">
                <input type="text" id="Apellidos" name="Apellidos" value="<?php echo isset($row['Apellidos']) ? htmlspecialchars($row['Apellidos']) : ''; ?>" required minlength="2"
                maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios.">
                <i class="fa fa-user-tag"></i>
            </div>
        </div>

        <div class="input-container">
            <label for="Telefono"><strong>Teléfono:</strong></label>
            <div class="input-wrapper">
                <input type="text" id="Telefono" name="Telefono" value="<?php echo isset($row['Telefono']) ? htmlspecialchars($row['Telefono']) : ''; ?>" required pattern="[0-9]{10}"
                maxlength="10" title="Debe contener exactamente 10 números.">
                <i class="fa fa-phone"></i>
            </div>
        </div>

        <div class="input-container">
            <label for="CedulaProf"><strong>Cédula Profecional:</strong></label>
            <div class="input-wrapper">
                <input type="text" id="CedulaProf" name="CedulaProf" value="<?php echo isset($row['CedulaProf']) ? htmlspecialchars($row['CedulaProf']) : ''; ?>" required maxlength="8"
                pattern="[0-9]{7,10}" title="Debe contener entre 7 y 8 dígitos numéricos.">
                <i class="fa fa-id-card"></i>
            </div>
        </div>

        <div class="input-container">
            <label for="Maestria"><strong>Maestría:</strong></label>
            <div class="input-wrapper">
                <input type="text" id="Maestria" name="Maestría" value="<?php echo isset($row['Maestría']) ? htmlspecialchars($row['Maestría']) : ''; ?>" required minlength="3"
                maxlength="50" title="Ingrese un nombre válido de maestría.">
                <i class="fa fa-graduation-cap"></i>
            </div>
        </div>

        <div class="button-container">
        <button type="button" class="regresar-button" onclick="window.location.href='../panel.php'">Regresar al Panel</button>
        <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>
