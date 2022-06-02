<?php
    session_start();
    if(isset($_SESSION['usuario'])){
    unset($_SESSION['error']);
    
    }
    else{
    header("Location: login.php");
    }
//hace la conexion a la BD 
    require "conexion.php";


    $user_id=$_SESSION['id'];
    $polinomio=$_POST['Funcion'];
    $intervalo_a=$_POST['a'];
    $intervalo_b=$_POST['b'];
    $raiz=$_POST['Raiz'];
    $metodo=$_POST['metodo'];

    $sql = "INSERT INTO polinomio (user_id, polinomio, intervalo_a ,intervalo_b,raiz, metodo, fecha_registro)
    VALUES ('$user_id','$polinomio','$intervalo_a','$intervalo_b','$raiz','$metodo', NOW())";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "Datos insertados correctamente.<br>Último ID registrado: '$last_id'.";
        mysqli_close($conn);
        //Header( "Location: login.php");
        echo "<script type='text/javascript'>";
        echo "window.history.back(-1)";
        echo "</script>";
    } else {
        echo "Ocurrio un error: " . mysqli_error($conn);
        mysqli_close($conn);
    }
?>