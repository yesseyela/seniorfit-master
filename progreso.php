<!DOCTYPE html>
<html>
  <head>
    <title>Actividades - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_activities.css">
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
    <div class="cointainer">
        <h1> Registro de Actividades</h1>
        <table>
        <thead>
            <tr>
            <th>Nombre del ejercicio</th>
            <th>Duracion</th>
            <th>Fecha de Desarrollo</th>
            <th>Fecha de Asignacion</th>
            </tr>
        </thead>
        <tbody>
           <?php

            $query = "SELECT regis.id_asignacion, regis.duracion, regis.fecha,
            asig.id_ejercicio, asig.id_usuario, asig.fecha_asignacion,
            ejer.nombre_ejercicio, ejer.imagen,
            usu.nombre, usu.edad
            FROM `registro_ejercicio` as regis 
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
        <!--<input type="submit" value="Guardar cambios">-->
    </div>

    </body>
</html>