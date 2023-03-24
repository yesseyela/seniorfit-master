<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Actividades - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styles.css">
   </head>
  <body>
  <header 'Content-Type: text/html; charset=utf-8'>
  <div class="container">
      <?php 
        include 'base_adulto.php'; 
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
      <h3 class="text-warning"><strong>Ejercicios Asignados</strong></h3>
      <div class="row">
        <?php
          while ($ejercicio = mysqli_fetch_array($resultado_ejercicios)) {
            $imagen_base64 = base64_encode($ejercicio['imagen']);
            echo "<div class='col-12 col-md-6'>";
            echo "<div class='item shadow mb-4'>";
            echo "<div class='card'>";
            echo "<img class='card-img-top' src='data:image/jpg;base64, $imagen_base64' alt='Card image cap' style='height: 300px; object-fit: cover;'>";
            echo "<div class='card-body'>";
            echo "<strong><h3 class='card-title'>" . $ejercicio['nombre_ejercicio'] . "</h3></strong>";
            echo "<a href='prueba.php?id=" . $ejercicio['id_asignacion'] . "' class='btn btn-warning'><strong>Vamos alla!!</strong></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        ?>
      </div>
      <?php
        mysqli_close($bd);
      ?>
    </div>

  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
