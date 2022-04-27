<?php

session_start();
require "conexion.php";
$sql = "SELECT * FROM datos";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // Salen los datos de cada fila
    while($tupla = $result->fetch_assoc()) {
        if($tupla['email']==$_POST['username'] && $tupla['pass']==$_POST['password']){
			$_SESSION['usuario']=$_POST['username'];
            $_SESSION['user']=$tupla['nombre'];
            $_SESSION['id']=$tupla['id'];
            mysqli_close($conn);
            break 1;
            
		}
    }
    $_SESSION['error']= "Hubo un error, no se encontraron los datos registrados.";
    mysqli_close($conn);
    header("Location: index.php");
} else {
    $_SESSION['error']= "No hay información en la BD.";
    mysqli_close($conn);
    header("Location: login.php");
}
?>