<?php
require('fpdf/fpdf.php');

// Crear el objeto de la clase FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Definir el encabezado
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte de Ejercicios',0,1,'C');
$pdf->Ln();

// Definir la información del adulto mayor
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,'Nombre:',0,0);
//$pdf->Cell(50,10,$am['nombre'],0,1);
$pdf->Cell(40,10,'Edad:',0,0);
//$pdf->Cell(50,10,$am['edad'],0,1);
$pdf->Cell(40,10,'Sexo:',0,0);
//$pdf->Cell(50,10,$am['sexo'],0,1);
$pdf->Ln();

// Definir las actividades del adulto mayor
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,10,'Actividades',1,0,'C');
$pdf->Cell(50,10,'Fecha',1,1,'C');
$pdf->SetFont('Arial','',12);
//foreach ($actividades as $actividad) {
  //  $pdf->Cell(80,10,$actividad['nombre'],1,0);
   // $pdf->Cell(50,10,$actividad['fecha'],1,1);
//}
$pdf->Ln();

// Definir el pie de página
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,'Generado por: [nombre del entrenador]',0,1,'C');
$pdf->Cell(0,10,'Fecha de generación: '.date('Y-m-d H:i:s'),0,0,'R');

// Generar el documento PDF y mostrarlo en el navegador
$pdf->Output();
?>
