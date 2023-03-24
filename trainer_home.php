<!DOCTYPE html>
<html>
  <head>
    <title>Inicio - Entrenador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_trainer.css">
  </head>
  <body>
    <div>
    <?php include 'base_trainer.php'; ?>
    </div>
    <div class="container">
        <h1>Entrenador</h1>
        <?php include 'conecta.php';
                $bd = conectar();
                $query = "SELECT * FROM usuarios WHERE tipo_usuario = 'Entrenador'";
                $result = mysqli_query($bd, $query);
                $entrenador = mysqli_fetch_array($result);
                $query2 = "SELECT * FROM usuarios WHERE tipo_usuario = 'Adulto Mayor'";
                $result2 = mysqli_query($bd, $query2);
             ?>
        <h2>
             <?php 
             echo "Bienvenido, ".$entrenador['nombre']; ?>
            </h2> <!-- Mostrar el nombre del entrenador  no-->
        <table class="table">
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
</body
