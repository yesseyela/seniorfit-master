<?php
$cedula_usu = $_POST['cedula'];
include 'conecta.php';
$bd = conectar();

$query_usuario = "SELECT * FROM usuarios WHERE cedula = '$cedula_usu'";
$resultado = mysqli_query($bd, $query_usuario);
$usuario = mysqli_fetch_array($resultado);
$nombre_usu = $usuario['nombre_usuario'];

foreach ($_POST as $key => $value) {
  if (substr($key, 0, 9) === 'ejercicio') {
    $id_ejercicio = substr($key, 9);
    if ($value == 1) {
      echo "<br>";
      echo $value;
      echo "<br>";
      $num = intval(substr($id_ejercicio, 1));
      echo $num;
      echo "<br>";
      echo $nombre_usu;
      echo "<br>";

      $query_insert = "INSERT INTO asignacion_ejercicios (id_ejercicio, id_usuario, habilitado) VALUES ('$num', '$nombre_usu', 1)";
      $first = mysqli_query($bd, $query_insert);
       
    }
  }
}

mysqli_close($bd);

if ($first) {
  echo "Registro exitoso.";
} else {
  echo "No se registraron ejercicios.";
}

//header("Location: trainer_home.php"); 
//exit();
?>
