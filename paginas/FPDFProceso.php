<?php
// export_pdf.php
require('../Libreria/fpdf/fpdf.php');

if (isset($_POST['export_pdf'])) {
    require_once __DIR__ . '/../Conexion/ConnecionMySql.php';
    $conn = new ConnectionMySQL();
    $conn->CreateConnection();

    $sql = "SELECT  Nombre, Apellidos, Telefono, CedulaProf, Maestría FROM usuarios";
    $result = $conn->ExecuteQuery($sql);

    // Crear el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8);

    // Encabezados de la tabla
//    $pdf->Cell(10, 10, 'ID', 1);
    $pdf->Cell(30, 10, 'Nombre', 1);
    $pdf->Cell(30, 10, 'Apellidos', 1);
    $pdf->Cell(30, 10, 'Telefono', 1);
    $pdf->Cell(30, 10, 'Cedula', 1);
    $pdf->Cell(45, 10, 'Maestria', 1);  // Columna "Maestría"
    $pdf->Ln();

    // Datos de los doctores
    while ($row = mysqli_fetch_assoc($result)) {
      //  $pdf->Cell(10, 10, $row['id'], 1);
        $pdf->Cell(30, 10, $row['Nombre'], 1);
        $pdf->Cell(30, 10, $row['Apellidos'], 1);
        $pdf->Cell(30, 10, $row['Telefono'], 1);
        $pdf->Cell(30, 10, $row['CedulaProf'], 1);        
        $pdf->MultiCell(45, 10, $row['Maestría'], 1);

    }
//    $pdf->Ln();  // Salto de línea

    $pdf->Output('D', 'doctores.pdf');
}
?>