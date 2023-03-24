<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Prueba - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-QKj7V8zOJNw7VLCcnaKb0dVxMQP4Fb4+ucn1nHFrV7l8VDfSyrV7lv70kHJu5PdTkxIO5p67X5G5fzMX/u1KQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styles.css">
   </head>
  <body>
    <?php include 'base_adulto.php'; ?>


  <div class="container text-justify">
    <div class="row align-items-start">
      <div class="col-12 col-md-6">
        <h3><strong>Vamos comienza..!</strong></h3>
        
        <?php
          session_start();
          $nombre_usu =  $_SESSION['nombre_usuario'];
          $asignacion = $_GET['id'];
          //echo $asignacion;

          include 'conecta.php';
          $bd = conectar();
          $query = "SELECT regis.id_asignacion, regis.duracion, asig.id_ejercicio, asig.id_usuario, ejer.nombre_ejercicio, ejer.imagen 
          FROM registro_ejercicio as regis 
          INNER JOIN asignacion_ejercicios as asig ON asig.id_asignacion = regis.id_asignacion 
          INNER JOIN ejercicios as ejer on asig.id_ejercicio = ejer.id_ejercicio 
          WHERE regis.id_asignacion = '$asignacion'";
            $result = mysqli_query($bd, $query);
            $array_aux = mysqli_fetch_array($result);
            $asignacion2 = $array_aux['id_asignacion'];

        ?>
        <center>
        <h1>Cronómetro</h1>
        <img class='card-img-top' src='img/crono.png' alt='Card image cap' style='height: 300px; object-fit: cover;'>
        <br><br><p id="cronometro">00:00:00</p>
        <button onclick="iniciarCronometro()">Iniciar</button> |
        <button onclick="pararCronometro()">Parar</button>
        <br>
        <br>

        <form method="POST" action="guardar_ejercicio.php">
          <input type="hidden" name="asignacion" value="<?php echo $asignacion2; ?>">
          <input type="hidden" name="usuario" value="<?php echo $nombre_usu; ?>">
          <input type="hidden" name="duracion" id="duracion" value="">
          <input type="submit" value="Guardar">
        </form>
        </center>

        <?php
          mysqli_close($bd);
        ?>

        <h3><p></p></h3>
      </div>
      <div class="col-12 col-md-6">
      <h3><p class="font-family: Tahoma;"><h1 class=" text-danger"><strong>¡Recuerda!</strong></h1>
              <h3><strong><br>☑ El ejercicio no es solo una actividad física, es una inversión en tu bienestar físico, mental y emocional.

              <br><br> ☑ Cada día que te mueves un poco más, estás un poco más cerca de tu meta.

              <br><br> ☑ El dolor que sientes hoy será la fuerza que sientas mañana.

              <br><br> ☑ Haz ejercicio porque amas a tu cuerpo, no porque lo odias.

              <br><br> ☑ Cada entrenamiento es una oportunidad para mejorar.

              <br><br> ☑ No busques excusas, busca resultados.</strong></h3>
              
      </p></h3>
      </div>
      
    </div>
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
      <br>
      <center><button type="submit"class="btn btn-success" >VOLVER</button></center>
      <br><br>
    </form>
  </body>
</html>
