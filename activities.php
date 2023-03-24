<!DOCTYPE html>
<html>
  <head>
    <title>Actividades - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_activities.css">
  </head>
  <body>
  <div class="container">
    <?php include 'base_adulto.php'; 
      session_start();
      $nombre_usu =  $_SESSION['nombre_usuario'];

      include 'conecta.php';
      $bd = conectar();
      $query = "SELECT * FROM usuarios Where nombre_usuario = '$nombre_usu'";
      $result = mysqli_query($bd, $query);
      $row = mysqli_fetch_array($result);
      echo "<h1> Bienvenido, " . $row['nombre'] . " </h1>";

        $query_ejercicios = "SELECT asig.id_asignacion, asig.id_ejercicio, asig.id_usuario, ejer.nombre_ejercicio, ejer.imagen FROM asignacion_ejercicios as asig INNER JOIN ejercicios as ejer ON asig.id_ejercicio = ejer.id_ejercicio WHERE asig.id_usuario = '$nombre_usu'";
        $resultado_ejercicios = mysqli_query($bd, $query_ejercicios);
        if (!$resultado_ejercicios) {
          die("Error al ejecutar la consulta: " . mysqli_error($bd));
        }
      ?>
   
      <h2>
      Ejercicios Asignados
    </h2>

      <div>
          <?php
            while ($ejercicio = mysqli_fetch_array($resultado_ejercicios)) {
              echo "<a href='prueba.php?id=" . $ejercicio['id_asignacion'] . "'> <div>"; 
              // "<a href='delete_exercise.php?id=" . $row['id_ejercicio'] . "'>;
              $imagen_base64 = base64_encode($ejercicio['imagen']);
              echo " " . $ejercicio['nombre_ejercicio'] . "<img src='data:image/jpg;base64, $imagen_base64' style='width: 150px;'>" ." ";
      
              echo "</div></a>";
              echo "<br>";
            }
          ?>
        </div>
      <?php
        mysqli_close($bd);
      ?>
    </div>
  </body>
</html>

