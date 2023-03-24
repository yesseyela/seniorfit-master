<!DOCTYPE html>
<html>
  <head>
    <title>Inicio - Adulto Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_adulto.css">
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
      echo "<h1> Bienvenido, " . $row['nombre'] . " </h1>";
      echo "<br>";
      echo "<br>";
      // Cerrar la conexión a la base de datos
      mysqli_close($bd);
    ?>
    </div>
    <div class="contenedor">
      <div class="seccion1">
        FOTO QUE VI DONDE VALERIA
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            <br>
            Eum suscipit dolore fuga eveniet, amet a odio! Omnis minima
            <br>
            iusto, sunt laboriosam, error cum corporis a obcaecati consequatur quis ex nemo.
      </div>
      <div class="seccion2">
        TEXTO DESCRIPCION VALERIA
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            <br>
            Eum suscipit dolore fuga eveniet, amet a odio! Omnis minima
            <br>
            iusto, sunt laboriosam, error cum corporis a obcaecati consequatur quis ex nemo.
      </div>
      
      <div class="opciones_adulto">
      <div class="tarjeta">
      <br><br><br><br><br><br><br>
        <h3>Ejercicios</h3>
        <a href="activities.php ">
          <img src="img/aptitud-fisica.png" alt="ejercicio" style="width: 100px;">
        </a>
      </div>
      <br>
      <br>
      <div class="opciones_adulto">
        <div class="tarjeta">
            <h3>Estado de salud</h3>
            <a href="salud.php">
              <img src="img/salud.png" alt="salud" style="width: 100px;">
            </a>
        </div>
      </div>
    </div>
    </div>

    </body>
</html>

