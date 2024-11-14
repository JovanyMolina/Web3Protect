<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="Estilos/EstilosRegistroUsuario.css">
</head>
<body>
    <div class="formu">
        <form action="paginas/RegistroUsuaruiosProceso.php" method="POST">
            <h2>Registro de usuario</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            <label type="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label type="CedulaProfesional">Cedula Profesional:</label>
            <input type="text" id="cedulaProfesional" name="cedulaProfesional" required>
            <label type="text">Maestria:</label>
            <input type="text" id="maestria" name="maestria" required>

            <button type="submit">Registrar</button>
        </form>
    </div>



</body>
</html>