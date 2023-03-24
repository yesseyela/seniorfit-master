<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud - adulto mayor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_adulto.css">
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
</body>
</html>