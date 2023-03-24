<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar sesión como adulto mayor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <style>
      .mask-custom {
        backdrop-filter: contrast(140%) brightness(100%) saturate(100%) sepia(50%) hue-rotate(0deg) grayscale(0%) invert(0%) blur(0px);
        mix-blend-mode: lighten;
        background: rgba(161, 44, 199, 0.31);
        opacity: 1;
      }
    </style>


    <script>
      $('#form-login').submit(function(event) {
        event.preventDefault();
  
        var data = {
          nombre_usuario: $('#nombre_usuario').val(),
          password: $('#password').val()
        };
  
        $.ajax({
          url: 'login.php',
          type: 'POST',
          data: data,
          success: function(response) {
            if (response == 'ERROR') {
              alert('Usuario o contraseña incorrectos');
            } else {
              window.location.href = response;
            }
          }
        });
      });
    </script>
  </head>
  <body >

  <div
    class="bg-image"
    style="
      background-image: url('img/adulto4.jpg');
      height: 100vh;">
    <div class="mask mask-custom"></div>
    <div class="container">
      <h1 class="mt-5 mb-3"><strong> Iniciar Sesión SENIORFIT</strong></h1>
        <form method="post" action="login.php">
        <form id="form-login" class="mb-5">
          <div class="form-group">
            <label for="nombre_usuario"><strong> Nombre de usuario:</strong></label>
            <input type="text" id="nombre_usuario" class="form-control form-control-sm" name="nombre_usuario" required>
          </div>
          <div class="form-group">
            <label for="password"><strong> Contraseña:</strong></label>
            <input type="password" id="password" class="form-control" name="password" required>
          </div>  
          <button type="submit" class="btn btn-primary"><strong>Iniciar sesión</strong></button>         
        </form>
        <hr>
        <p>¿No tienes una cuenta? <a href="register.php"><strong>Regístrate</strong></a></p>
        <div class="volver">
          <a href="index.php"><button class="btn btn-primary"><strong>Volver al inicio</strong></button></a>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
