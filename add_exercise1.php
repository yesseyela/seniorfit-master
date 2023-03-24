<?php
    include 'conecta.php';
    $bd = conectar();

    $nombre_ejercicio = $_POST['exercise'];
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        $query = "INSERT INTO ejercicios (nombre_ejercicio,imagen) VALUES ('$nombre_ejercicio','$imgContenido')";
        $resultado = mysqli_query($bd, $query);

        if($resultado){
            echo "Subido Correctamente.";
        }else{
            echo "Intente nuevamente.";
        } 

    }else{
        echo "Por favor seleccione una imagen para subir.";
    }

    header('Location: add_exercise.php');
    mysqli_close($bd);
?>
