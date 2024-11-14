<?php
require_once 'paginas/PanelProceso.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="Estilos/EstilosPanel.css">
</head>
<body>

<div class="top-bar">
    <div class="logo">Bienestar el Salud</div>
    <nav>
        <a href="panel.php">Panel de Control</a>
        <a href="RegistrarAdmin.php">Registrar Admin</a>
        <a href="Conexion/logut.php">Cerrar Sesión</a>
    </nav>
</div>

<div class="panel-container">
    <h1>Bienestar el Salud</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Cédula Profesional</th>
                <th>Maestría</th>
                <th>Operación</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['Apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($row['Telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['CedulaProf']); ?></td>
                    <td><?php echo htmlspecialchars($row['Maestría']); ?></td>
                    <td>
                        <a href="actualizar.php?id=<?php echo $row['id']; ?>" class="btn btn-update">Actualizar</a>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
$conn->SetFreeResult($result);
$conn->CloseConnection();
?>

</body>
</html>
