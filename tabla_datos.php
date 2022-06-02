<?php
    session_start();
    if(isset($_SESSION['usuario'])){
      unset($_SESSION['error']);
      
    }
    else{
      header("Location: login.php");
    }
?>
<!doctype html>
<html>
  <head>
    <!-- Requirido p boostrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Mi CSS-->
    <link rel="stylesheet" href="styles.css">
    
    <!-- Mi Javascript-->
    <script src="script.js"></script> 
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Métodos Numéricos Acatlán</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="teoria.php">Teoría</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Métodos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="biseccion.php">Bisección</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="falsa_posicion.php">Falsa Posición</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="newton_rapson.php">Newton</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="secante.php">Secante</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tabla_datos.php">Datos de usuario</a>
            </li>
        </ul>
        <span class="navbar-text">
          Bienvenid@ ,<?php echo $_SESSION["user"]?>. &nbsp  
        </span>
        <span class="navbar-text">
             <a href="salir.php">Salir</a>
        </span>
        </div>
    </div>
    </nav>  

    <!--EMPIEZA TEXTO METODOS -->
    <div class="espacio_lados">
    <?php
    require "conexion.php";
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM polinomio where user_id = ".$user_id;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Salen los datos de cada fila
        echo "<h1 class='titulo_metodo'>Tabla de datos</h1>";
        echo "<table class='table table-dark'>";
        echo "<thead>";
        echo "<tr>";
        echo '<th scope="col">ID</th>';
        echo '<th scope="col">Polinomio</th>';
        echo '<th scope="col">intervalo_a</th>';
        echo '<th scope="col">intervalo_b</th>';
        echo '<th scope="col">Raiz</th>';
        echo '<th scope="col">Método</th>';
        echo '<th scope="col">Fecha</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody id="content">';
        
        while($tupla = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<th scope="col">'.$tupla['user_id'].'</th>';
            echo '<th scope="col">'.$tupla['polinomio'].'</th>';
            echo '<th scope="col">'.$tupla['intervalo_a'].'</th>';
            echo '<th scope="col">'.$tupla['intervalo_b'].'</th>';
            echo '<th scope="col">'.$tupla['raiz'].'</th>';
            echo '<th scope="col">'.$tupla['metodo'].'</th>';
            echo '<th scope="col">'.$tupla['fecha_registro'].'</th>';
            echo '</tr>';
        }
        echo '</tbody>';
        mysqli_close($conn);
    } else {
        echo "<h1 class='titulo_metodo'>No hay información en la BD.</h1>";
        mysqli_close($conn);
    }
    ?>
    </div>

    <!-- TERMINA TEXTO METODOS-->
    <!-- Bootstrap JS-->
    <!--script src="bootstrap5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>