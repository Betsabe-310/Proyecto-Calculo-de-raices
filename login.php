<?php
    session_start();

    if(isset($_SESSION['error'])){
            
    }
    else{
      $_SESSION['error'] = "";
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
    

    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">

    <div class="card mb-5 p-5 bg-dark bg-gradient text-white col-md-4">
    <div class="card-header text-center">
    <h3>Iniciar sesión </h3>
    </div>
    <div class="card-body mt-3">
      <form name="login" action="iniciarsesion.php" method="post">
        <div class="input-group form-group mt-3">
        <input type="text" class="form-control text-center p-3"
        placeholder="Usuario" name="username">
        </div>
        <div class="input-group form-group mt-3">
        <input type="password" class="form-control text-center p-3"
        placeholder="Contraseña" name="password">
        </div>
        <div class="text-center">
        <input type="submit" value="Acceder"
        class="btn btn-primary mt-3 w-100 p-2" name="login-btn">
        </div>
      </form>
    
    </div>
    <div class="card-footer p-3">
    <div class="d-flex justify-content-center">
    <div class="text-primary">Si no estas registrado, <a href="registro.php">registrate aquí</a>.</div>
    </div>
    </div>

    <div class="card-footer p-3">
    <div class="d-flex justify-content-center">
    <div class="text-primary"><?php $_SESSION["error"]?></div>
    </div>
    </div>

    </div>

    </div>
    <!-- Bootstrap JS-->
    <!--script src="bootstrap5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>