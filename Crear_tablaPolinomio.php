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
        echo "Se selecciono la base de datos";
    } else{
        echo "Error al seleccionar la BD" .mysqli_error($conn);
    }
       //Creamos la tabla que guarda los datos ingresados para aprx polin
       $sql = "CREATE TABLE polinomio( id INT UNSIGNED AUTO_INCREMENT,
       user_id  INT NOT NULL,
       grado1 FLOAT(5,5) ,
       grado2 FLOAT(5,5),
       grado3 FLOAT(5,5),
       grado4 FLOAT(5,5),
       grado5 FLOAT(5,5),
       constante FLOAT(5,5),
       intervalo_a FLOAT(5,5),
       intervalo_b FLOAT(5,5),
       raiz FLOAT(5,5),
       metodo VARCHAR(15),
       fecha_registro TIMESTAMP,
       PRIMARY KEY (id),
       CONSTRAINT FK_datosPolinomio
       FOREIGN KEY (id) 
       REFERENCES datos(id)
       )";
       //$sql = "DROP TABLE polinomio";
       //Ejecutamos el codigo
       if (mysqli_query($conn, $sql)){
           echo "La tabla se creo satisfactoriamente";
       } else{
           echo "Error creando taba" .mysqli_error($conn);
       }
    mysqli_close($conn);
?>