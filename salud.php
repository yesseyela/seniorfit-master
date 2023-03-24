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
    // Cerrar la conexión a la base de datos
    mysqli_close($bd);
    ?>
    <h3>Salud de adulto mayor</h3>
</body>
</html>