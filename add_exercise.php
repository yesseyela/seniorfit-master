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
    <div class="container">
      <h1>Entrenador</h1>
      <?php
          include 'conecta.php';
          $bd = conectar();
          $query2 = "SELECT * FROM usuarios WHERE tipo_usuario = 'Entrenador'";
          $result2 = mysqli_query($bd, $query2);
          $entrenador = mysqli_fetch_array($result2);

          $query = "SELECT * FROM ejercicios";
          $result = mysqli_query($bd, $query);
          ?>
      <h2>
             <?php 
             echo "Bienvenido, ".$entrenador['nombre']; ?>
      </h2>

        <form action="add_exercise1.php" method="post" enctype="multipart/form-data" class="form-inline">
          <!--añade los ejercicios en la tabla ejercicios-->
            <div class="form-group">
                <label for="exercise">Nombre del ejercicio:</label>
                <input type="text" class="form-control" id="exercise" name="exercise">
                <label for="">Imagen:</label>
                <input type="file" class="form-control" id="image" name="image" multiple>
            </div>
            
        <div class="form-group">
          <button type="submit" class="btn btn-default">Agregar</button>
        </div>
        </form>
        <br>
      <table>
        <thead>
          <tr>
            <th>Nombre del ejercicio</th>
            <th>Última fecha de adición</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['nombre_ejercicio'] . "</td>";
              echo "<td>" . $row['fecha_adicion'] . "</td>";
              // Convertir la imagen a base64
              //echo "<td><img src='" . $imagen_base64 . "' style='width: 400px;'></td>";
              //echo "<td><img src='data:image/jpg;base64. $imagen_base64 = base64_encode($row['imagen'])' style='width: 400px;'></td>";
              $imagen_base64 = base64_encode($row['imagen']);
              echo "<td><img src='data:image/jpg;base64, $imagen_base64' style='width: 120px;'></td>";
              echo "<td><a href='delete_exercise.php?id=" . $row['id_ejercicio'] . "'>Eliminar</a></td>";
              echo "</tr>";
          }
          mysqli_close($bd);
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

