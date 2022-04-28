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
//Crear base de datos
$sql = "CREATE DATABASE usuario";
//ejecutar el codigo para crear la base de datos
 if (mysqli_query($conn, $sql)){
     echo "La base de datos se creo correctamente.";
 } else {
     echo "Error al crear la base de datos:  ".mysqli_error($conn);
    }
    $sql = "use usuario";
    //Ejecutamos el codigo
    if(mysqli_query($conn,$sql)) {
        echo "Se selecciono la base de datos";
    } else{
        echo "Error al seleccionar la BD" .mysqli_error($conn);
    }
       //Creamos la tabla
       $sql = "CREATE TABLE datos( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(30) NOT NULL,
       apellido varchar(30) NOT NULL,
       email VARCHAR(50),
       pass VARCHAR(16),
       fecha_registro TIMESTAMP
       )";
       //Ejecutamos el codigo
       if (mysqli_query($conn, $sql)){
           echo "La tabla usuario se creo satisfactoriamente";
       } else{
           echo "Error creando taba" .mysqli_error($conn);
       }
    mysqli_close($conn);
?>