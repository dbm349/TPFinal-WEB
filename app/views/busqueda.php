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
        <meta charset="utf-8">
        <title>PropWeb - Búsqueda</title>
</head>
<body>
    
    <?php
      
      try{

        $base=new PDO("mysql:host=localhost; dbname=propiedadesya", "root", "");

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $base->exec("SET CHARACTER SET utf8");

        $tamanio_paginas=3;//cantidad d epublicaciones en la pagina

        if(isset($_GET["pagina"])){

            if($_GET["pagina"]==1){

               header("Location:index.php");

           }else{

              $pagina=$_GET["pagina"];

          
             }
            }else{
          
           $pagina=1;

        }

        
        $empezar_desde=($pagina-1)*$tamanio_paginas;//almacena el registro desde el cual queiro mostrar los resultado

        $sql_total="SELECT * FROM propiedades ";

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount();

        $total_paginas=ceil($num_filas/$tamanio_paginas);

            echo "Cantidad de resultados encontrados: " . $num_filas . "<br>";
            echo "Mostrando la página: " . $pagina . "de ". $total_paginas . "<br>";


        
           $sql_limite="SELECT * FROM propiedades LIMIT $empezar_desde, $tamanio_paginas";

           $resultado=$base->prepare($sql_limite);

           $resultado->execute(array());


             while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

                echo "Operacion: " .$registro["tipo_operacion"]. "  Tipo:  " . $registro["tipo_propiedad"]. "<br>";
                /*MOSTRAR DATOS DE LA PROPIEDAD*/
            } 

             $resultado->closeCursor();
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
