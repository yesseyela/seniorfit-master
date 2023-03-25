<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte de Ejercicios',0,1,'C');
$pdf->Ln();

$cedula = $_REQUEST["cedula"];
    include("conecta.php");
    $bd=conectar();
    $sql = "select * from usuarios where cedula = '$cedula'";
    $datos1 = mysqli_query($bd,$sql);
    $arr = mysqli_fetch_array($datos1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(60,5,utf8_decode("Cédula: $arr[cedula]"),0,1);
$pdf->Cell(60,5,utf8_decode("Nombre: $arr[nombre]"),0,1);
$pdf->Cell(60,5,utf8_decode("Género: $arr[genero]"),0,1);
$pdf->Ln();

$query = "SELECT regis.id_asignacion, regis.duracion, regis.fecha,
            asig.id_ejercicio, asig.id_usuario, asig.fecha_asignacion,
            ejer.nombre_ejercicio, ejer.imagen,
            usu.nombre, usu.edad
            FROM registro_ejercicio as regis 
            INNER JOIN asignacion_ejercicios as asig ON asig.id_asignacion = regis.id_asignacion 
            INNER JOIN ejercicios as ejer on asig.id_ejercicio = ejer.id_ejercicio
            INNER JOIN usuarios as usu on usu.nombre_usuario = asig.id_usuario
            WHERE usu.cedula = '$cedula'";
$result = mysqli_query($bd, $query);
$actividades = mysqli_fetch_array($result);
            
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,10,'Actividades',1,0,'C');
$pdf->Cell(50,10,'Fecha',1,1,'C');
$pdf->SetFont('Arial','',12);
  
while ($actividades) {
  $pdf->Cell(80,10,$actividades['nombre_ejercicio'],1,0);
  $pdf->Cell(50,10,$actividades['fecha'],1,1);
}

$pdf->Ln();

$pdf->SetFont('Arial', '', 10);

$query = "SELECT * FROM usuarios WHERE tipo_usuario = 'Entrenador'";
$result2 = mysqli_query($bd, $query);

if ($result2) {
  $entrenador = mysqli_fetch_array($result2);
  if ($entrenador) {
    $pdf->Cell(0, 10, utf8_decode("Generado por: $entrenador[nombre]"), 0, 1, 'C');
  }
}
$pdf->Cell(0, 10, utf8_decode('Fecha de generación: ' . date('Y-m-d H:i:s')), 0, 0, 'R');

$pdf->Output();
?>
