<?php

require_once __DIR__ . '/../Conexion/ConnecionMySql.php';

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$sql = "SELECT (@row_number := @row_number + 1) AS id,Nombre,Apellidos,Telefono,CedulaProf,Maestría 
        FROM usuarios, (SELECT @row_number := 0) AS t";
$result = $conn->ExecuteQuery($sql);

?>
