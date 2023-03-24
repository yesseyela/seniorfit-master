<div class="container">
    <?php include 'base_trainer.php'; ?>
</div> 

  <?php
      include 'conecta.php';
      $bd = conectar();
  ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto d-block">
      <h1 class="text"> <strong>Usuarios con enfermedades y limitaciones</strong></h1><br>
        <table class="table table-success table-striped ">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Enfermedades</th>
              <th>Limitaciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM usuarios WHERE enfermedades IS NOT NULL AND limitaciones IS NOT NULL";
              $resultado = mysqli_query($bd, $query);
              while ($usuario = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $usuario['nombre'] . "</td>";
                echo "<td>" . $usuario['enfermedades'] . "</td>";
                echo "<td>" . $usuario['limitaciones'] . "</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



  <br>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto d-block">
        <h1 class="text"> <strong>Asignar Actividades</strong></h1><br>
        <form method="post" action="asignar_ejercicio.php">
          <table class="table table-danger table-striped table-bordered border ">
              <thead>
                  <tr>
                      <th><strong><center><h3>Nombre del ejercicio</h3></center></strong></th>
                      <th><strong><center><h3>Imagen</h3></center></strong></th>
                      <th><strong><center><h3>Habilitado</h3></center></strong></th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      $query = "SELECT * FROM ejercicios";
                      $result = mysqli_query($bd, $query);
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<tr>";
                          echo "<td><strong><center>" . $row['nombre_ejercicio'] . "</center></strong></td>";
                          $imagen_base64 = base64_encode($row['imagen']);
                          echo "<td><img class='card-img-top' src='data:image/jpg;base64, $imagen_base64' alt='Card image cap' style='width: 120px; object-fit: cover;'></center></td>";
                          // Mostrar un checkbox para habilitar/deshabilitar el ejercicio
                          echo "<td><center><input type='checkbox' name='ejercicio_" . $row['id_ejercicio'] . "' value='1'></td>";
                          echo "</tr>";
                      }
                      mysqli_close($bd);
                  ?>
              </tbody>
          </table>

          <br>

          <input type="hidden" name="cedula" value="<?php echo $cedula_usu; ?>">
          <center>
              <input type="submit" value="Guardar cambios" class="btn btn-primary">
          </center>

          <br>
      </form>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
