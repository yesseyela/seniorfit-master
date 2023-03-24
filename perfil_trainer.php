<!DOCTYPE html>
<html lang="en">
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
    <?php include 'base_trainer.php'; ?>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto d-block">
        <h1 class="text"> <strong>Perfil del Entrenador</strong></h1><br>
        <table class="table table-success table-striped ">
        <thead>
            <tr>
                <th><strong><center>Cedula</center></strong></th>
                <th><strong><center>Nombre</center></strong></th>
                <th><strong><center>Correo</center></strong></th>
                <th><strong><center>Contraseña</center></strong></th>
                <th><strong><center>Acciones</center></strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
                //FALTA HACER Q TRAIGA LA INFO DE EL USUARIO Q ESTAABIERTO SESION
                include 'conecta.php';
                $bd = conectar();
                $query = "SELECT * FROM usuarios Where tipo_usuario = 'Entrenador'";
                $result = mysqli_query($bd, $query);
                while ($row = mysqli_fetch_array($result)):
                    echo "<tr>";
                    echo "<td>" . $row['cedula'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td> ***********</td>";
                    echo "<td><a href='editar_perfil.php?cedula=" . $row['cedula'] . "'>Editar</a></td>";
                    echo "</tr>";
                endwhile;
                // Cerrar la conexión a la base de datos
                mysqli_close($bd);
            ?>
        </tbody>
        </table>
        </div>
      </div>
    </div>
</body>
</html>
