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

        $sql_total="SELECT * FROM propiedades order by precio desc ";

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount();

        $total_paginas=ceil($num_filas/$tamanio_paginas);

            echo "Cantidad de resultados encontrados: " . $num_filas . "<br>";
            echo "Mostrando la página: " . $pagina . "de ". $total_paginas . "<br>";


        
           $sql_limite="SELECT * FROM propiedades LIMIT $empezar_desde, $tamanio_paginas";

           $resultado=$base->prepare($sql_limite);

           $resultado->execute(array());


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
