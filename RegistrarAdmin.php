<?php
require_once 'Conexion/auth.php';
?>

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
            <input type="text" id="usuario" name="usuario" required  minlength="5" 
                maxlength="20" 
                pattern="[a-zA-Z0-9_]+" 
                title="El usuario debe tener entre 5 y 20 caracteres alfanuméricos (sin espacios).">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required minlength="8" 
                maxlength="20" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}" 
                title="La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula, un número y un carácter especial.">
            
            <input type="submit" value="Registrar" id="registrar">
<!-- <button type="button" onclick="history.back()">Regresar</button>
-->
        </form>
    </div>
    <script src="js/ReforsarRegistroAdmin.js"></script>
</body>
</html>
