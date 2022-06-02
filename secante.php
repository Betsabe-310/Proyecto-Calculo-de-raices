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

    <!-- Python -->
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <py-env>
        - sympy
        - numpy
    </py-env>
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

    <!-- BORRAR -->
    <py-script>
            from sympy import Symbol, sympify, diff, pprint
            from js import document
            from pyodide import create_proxy

            def create_html_element(i,a,c,b,fa,fb, error):
              tr_element = document.createElement('tr')
              i_element = document.createElement('td')
              a_element = document.createElement('td')
              c_element = document.createElement('td')
              b_element = document.createElement('td')
              fa_element = document.createElement('td')
              fc_element = document.createElement('td')
              fb_element = document.createElement('td')
              error_element = document.createElement('td')
              
              i_element.innerText = i
              a_element.innerText = a
              c_element.innerText = c
              b_element.innerText = b
              fa_element.innerText = fa
              fb_element.innerText = fb
              error_element.innerText = error

              tr_element.append(i_element)
              tr_element.append(a_element)
              tr_element.append(c_element)
              tr_element.append(b_element)
              tr_element.append(fa_element)
              tr_element.append(fb_element)
              tr_element.append(error_element)
              return tr_element

            
            def resolver(evento):
                tabla_body = document.getElementById("content")
                tabla_body.innerHTML = ""
                try:
                    x = Symbol('x')
                    a = int(document.getElementById("inicioa").value)
                    b = int(document.getElementById("iniciob").value)
                    tol = 0.0001
                    fx= document.getElementById("function").value
                    if fx=="":
                        document.getElementById("resp2").innerHTML =  "La función esta en blanco."
                        return -1
                    elif a=="" or b=="":
                        document.getElementById("resp2").innerHTML =  "El valor de inicio esta en blanco."
                        return -1
                    fx=sympify(fx)
                    for i in range(30):
                        fa = fx.subs(x,a).evalf()
                        fb = fx.subs(x,b).evalf()
                        c = b - ((fb*(a-b))/(fa-fb))
                        fc = fx.subs(x,c).evalf()
                        error = abs(b-a)
                        tabla_body.append(create_html_element(i,a,c,b,fa,fb, error))
                        a = b
                        b = c
                        if tol>abs(error) or fx.subs(x,c).evalf()==0:
                            break
                    element = document.getElementById("resp2")
                    element.innerHTML = c
                    create_form(fx, c)
                except Exception as e:
                    document.getElementById("resp2").innerHTML =  "Error en los datos ingresados."+e

            def create_form(funcion,c):
                div = document.getElementById("formulario")
                form = document.createElement("form")
                form.setAttribute("method", "post")
                form.setAttribute("action", "enviar.php")

                ecuacion = document.createElement("input")
                ecuacion.setAttribute("type", "text")
                ecuacion.setAttribute("name", "Funcion")
                ecuacion.setAttribute("value", funcion)

                raiz = document.createElement("input")
                raiz.setAttribute("type", "text")
                raiz.setAttribute("name", "Raiz")
                raiz.setAttribute("value", c)

                intervalo_a = document.createElement("input")
                intervalo_a.setAttribute("type", "text")
                intervalo_a.setAttribute("name", "a")
                intervalo_a.setAttribute("value", document.getElementById("inicioa").value)

                intervalo_b = document.createElement("input")
                intervalo_b.setAttribute("type", "text")
                intervalo_b.setAttribute("name", "b")
                intervalo_b.setAttribute("value", document.getElementById("iniciob").value)

                metodo = document.createElement("input")
                metodo.setAttribute("type", "text")
                metodo.setAttribute("name", "metodo")
                metodo.setAttribute("value", "secante")

                button = document.createElement("input")
                button.setAttribute("type", "submit")
                button.setAttribute("value", "Guardar")
                button.className = "btn btn-light"

                form.append(ecuacion)
                form.append(intervalo_a)
                form.append(intervalo_b)
                form.append(metodo)
                form.append(raiz)
                form.append(button)

                div.append(form)

            def setup():
                document.getElementById("resp2").innerHTML =  ""
                proxy = create_proxy(resolver)

                change_element = document.getElementById("boton")
                change_element.addEventListener('click', proxy)

            setup()
        </py-script>
        <div class="espacio_lados">
        <h1 class="titulo_metodo">SECANTE</h1>
        <div id="resp"></div>
        <label for="function">Agrega tu función: </label>
        <input type="text" id="function">
        <label for="inicioa">Valor [a: </label>
        <input type="text" id="inicioa">
        <label for="iniciob">Valor b]: </label>
        <input type="text" id="iniciob">
        <button id="boton" class="btn btn-light">Resolver</button>
        <div id="resp2"></div>
        </div>

        <!--Tabla para el método -->
        <table class="table table-dark">
          <thead>
              <tr>
                  <th scope="col">i</th>    
                  <th scope="col">a</th>
                  <th scope="col">c</th>
                  <th scope="col">a</th>
                  <th scope="col">f(a)</th>
                  <th scope="col">f(b)</th>
                  <th scope="col">Error</th>
              </tr>
          </thead>
          <tbody id="content">
          </tbody>
      </table>
      <br/>
      <br/>
      <div id="formulario">
      </div>              
    <!-- Bootstrap JS-->
    <!--script src="bootstrap5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>