<?php
//hace la conexion a la BD 
    require "conexion.php";


    $name=$_POST['name'];
    $lastname=$$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql = "INSERT INTO datos (nombre, apellido, email,pass)
    VALUES ('$name','$lastname','$email','$password')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "Datos insertados correctamente.<br>Último ID registrado: '$last_id'.";
        mysqli_close($conn);
        Header( "Location: login.php");
    } else {
        echo "Ocurrio un error: " . mysqli_error($conn);
        mysqli_close($conn);
    }
?>