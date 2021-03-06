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

    <!-- Notacion matematica con JS(requiere Latex)-->
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

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
    <!--BISECCIÓN-->
    <div class="espacio_lados">
    <h1>Bisección </h1>
      <p>
           <!--Ecuaciones en linea-->
          Si \(f(x)\) es real y continúa en el intervalo que va desde \(x_l\) hasta \(x_u\) y \(f(x_l)\) y \(f(x_u)\) tienen signos opuestos, es decir,
          \(f(x_l )f(x_u )&lt; 0\)
          Entonces hay al menos una raíz real entre \(x_l\) y \(x_u\).
          Los  métodos de búsqueda incremental aprovechan esta característica localizando un intervalo en el que la función cambie de signo. 
          Entonces, la localización del cambio de signo (y, en consecuencia, de la raíz) se logra con más exactitud al dividir el intervalo en
           varios subintervalos. Se investiga cada uno de estos subintervalos para encontrar el cambio de signo. El proceso se repite y la aproximación 
           a la raíz mejora cada vez más en la medida que los subintervalos se dividen en intervalos cada vez más pequeños.
          El método de bisección, conocido también como de corte binario, de partición de intervalos o de Bolzano, es un tipo de búsqueda incremental
           en el que el intervalo se divide siempre a la mitad. Si la función cambia de signo sobre un intervalo, se evalúa el valor de la función en el punto medio. 
           La posición de la raíz se determina situándola en el punto medio del subintervalo, dentro del cual ocurre un cambio de signo. El proceso se repite hasta
            obtener una mejor aproximación. 
      
      </p>
      <div>
        <ul>
        <li>Paso1. Elija valores iniciales inferior, \(x_l\), y superior, \(x_u\), que encierren la raíz, de forma tal que la función cambie de signo en el intervalo. 
        Esto se verifica comprobando que \(f(x_l) f(x_u) < 0.\)</li>
        <li>Paso 2. Una aproximación de la raíz \(x_r\) se determina mediante:
          \(x_r=\frac{x_l+x_u}{2}\)
        </li>
        <li>Paso 3. Realice las siguientes evaluaciones para determinar en qué subintervalo está la raíz:
          Si \(f(x_l) f(x_r)&lt;0\), entonces la raíz se encuentra dentro del subintervalo inferior o izquierdo. Por lo tanto, haga \(x_u=x_r\) y vuelva al paso 2.
          Si \(f(x_l) f(x_r)&gt;0\), entonces la raíz se encuentra dentro del subintervalo superior o derecho. Por lo tanto, haga  \(x_l=x_r\) y vuelva al paso 2.
          Si \(f(x_l) f(x_r)=0\), la raíz es igual a \(x_r\); termina el cálculo.</li>
        </ul>
        </div>
    <h3> Criterios de paro y estimación de errores</h3>
           <p>
            Debemos desarrollar un criterio objetivo para decidir cuándo debe terminar el método. Una sugerencia inicial sería finalizar el cálculo cuando el error verdadero se encuentre por debajo de algún nivel prefijado. Podemos decidir que el método termina cuando 
            se alcance un error más bajo, por ejemplo, al 0.1%. Dicha estrategia es inconveniente, ya que la estimación del error se basaría en el conocimiento del valor verdadero de la raíz de la función. Éste no es el caso de una situación real, 
            ya que no habría motivo para utilizar el método si conocemos la raíz. Por lo tanto, necesitamos estimar el error de forma tal que no se necesite el conocimiento previo de la raíz. Se puede calcular el error relativo porcentual \(ε_a\) de la siguiente manera:
            <!--formula criterios de paro(Latex)-->
            $$\epsilon_\alpha \mid \frac{x_{r}^{nuevo}-x_{r}^{anterior}}{x_r^{nuevo}}\mid 100\% $$

            Donde \(x_r^{nuevo}\)  es la raíz en la iteración actual y \(x_r^{anterior}\) es el valor de la raíz en la iteración anterior. Se
            utiliza el valor absoluto, ya que por lo general importa sólo la magnitud de \(ε_a\) sin considerar su signo. Cuando \(ε_a\) es menor que un valor previamente fijado \(ε_s\)termina el cálculo.
            Aunque el error aproximado no proporciona una estimación exacta del error verdadero, la figura sugiere que \(ε_a\) toma la tendencia general descendente de \(ε_t\). Además, la gráfica muestra 
            una característica muy interesante: que \(ε_a\) siempre es mayor que \(ε_t\). Por lo tanto, cuando \(ε_a\) es menor que \(ε_s\) los cálculos se pueden terminar, con la confianza de saber que la raíz es al menos tan exacta como el nivel aceptable predeterminado.
            Aunque no es conveniente aventurar conclusiones generales a partir de un solo ejemplo, es posible demostrar que \(ε_a\) siempre será mayor que \(ε_t\) en el método de bisección. 
            Esto se debe a que cada vez que se encuentra una aproximación a la raíz cuando se usan bisecciones como \(x_r=\frac{(x_l+x_u)}{2}\) se sabe que la raíz verdadera se halla en algún lugar dentro del intervalo de \(x_r=\frac{(x_u+x_l)}{2}=\frac{∆x}{2}\) .Por lo tanto, la raíz debe situarse dentro de \(±\frac{∆x}{2}\) de la aproximación.
            Debido a que\(\frac{∆x}{2}=x_r^{nuevo}-x_r^{anterior}\) la ecuación proporciona un límite superior exacto del error verdadero. Para que se rebase este límite, la raíz verdadera tendría que estar fuera del intervalo que la contiene, lo cual, por definición, jamás 
            ocurrirá en el método de bisección. Aunque el método de bisección por lo general es más lento que otros métodos, la claridad del análisis de error ciertamente es un aspecto positivo que puede volverlo atractivo para ciertas aplicaciones.
            Antes de utilizar el programa para la bisección, debemos observar que las siguientes relaciones.
            </p>
            <!--formula (Latex)--> 
            $$x_r^{nuevo}-x_r^{anterior}= \frac{(x_u+x_l)}{2}$$
            $$x_r^{nuevo}=\frac{(x_l+x_u)}{2}$$
      
    
        <img src="Imagenes/Imagen1.png" alt="Grafica">
            <p>Tres formas en que un intervalo puede encerrar a la raíz. En a) el valor verdadero está en el centro del intervalo, mientras que en b) y 
            c) el valor verdadero está cerca de los extremos. Observe que la diferencia entre el valor verdadero y el punto medio del intervalo jamás sobrepasa la longitud media del intervalo, o \(\frac{∆x}{2}\)</p>
            <img src="Imagenes/Imagen2.png" alt="Grafica">
            <!--FALSA POSICIÓN-->
    <h1>Método de falsa posición</h1>
        <p>
          Aun cuando la bisección es una técnica perfectamente válida para determinar raíces, su método de aproximación por “fuerza bruta” es relativamente ineficiente. 
          La falsa posición es una alternativa basada en una visualización gráfica. Un inconveniente del método de bisección es que al dividir el intervalo de \(x_l\) a \(x_u\) 
          en intervalos iguales, no se toman en consideración las magnitudes de \(f(x_l)\) y \(f(x_u)\). Por ejemplo, si \(f(x_l)\) está mucho más cercana a cero que \(f(x_u)\), es lógico que la 
          raíz se encuentre más cerca de \(x_l\) que de \(x_u\). Un método alternativo que aprovecha esta visualización gráfica consiste en unir \(f(x_1)\) y \(f(x_u)\) con una línea recta. 
          La intersección de esta línea con el eje de las x representa una mejor aproximación de la raíz. El hecho de que se reemplace la curva por una línea recta da una 
          “falsa posición” de la raíz; de aquí el nombre de método de la falsa posición, o en latín, regula falsi. También se le conoce como método de interpolación lineal.
        Usando triángulos semejantes, la intersección de la línea recta con el eje de las \(x\) se estima mediante
        </p>
        <img src="Imagenes/Imagen3.png" alt="Grafica">
          <p>
            $$\frac{f(x_l)}{(x_r-x_l )}=\frac{f(x_u)}{(x_r-x_u)}$$
          Ésta es la fórmula de la falsa posición. El valor de \(x_r\) calculado con la ecuación, reemplazará, después, a cualquiera de los dos valores iniciales, \(x_l\) o \(x_u\), 
          y da un valor de la función con el mismo signo de \(f(x_r)\). De esta manera, los valores \(x_l\) y \(x_u\) siempre encierran la verdadera raíz. El proceso se repite hasta que la 
          aproximación a la raíz sea adecuada. El algoritmo es idéntico al de la bisección, excepto en que la ecuación
          se usa en el paso 2. Además, se usa el mismo criterio de terminación para concluir los cálculos.
          </p>
        <img src="Imagenes/Imagen4.png" alt="Grafica">
        <p>
          Recuerde que en el método de bisección el intervalo entre \(x_l\) y \(x_u\) se va haciendo más pequeño durante los cálculos.
           Por lo tanto, el intervalo, como se definió por \(\frac{∆x}{2}=\frac{(|x_u-x_l|)}{2}\)  para la primera iteración, proporciona una
          medida del error en este método. Éste no es el caso con el método de la falsa posición, ya que uno de los valores iniciales 
          puede permanecer fijo durante los cálculos, mientras que el otro converge hacia la raíz.
          Se obtiene una idea más completa de la eficiencia de los métodos de bisección y de falsa posición al observar la figura.
        </p>
        <img src="Imagenes/Imagen5.png" alt="Grafica">
        <h3>Desventajas del método de falsa posición </h3>
        <p>Aunque el método de la falsa posición parecería ser siempre la mejor opción entre los métodos cerrados, hay casos donde funciona de manera deficiente.
           En efecto, hay ciertos casos donde el método de bisección ofrece mejores resultados.
          </p>
        <h3>Falsa posición modificada</h3>
        <p>Un problema potencial en la implementación del método de Newton-Raphson es la evaluación de la derivada. Aunque esto no es un inconveniente para los polinomios
           ni para muchas otras funciones, existen algunas funciones cuyas derivadas en ocasiones resultan muy difíciles de calcular. En dichos casos, la derivada se puede 
           aproximar mediante una diferencia finita dividida hacia atrás.
          </p>
          <h1>El método de la secante</h1>
            <p>Un problema potencial en la implementación del método de Newton-Raphson es la evaluación de la derivada. Aunque esto no es un inconveniente para los polinomios ni para muchas otras funciones, 
              existen algunas funciones cuyas derivadas en ocasiones resultan muy difíciles de calcular. En dichos casos, la derivada se puede aproximar mediante una diferencia finita dividida hacia atrás.
            </p>
            $$f'(x_i)\cong\frac{f(x_{i-1})-f(x_i)}{x_{i-1}-x_i}$$
            <p>Esta aproximación se sustituye en la ecuación \(x_{i+1}=x_{i}-\frac{f(x_i)}{f'(x_i)}\) para obtener la siguiente ecuación iterativa:</p>
            <!--formula --> 
            $$x_{i+1}=x_i-\frac{f(x_i)(x_{i-1}-x_i)}{f'(x_{i-1})-f(x_i)}$$
            <p>
              La ecuación es la fórmula para el método de la secante. Observe que el método requiere de dos valores iniciales de \(x\). 
              Sin embargo, debido a que no se necesita que \(f(x)\) cambie de signo entre los valores dados, este método no se clasifica como un método cerrado.
            </p>
            <img src="Imagenes/Imagen6.png" alt="Grafica">
            <p>
              Aunque el método de la secante sea divergente, cuando converge lo hace más rápido que el método de la falsa posición. Por ejemplo, 
              en la figura siguiente se muestra la superioridad del método de la secante. La inferioridad del método de la falsa posición se debe 
              a que un extremo permanece fijo para mantener a la raíz dentro del intervalo. Esta propiedad, es una ventaja porque previene la divergencia, 
              tiene una desventaja en relación con la velocidad de convergencia; esto hace de la diferencia finita estimada una aproximación menos exacta que la derivada.
            </p>
            <img src="Imagenes/Imagen7.png" alt="Grafica">
            </div>

    <!-- TERMINA TEXTO METODOS-->
    <!-- Bootstrap JS-->
    <!--script src="bootstrap5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>