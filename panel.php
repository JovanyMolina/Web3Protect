<?php
require_once 'Conexion/auth.php';
require_once 'paginas/PanelProceso.php';

$counter = 1;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="Estilos/EstilosPanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <div class="top-bar">
        <div class="logo">Bienestar el Salud</div>
        <button class="menu-toggle" aria-label="Menú">&#9776;</button>

        <nav>
            <a href="RegistrarUsuario.php">Registro usuarios</a>
            <a href="RegistrarAdmin.php">Registrar Admin</a>
            <a href="Conexion/logut.php"><i class="fa-solid fa-right-to-bracket"></i></a>
        </nav>
    </div>

    <div class="panel-container">
        <h1>Datos de doctores</h1>
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
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['Apellidos']); ?></td>
                        <td><?php echo htmlspecialchars($row['Telefono']); ?></td>
                        <td><?php echo htmlspecialchars($row['CedulaProf']); ?></td>
                        <td><?php echo htmlspecialchars($row['Maestría']); ?></td>
                        <td>
                            <a href="paginas/Actualizar.php?id=<?php echo $row['id']; ?>" class="btn btn-update"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="paginas/EliminarUsuarios.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            
            <form method="post" action="paginas/SimpleXlsxGenProceso.php">
                <button type="submit" name="export_excel" class="btn-export"><i class="fa-solid fa-file-excel"></i></button>
            </form>

            <form method="post" action="paginas/FPDFProceso.php">
                <button type="submit" name="export_pdf" class="btn-export"><i class="fa-solid fa-file-pdf"></i></button>
            </form>

        </table>
    </div>

    <?php
    $conn->SetFreeResult($result);
    $conn->CloseConnection();
    ?>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.top-bar nav');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    </script>

</body>

</html>