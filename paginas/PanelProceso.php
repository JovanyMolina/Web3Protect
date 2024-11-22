<?php

require_once __DIR__ . '/../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$sql = "SELECT id,Nombre,Apellidos,Telefono,CedulaProf,Maestría 
        FROM usuarios";
$result = $conn->ExecuteQuery($sql);

?>
