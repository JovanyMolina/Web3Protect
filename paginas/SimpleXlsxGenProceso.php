<?php
// Incluir la librería
require_once '../Libreria/simplexlsxgen/SimpleXLSXGen.php';  // Asegúrate de que esta ruta sea correcta

// Si la librería usa un namespace, usa 'use' para importarla
use SimpleXlsxGen\SimpleXLSXGen;  // Si no usa namespace, omite esta línea

// Verifica si la clase existe
if (class_exists('SimpleXLSXGen')) {
    echo "La clase SimpleXLSXGen se cargó correctamente.";
} else {
    echo "Error: La clase SimpleXLSXGen no se pudo cargar.";
}

if (isset($_POST['export_excel'])) {
    require_once __DIR__ . '/../Conexion/ConnecionMySql.php';
    $conn = new ConnectionMySQL();
    $conn->CreateConnection();

    $sql = "SELECT Nombre, Apellidos, Telefono, CedulaProf, Maestría FROM usuarios";
    $result = $conn->ExecuteQuery($sql);

    $data = [];
    $data[] = [ "Nombre", "Apellidos", "Teléfono", "Cédula Profesional", "Maestría"]; // Encabezado de la tabla

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
             
            $row['Nombre'], 
            $row['Apellidos'], 
            $row['Telefono'], 
            $row['CedulaProf'], 
            $row['Maestría']
        ];
    }

    // Uso de la clase SimpleXLSXGen para generar el archivo Excel
    try {
        $xlsx = SimpleXLSXGen::fromArray($data);
        $xlsx->downloadAs('doctores.xlsx');  // Descargar el archivo Excel generado
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
