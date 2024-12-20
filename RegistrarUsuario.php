<?php
require_once 'Conexion/auth.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="Estilos/EstilosRegistroUsuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="formu">
        <form action="paginas/RegistroUsuaruiosProceso.php" method="POST" class="box">
            <h2>Registro de usuario</h2>
            <div class="input-container">
                <label for="nombre"><strong>Nombre:</strong></label>
                <div class="input-wrapper">
                    <input type="text" id="nombre" name="nombre" required minlength="2" maxlength="50"
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios.">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="apellido"><strong>Apellido:</strong></label>
                <div class="input-wrapper">
                    <input type="text" id="apellido" name="apellido" required minlength="2" maxlength="50"
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios.">
                    <i class="fa fa-user-tag"></i>
                </div>
            </div>
            <div class="input-container">
                <h5 for="telefono"><strong>Teléfono:</strong></h5>
                <div class="input-wrapper">
                    <input type="text" id="telefono" name="telefono" required pattern="[0-9]{10}" maxlength="10"
                        title="Debe contener exactamente 10 números.">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="cedulaProfesional"><strong>Cédula Profesional:</strong></label>
                <div class="input-wrapper">
                    <input type="text" id="cedulaProfesional" name="cedulaProfesional" required maxlength="8"
                        pattern="[0-9]{7,10}" title="Debe contener entre 7 y 8 dígitos numéricos.">
                    <i class="fa fa-id-card"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="maestria"><strong>Maestría:</strong></label>
                <div class="input-wrapper">
                    <input type="text" id="maestria" name="maestria" required minlength="3" maxlength="50"
                        title="Ingrese un nombre válido de maestría.">
                    <i class="fa fa-graduation-cap"></i>
                </div>
            </div>

            <div class="buttons-container">
                <button type="button" onclick="window.location.href='panel.php'" class="animate-button regresar-button">
                    Regresar
                </button>
                <button type="submit" id="registrar">Registrar</button>
            </div>
        </form>
    </div>

    <script src="js/ReforsarRegistroUsuario.js"></script>
</body>

</html>
