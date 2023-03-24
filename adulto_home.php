<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Inicio - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styles.css">
   </head>
  <body>
    <div>
    <?php 
    include 'base_adulto.php'; 
      session_start();
      $nombre_usu =  $_SESSION['nombre_usuario'];

      include 'conecta.php';
      $bd = conectar();
      $query = "SELECT * FROM usuarios Where nombre_usuario = '$nombre_usu'";
      $result = mysqli_query($bd, $query);
      $row = mysqli_fetch_array($result);
      echo "<h1><strong> Bienvenido, " . $row['nombre'] . " </strong></h1>";
      // Cerrar la conexión a la base de datos
      mysqli_close($bd);
    ?>
    </div>

    <div class="container text-justify">
      <div class="row align-items-start">
        <div class="col-12 col-md-6">
          <h3><strong>Hey!, es un gusto tenerte con nosotros</strong></h3>
          <img src="img/saludo.jpg"  class="img-fluid rounded shadow " alt="saludo">
          <h3><p></p></h3>
        </div>
        <div class="col-12 col-md-6">
        <h3><p class="font-family: Tahoma;"><h1 class=" text-danger"><strong>¡Bienvenidos a SeniorFit!</strong></h1>
                <br><br> Estamos muy emocionados de tenerlos aquí y ser parte de su viaje hacia un 
                estilo de vida saludable y activo. Sabemos que mantenerse en forma y saludable 
                puede ser un desafío, especialmente a medida que envejecemos, pero estamos aquí 
                para apoyarlos en cada paso del camino.
                <br><br>En SeniorFit, encontrarán una amplia variedad de actividades diseñadas específicamente 
                para satisfacer las necesidades de los adultos mayores. Desde ejercicios de baja 
                intensidad hasta entrenamientos más avanzados, nuestra plataforma se adapta a su nivel 
                de habilidad y a sus objetivos individuales.
                
        </p></h3>
        </div>
        
      </div>
      <div class="row align-items-start">
        <div class="col-12 col-md-6">
        <h3><p class="font-family: Tahoma;"><h1 class=" text-danger"><strong></strong></h1>
                <br><br><br>Además, nuestro sistema de seguimiento de progreso les permitirá llevar un registro de 
                su actividad y su avance a lo largo del tiempo, lo que les ayudará a mantenerse motivados 
                y enfocados en sus objetivos. También pueden modificar su perfil en cualquier momento para 
                asegurarse de que siempre estén recibiendo el mejor apoyo posible.

                <br><br>En SeniorFit, estamos comprometidos con su bienestar y esperamos ser parte de su viaje hacia
                una vida más saludable y activa. ¡Comencemos!
              <br>
              Tambien podras llevar tu progreso de Registro de actividades el cual     
        </p></h3>
        </div>
        <div class="col-12 col-md-6">
        <img src="img/adulto.jpg" class="img-fluid rounded shadow" alt="saludo">
        
        </div>
        
      </div>
    </div>

    <br>
    <hr>
    <h3><strong>COMENCEMOS.. !!</strong></h3>
    <div class="opciones_adulto">
    
      <hr>

      <div class="container text-justify">
        <div class="row align-items-start">
          <div class="col-12 col-md-6">
            <div class="item shadow mb-4">
              <h3 class=" text-danger"><strong>Estado de salud</strong></h3>
              <a href="salud.php">
                <img src="img/salud.png" class="rounded border border-danger card-img-top" alt="salud">
              </a>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class=item shadow mb-4>
              <h3 class=" text-success"><strong>Ejercicios</strong></h3>
              <a href="activities.php ">
                <img src="img/aptitud-fisica.png" class="rounded border border-success card-img-top" alt="ejercicio">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </body>
</html>