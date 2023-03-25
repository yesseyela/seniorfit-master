<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Progreso - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styles.css">
   </head>
  <body>
    <div>
    <?php 
      include 'base_adulto.php'; 
      session_start();
      $nombre_usu =  $_SESSION['nombre_usuario'];

      include 'conecta.php';
      $bd = conectar();
    ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto d-block">
        <h1 class="text"> <strong>Registro de Actividades</strong></h1><br>
        <table class="table table-success table-striped ">
        <thead>
            <tr>
            <th><strong><center>Nombre del ejercicio</center></strong></th>
            <th><strong><center>Duracion</center></strong></th>
            <th><strong><center>Fecha de Desarrollo</center></strong></th>
            <th><strong><center>Fecha de Asignacion</center></strong></th>
        </thead>
        <tbody>
           <?php

            $query = "SELECT regis.id_asignacion, regis.duracion, regis.fecha,
            asig.id_ejercicio, asig.id_usuario, asig.fecha_asignacion,
            ejer.nombre_ejercicio, ejer.imagen,
            usu.nombre, usu.edad
            FROM registro_ejercicio as regis 
            INNER JOIN asignacion_ejercicios as asig ON asig.id_asignacion = regis.id_asignacion 
            INNER JOIN ejercicios as ejer on asig.id_ejercicio = ejer.id_ejercicio
            INNER JOIN usuarios as usu on usu.nombre_usuario = asig.id_usuario
            WHERE usu.nombre_usuario = '$nombre_usu'";

            $result = mysqli_query($bd, $query);
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['nombre_ejercicio'] . "</td>";
              echo "<td>" . $row['duracion'] . "</td>";
              echo "<td>" . $row['fecha'] . "</td>";
              echo "<td>" . $row['fecha_asignacion'] . "</td>";
              echo "</tr>";
            }
            mysqli_close($bd);
           ?>
        
      
        </table>
        </div>
      </div>
    </div>

    </body>
</html>