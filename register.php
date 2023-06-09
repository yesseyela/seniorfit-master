<!DOCTYPE html>
<html>
<head>
  <title>Registro de Adulto Mayor - SENIOR FIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/style_index.css">
</head>
<body>
  <div class="container">
      <h1>SENIOR FIT</h1>
      <h2>Guía de Entrenamiento para Adultos Mayores</h2>
      <p>Bienvenido a SeniorFit! La guía de entrenamiento para adultos mayores que te ayudará a mantenerte activo y saludable. Con nuestro aplicativo, podrás acceder a una amplia variedad de ejercicios especialmente diseñados para personas de la tercera edad, y llevar un registro de tus avances. ¿Estás listo para empezar a entrenar? ¡Regístrate ahora y comienza tu camino hacia una vida más activa y plena!</p>
      <br>

      <h1>Registro de Adulto Mayor</h1>
    <form action="reg_usu.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre y apellido:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="cedula">Cédula:</label>
        <input type="number" class="form-control" id="cedula" name="cedula" required>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required>
      </div>
      <div class="form-group">
        <label for="edad">Edad:</label>
        <input type="number" class="form-control" id="edad" name="edad" required>
      </div>
      <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
      </div>
      <div class="form-group">
        <label for="genero">Género:</label>
        <select class="form-control" id="genero" name="genero" required>
          <option value="Femenino">Femenino</option>
          <option value="Masculino">Masculino</option>
          <option value="Otro">Otro</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tipo_usuario">Tipo de Usuario:</label>
        <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
          <option value="Adulto Mayor">Adulto Mayor</option>
        </select>
      </div>
      <fieldset>
        <legend>Enfermedades:</legend>
        <input type="checkbox" id="enfermedad1" name="enfermedad1" value="Diabetes">
        <label for="enfermedad1"> Diabetes </label><br>

        <input type="checkbox" id="enfermedad2" name="enfermedad2" value="Hipertensión">
        <label for="enfermedad2"> Hipertensión </label><br>

        <input type="checkbox" id="enfermedad3" name="enfermedad3" value="Artritis">
        <label for="enfermedad3"> Artritis </label><br>

        <input type="checkbox" id="enfermedad4" name="enfermedad4" value="Osteoporosis">
        <label for="enfermedad4"> Osteoporosis </label><br>
      </fieldset>

      <fieldset>
        <legend>Limitaciones físicas:</legend>
        <input type="checkbox" id="limitacion1" name="limitacion1" value="Movilidad reducida">
        <label for="limitacion1"> Movilidad reducida </label><br>

        <input type="checkbox" id="limitacion2" name="limitacion2" value="Problemas de visión">
        <label for="limitacion2"> Problemas de visión </label><br>

        <input type="checkbox" id="limitacion3" name="limitacion2" value="Problemas de audición">
        <label for="limitacion3"> Problemas de audición </label><br>

        <input type="checkbox" id="limitacion4" name="limitacion4" value="Dificultades para hablar">
        <label for="limitacion4"> Dificultades para hablar </label><br>
      </fieldset>
      <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>
</body>
</html>