<!DOCTYPE html>
<html>
  <head>
    <title>Inicio - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_trainer.css">
  </head>
  <body>
    <div>
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
      // Cerrar la conexión a la base de datos
      mysqli_close($bd);
    ?>
    </div>
    <!-- hacer un tipo instructivo o bienvenida al adulto mayor--->

    </body>
</html>