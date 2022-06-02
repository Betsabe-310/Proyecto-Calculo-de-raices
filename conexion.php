<?php
    $server="localhost";
    $usuario="root";
    $password="";
    //Crear conexion
    $conn = mysqli_connect($server, $usuario,$password);
    //verificar conexion
    if(!$conn){
        //mostrar errror
        die("No se pudo enlazar la conexion." .mysqli_connect_error());
    }

    $sql = "use usuario";
    //Ejecutamos el codigo
    if(mysqli_query($conn,$sql)) {
        //echo "Se selecciono la base de datos";
    }
    else{
        echo "Error al seleccionar la BD" .mysqli_error($conn);
    }
?>