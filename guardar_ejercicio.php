<?php
session_start();
$nombre_usu = $_SESSION['nombre_usuario'];

include 'conecta.php';
$bd = conectar();

if (isset($_POST['asignacion']) && isset($_POST['duracion'])) {
  $nombre_ejercicio = $_POST['asignacion'];
  $duracion = $_POST['duracion'];
    //echo $nombre_ejercicio;
    //echo $duracion;
    
  $query = "INSERT INTO registro_ejercicio (id_asignacion, duracion, completado ) 
  VALUES ('$nombre_ejercicio', '$duracion', 1)";
  

  if (mysqli_query($bd, $query)) {
    echo "Ejercicio guardado exitosamente";
  } else {
    echo "Error al guardar el ejercicio: " . mysqli_error($bd);
  }
} else {
  echo "Faltan datos necesarios para guardar el ejercicio";
}
//header('Location: activities.php');
//mysqli_close($bd);
?>

