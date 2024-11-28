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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

    <div class="form-container">
        <form action="paginas/AdminProceso.php" method="POST" class="box">

        <h2>Registro Administrador</h2>
            <div class="input-container">
                <label for="usuario"><strong>Usuario:</strong></label>
                <div class="input-wrapper">
                <input type="text" id="usuario" name="usuario" required  minlength="5" 
                maxlength="20" 
                pattern="[a-zA-Z0-9_]+" 
                title="El usuario debe tener entre 5 y 20 caracteres alfanuméricos (sin espacios).">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="password"><strong>Contraseña:</strong></label>
                <div class="input-wrapper">
                <input type="password" id="password" name="password" required minlength="8" 
                maxlength="20" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}" 
                title="La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula, un número y un carácter especial.">
                <i class="fa-solid fa-lock"></i>
                </div>
            </div>
            
            <input type="submit" value="Registrar" id="registrar">
<!-- <button type="button" onclick="history.back()">Regresar</button>
-->
        </form>
    </div>
    <script src="js/ReforsarRegistroAdmin.js"></script>
</body>
</html>
