<?php
function conectar() {
    $bd = mysqli_connect("localhost","root","","seniorfit");
    if (!$bd) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    mysqli_set_charset($bd, "utf8");
    return $bd;
}
?>
