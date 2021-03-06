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
    <h1 class="titulo_metodo">BIENVENIDO</h1>
    <p>Aquí podrás encontrar las raíces de tus funciones, utilizando los métodos de Bisección, Newton Raphson, Falsa posición y Secante.</p>
    <p>Estos métodos están programados en Python, con la ayuda de una librería llamada SymPy, esta librería se desarrollo para matemáticas simbólicas, lo que nos da una gran facilidad para resolver derivadas, integrales, factorización, límites, series de Taylor, solución de ecuaciones entre muchos otros temas que se pueden ver en la página principal.</p>
    <p>Debido al lenguaje nosotros tenemos que adecuarnos a la sintaxis de Python para poder ingresar nuestros datos, NO podemos ingresar funciones con más de una variable, para poder elevar a una potencia determinada, colocar el coeficiente de una variable o la raíz debes de utilizar la siguiente sintaxis:</p>
    <img src="Imagenes/sintaxis.png" alt="sintaxis">
    <p>Como se muestra en la imagen anterior no podemos agregar funciones con más de 1 variable, además si queremos agregar el coeficiente de una variable debemos de hacerlo explícitamente agregando un asterisco que indique la multiplicación, para elevar a una potencia debemos de usar dos asteriscos o el acento circunflejo (^) y para una raíz podemos utilizar la función sqrt().</p>
    <p>Además de respetar esta sintaxis para cada método debemos agregar los parámetros necesarios, como es la función, el punto inicial o el intervalo para que pueda ser ejecutado el código.</p>
    <p>Si nosotros necesitamos guardar los valores, al final de la ejecución, se generará un formulario con los parámetros para la ejecución del método y si damos click en guardar, se guardarán en la base de datos y en el menú “tabla de datos” podremos ver el histórico de las consultas que hacemos.</p>
    </div>

    <!-- TERMINA TEXTO METODOS-->
    <!-- Bootstrap JS-->
    <!--script src="bootstrap5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>