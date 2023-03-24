<?php
include("conecta.php");
$bd = conectar();

$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$telefono = $_POST["telefono"];
$edad = $_POST["edad"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$genero = $_POST["genero"];
$tipo_usuario = $_POST["tipo_usuario"];
$nombre_usuario = $_POST["nombre_usuario"];
$email = $_POST["email"];
$password = $_POST["password"];

$enfermedades = '';

if (isset($_POST['enfermedad1'])) {
    $enfermedades .= 'Diabetes, ';
}
if (isset($_POST['enfermedad2'])) {
    $enfermedades .= 'Hipertensión, ';
}
if (isset($_POST['enfermedad3'])) {
    $enfermedades .= 'Artritis, ';
}
if (isset($_POST['enfermedad4'])) {
    $enfermedades .= 'Osteoporosis, ';
}
$enfermedades = rtrim($enfermedades, ', ');


$limitaciones = '';
if (isset($_POST['limitacion1'])) {
    $limitaciones .= 'Movilidad reducida, ';
}
if (isset($_POST['limitacion2'])) {
    $limitaciones .= 'Problemas de visión, ';
}
if (isset($_POST['limitacion3'])) {
    $limitaciones .= 'Problemas de audición, ';
}
if (isset($_POST['limitacion4'])) {
    $limitaciones .= 'Dificultades para hablar, ';
}
$limitaciones = rtrim($limitaciones, ', ');
  

// Preparar la consulta SQL para insertar los datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre, cedula, telefono, edad, fecha_nacimiento, genero, tipo_usuario, email, nombre_usuario,enfermedades,limitaciones, password)
VALUES ('$nombre', '$cedula', '$telefono', '$edad', '$fecha_nacimiento', '$genero', '$tipo_usuario', '$email','$nombre_usuario','$enfermedades','$limitaciones','$password')";
$res = mysqli_query($bd,$sql);

if (!$res){
    //echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    //<strong>Error</strong><br>La cedula registrada ya existe!!.
    //<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    //</button></div>";
    echo "<script>alert('La cedula registrada ya existe!!.')</script>";
    header('refresh:0; url=index.php');
}
else{
    //echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
    //<strong>Atención</strong><br>Registro adicionado con éxito!!.
    //<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    //</button></div>";
    echo "<script>alert('Registro adicionado con éxito!!.')</script>";
    header('refresh:0; url=index.php');
}

// Cerrar la conexión a la base de datos
mysqli_close($bd);
?>

<style>
    .alert {
  padding: 20px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  font-size: 16px;
  line-height: 1.5;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.alert-info {
  color: #0c5460;
  background-color: #d1ecf1;
  border-color: #bee5eb;
}

.alert button.btn-close {
  position: absolute;
  top: 20px;
  right: 20px;
}
</style>


