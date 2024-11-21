<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador</title>
    <link rel="stylesheet" href="Estilos/EstilosRegistroAdmin.css">
</head>
<body>

    <div class="form-container">
        <form action="paginas/AdminProceso.php" method="POST" class="box">
        <h2>Registrar Administrador</h2>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Registrar" id="registrar">
<!-- <button type="button" onclick="history.back()">Regresar</button>
-->
        </form>
    </div>
</body>
</html>
