<!--{% extends "base.html" %}

{% block title %}Lista de Tareas{% endblock %}

{% block header %}
    {{ include('partials/nav.html') }}
{% endblock %}

{% block head %}
    {{ parent() }}
    <meta name="keywords" content="PAW,2018,Templates,PHP">
{% endblock %}

{% block main %}
<h2>Resultados de Busqueda</h2>


<table>
    <thead>
        <tr>
            <th scope="col">Direccion</th>
        </tr> 
    </thead>

    <tbody>
        {% for propiedad in propiedades %}
        <tr>
            <td>{{propiedad.direccion}}</td>     
        </tr>
        {% else %}
            <span>No hay resultados en la busqueda</span>
        {% endfor %}
    </tbody>
</table>
{% endblock %}-->
<!DOCTYPE html>
<html>
<head>
    {% block head %}
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - Paginación</title>
    {% endblock %}
</head>
<body>
    
    <?php
      
      try{

        $base=new PDO("mysql:host=localhost; dbname=propiedadesya", "root", "");

        $base->setAtttribute(PDO::ATTR_ERRORMODE, PDO::ERRMODE_EXCEPTION);

        $base->exec("SET CHARACTER SET utf8");

        $tamanio_paginas=3;//cantidad de publicaciones en la pagina

        if(isset($_GET["pagina"])){

            if($_GET["pagina"]==1){

                header("Location:index.html");

            }else{

                $pagina=$_GET["pagina"];

          
            }
        }else{
            $pagina=1;

        }

        
        $empezar_desde=($pagina-1)*tamanio_paginas;

        $sql_total="SELECT * FROM propiedades ";

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount();

        $total_paginas=ceil($num_filas/tamanio_paginas);

            echo "Cantidad de resultados encontrados: " . $num_filas . "<br>";
            echo "Mostrando la página: " . $pagina . "de ". $total_paginas . "<br>";


            $resultado->closeCursor();

            $sql_limite="SELECT * FROM propiedades  LIMIT $empezar_desde, $tamanio_paginas";

            $resultado=$base->prepare($sql_limite);

            $resultado->execute(array());



            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

                echo "Tipo propiedad: " . $registro["tipo_propiedad"];
                /*MOSTRAR DATOS DE LA PROPIEDAD*/
            }


      }catch (Exception $e){
        echo "Linea de error:" . $e->getLine();

      }
 

//--------------------------------PAGINACION----------------------------------------------//

      for($i=1; $i<=$total_paginas; $i++){

        echo "<a href='?pagina="  . $i . "'>" . $i . "</a> ";
      }

    ?>
</body>
</html>
