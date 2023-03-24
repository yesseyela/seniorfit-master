<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Salud - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="style/styles.css">
   
</head>
<body>
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
    ?>
     <div class="container">
    <table class="table">
            

    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto d-block">
        <h1 class="text"> <strong>Registro de Actividades</strong></h1>
        <table class="table table-success table-striped ">
            <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Cedula</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Género</th>
                        <th>Enfermedades</th>
                        <th>Limitaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td>" . $row['cedula'] . "</td>";
                        echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                        echo "<td>" . $row['genero'] . "</td>";
                        echo "<td>" . $row['enfermedades'] . "</td>";
                        echo "<td>" . $row['limitaciones'] . "</td>";
                        echo "</tr>";
                    ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
</body>
</html>