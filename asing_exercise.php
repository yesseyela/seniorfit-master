<!DOCTYPE html>
<html>
  <head>
    <title>Añadir ejercicio - Entrenador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_trainer.css">
  </head>
  <body>
    <div>
    <?php include 'base_trainer.php'; ?>
    </div> 
    <div class="cointainer">
    <?php

        include 'conecta.php';
        $bd = conectar();

        $cedula_usu = $_GET['cedula']; 
        $query_usuario = "SELECT * FROM usuarios WHERE cedula = '$cedula_usu'";
        $resultado = mysqli_query($bd, $query_usuario);
        $usuario = mysqli_fetch_array($resultado);
        $nombre_usu = $usuario['nombre_usuario'];
        $nombre = $usuario['nombre'];
        $enfermedades = $usuario['enfermedades'];
        $limitaciones = $usuario['limitaciones'];

        //Mostrar enfermedades y limitaciones del usuario al entrenador
        echo "<h3>Las enfermedades del usuario ". $nombre . " son: " . $enfermedades . ".</h2>";
        echo "<h3>Las limitaciones del usuario ". $nombre . " son: " . $limitaciones . ".</h2>";

    ?>
        <br>
        <form method="post" action="asignar_ejercicio.php">
        <table>
        <thead>
            <tr>
            <th>Nombre del ejercicio</th>
            <th>Imagen</th>
            <th>Habilitado</th>
            </tr>
        </thead>
        <tbody>
           
          <?php
            $query = "SELECT * FROM ejercicios";
            $result = mysqli_query($bd, $query);
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['nombre_ejercicio'] . "</td>";
              $imagen_base64 = base64_encode($row['imagen']);
              echo "<td><img src='data:image/jpg;base64, $imagen_base64' style='width: 120px;'></td>";
              // Mostrar un checkbox para habilitar/deshabilitar el ejercicio
              echo "<td><input type='checkbox' name='ejercicio_" . $row['id_ejercicio'] . "' value='1'></td>";
              echo "</tr>";
            }
            mysqli_close($bd);
           ?>
        </tbody>
        
        </table>
        <br>
        <input type="hidden" name="cedula" value="<?php echo $cedula_usu; ?>">
        <center>
        <input type="submit" value="Guardar cambios">
          </center>
        <br>
        </form>
    </div>
    </body>
</html>
