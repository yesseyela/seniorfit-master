<!DOCTYPE html>
<html>
  <head>
    <title>Actividades - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_activities.css">
  </head>
  <body>
  <div class="container">
    <?php include 'base_adulto.php'; 
      session_start();
      $nombre_usu =  $_SESSION['nombre_usuario'];
      $asignacion = $_GET['id'];
      //echo $asignacion;

      include 'conecta.php';
      $bd = conectar();
      $query = "SELECT regis.id_asignacion, regis.duracion, asig.id_ejercicio, asig.id_usuario, ejer.nombre_ejercicio, ejer.imagen 
      FROM `registro_ejercicio` as regis 
      INNER JOIN asignacion_ejercicios as asig ON asig.id_asignacion = regis.id_asignacion 
      INNER JOIN ejercicios as ejer on asig.id_ejercicio = ejer.id_ejercicio 
      WHERE regis.id_asignacion = '$asignacion'";
        $result = mysqli_query($bd, $query);
        $array_aux = mysqli_fetch_array($result)
      
    ?>
    <center>
    <h2>Cronómetro</h2>
    <p id="cronometro">00:00:00</p>
    <button onclick="iniciarCronometro()">Iniciar</button> |
    <button onclick="pararCronometro()">Parar</button>
    <br>
    <br>

    <form method="POST" action="guardar_ejercicio.php">
      <input type="hidden" name="asignacion" value="<?php echo $array_aux['id_asignacion']; ?>">
      <input type="hidden" name="usuario" value="<?php echo $nombre_usu; ?>">
      <input type="hidden" name="duracion" id="duracion" value="">
      <input type="submit" value="Guardar">
    </form>
    </center>

    <?php
      mysqli_close($bd);
    ?>
  </div>

  <script>
    var segundos = 0;
    var minutos = 0;
    var horas = 0;
    var cronometro;

    function iniciarCronometro() {
      cronometro = setInterval(function() {
        segundos++;
        if (segundos == 60) {
          segundos = 0;
          minutos++;
        }
        if (minutos == 60) {
          minutos = 0;
          horas++;
        }
        var duracion = (horas < 10 ? '0' : '') + horas + ':' + (minutos < 10 ? '0' : '') + minutos + ':' + (segundos < 10 ? '0' : '') + segundos;
        document.getElementById('cronometro').innerHTML = duracion;
        document.getElementById('duracion').value = duracion;
      }, 1000);
    }

    function pararCronometro() {
      clearInterval(cronometro);
    }
  </script>
    <form id = "formularoio2" action="activities.php" method="POST">
      <button type="submit"class="btn btn-success" >VOLVER</button>
    </form>
  </body>
</html>
