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
</head>

<body>
    <div class="formu">
        <form action="paginas/RegistroUsuaruiosProceso.php" method="POST" class="box">
            <h2>Registro de usuario</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required minlength="2"
                maxlength="50"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                title="Solo se permiten letras y espacios.">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required minlength="2"
                maxlength="50"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                title="Solo se permiten letras y espacios.">
            <label type="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" required pattern="[0-9]{10}"
                maxlength="10"
                title="Debe contener exactamente 10 números.">
            <label type="CedulaProfesional">Cedula Profesional:</label>
            <input type="text" id="cedulaProfesional" name="cedulaProfesional" required maxlength="10"
                pattern="[0-9]{7,10}"
                title="Debe contener entre 7 y 10 dígitos numéricos.">
            <label type="text">Maestria:</label>
            <input type="text" id="maestria" name="maestria" required minlength="3"
                maxlength="50"
                title="Ingrese un nombre válido de maestría.">

            <button type="submit" id="registrar">Registrar</button>
        </form>
    </div>


<sricpt src="js/ReforsarRegistroUsuario.js"></sricpt>
</body>

</html>