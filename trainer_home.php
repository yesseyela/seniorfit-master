<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENIOR FIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
  <body>
    <div>
    <?php include 'base_trainer.php'; ?>
    </div>
    

    <?php include 'conecta.php';
        $bd = conectar();
        $query = "SELECT * FROM usuarios WHERE tipo_usuario = 'Entrenador'";
        $result = mysqli_query($bd, $query);
        $entrenador = mysqli_fetch_array($result);
        $query2 = "SELECT * FROM usuarios WHERE tipo_usuario = 'Adulto Mayor'";
        $result2 = mysqli_query($bd, $query2);
        ?>

    <div class="container">
    <h2>
        <?php 
        echo "Bienvenido Entrenador, ".$entrenador['nombre']; ?>
    </h2>
      <div class="row">
        <div class="col-bg-12 col-sm-12 mx-auto d-block">
        <h1 class="text"> <strong>Lista de Adultos Mayores</strong></h1><br>
        <table class="table table-warning table-striped ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Cedula</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['edad'] . "</td>";
                    echo "<td>" . $row['cedula'] . "</td>";
                    echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                    echo "<td>" . $row['genero'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='asing_exercise.php?cedula=".$row['cedula']."'>Asignar ejercicio</a> | <a href='reporte_trainer.php?cedula". $row['cedula'] . "' target='_blank'>Reporte</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
</body
