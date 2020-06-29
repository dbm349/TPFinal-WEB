<?php

//FALTA EN ALGUNAS VALIDACIONES VERIFICAR COSAS
//FALTA VALIDACION DE IMAGENES PARA GUARDAR EN BD

    $si_no = array("si","no");
    $moneda = array("dolar","peso");
    $op = array("venta","alquiler");
    $prop = array("casa","departamento","lote","galpon","local","quinta","cochera");

    if (isset($_POST['submit'])){

        if(!empty($_POST['operacion'])){
            if(in_array($_POST['operacion'],$op)){
                $propiedad['tipo_operacion'] = $_POST['operacion'];
            }else{
                $Errores['operacion'] = 'La opcion debe ser (venta/alquiler)';
            }
        }else{
            $Errores['operacion']='Operacion vacio';
        }
    
        if(!empty($_POST['propiedad'])){
            if(in_array($_POST['propiedad'],$prop)){
                $propiedad['tipo_propiedad'] = $_POST['propiedad'];
            }else{
                $Errores['propiedad'] = 'La opcion debe ser (casa/departamento/lote/galpon/local/quinta/cochera")';
            }
        }else{
            $Errores['propiedad']='Propiedad Vacio';
        }

        if(empty($_POST['direccion'])){
            $Errores['direccion'] = 'direccion vacia';
        } elseif (!preg_match('/^[A-Za-zÀ-ž0-9\s]+$/',$_POST['direccion'])) {
            $Errores['direccion']=' La direccion solo debe contener letras y numeros. ';
        } else{
            $propiedad['direccion'] = $_POST['direccion'];
        }

        if(empty($_POST['localidad'])){
            $Errores['localidad'] = 'localidad vacio';
        } elseif (!preg_match('/^[A-Za-zÀ-ž\s]+$/',$_POST['localidad'])) {
            $Errores['localidad']=' El localidad solo debe contener letras. ';
        }else{
            $propiedad['localidad'] = $_POST['localidad'];
        }

        if(empty($_POST['provincia'])){
            $Errores['provincia'] = 'provincia vacio';
        } elseif (!preg_match('/^[A-Za-zÀ-ž\s]+$/',$_POST['provincia'])) {
            $Errores['provincia']=' La provincia solo debe contener letras. ';
        }else{
            $propiedad['provincia'] = $_POST['provincia'];
        }
        
        if(!empty($_POST['supTotal'])){
            if(is_numeric($_POST['supTotal'])){
                $propiedad['supTotal'] = $_POST['supTotal'];
            }else{
                $Errores['supTotal'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['supTotal'] = NULL;
        }

        if(!empty($_POST['supCub'])){
            if(is_numeric($_POST['supCub'])){
                $propiedad['supCub'] = $_POST['supCub'];
            }else{
                $Errores['supCub'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['supCub'] = NULL;
        }

        if(!empty($_POST['piso'])){
            if(is_numeric($_POST['piso'])){
                $propiedad['piso'] = $_POST['piso'];
            }else{
                $Errores['piso'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['piso'] = NULL;
        }

        if(!empty($_POST['ambientes'])){
            if(is_numeric($_POST['ambientes'])){
                $propiedad['ambientes'] = $_POST['ambientes'];
            }else{
                $Errores['ambientes'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['ambientes'] = NULL;
        }

        if(!empty($_POST['dormitorios'])){
            if(is_numeric($_POST['dormitorios'])){
                $propiedad['dormitorios'] = $_POST['dormitorios'];
            }else{
                $Errores['dormitorios'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['dormitorios'] = NULL;
        }

        if(!empty($_POST['banios'])){
            if(is_numeric($_POST['banios'])){
                $propiedad['banios'] = $_POST['banios'];
            }else{
                $Errores['banios'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['banios'] = NULL;
        }

        if(!empty($_POST['patio'])){
            if(in_array($_POST['patio'],$si_no)){
                $propiedad['patio'] = $_POST['patio'];
            }else{
                $Errores['patio'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['patio'] = NULL;
        }

        if(!empty($_POST['piscina'])){
            if(in_array($_POST['piscina'],$si_no)){
                $propiedad['piscina'] = $_POST['piscina'];
            }else{
                $Errores['piscina'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['piscina'] = NULL;
        }

        if(!empty($_POST['garage'])){
            if(in_array($_POST['garage'],$si_no)){
                $propiedad['garage'] = $_POST['garage'];
            }else{
                $Errores['garage'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['garage'] = NULL;
        }

        if(!empty($_POST['parrilla'])){
            if(in_array($_POST['parrilla'],$si_no)){
                $propiedad['parrilla'] = $_POST['parrilla'];
            }else{
                $Errores['parrilla'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['parrilla'] = NULL;
        }

        if(!empty($_POST['parque'])){
            if(in_array($_POST['parque'],$si_no)){
                $propiedad['parque'] = $_POST['parque'];
            }else{
                $Errores['parque'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['parque'] = NULL;
        }

        if(!empty($_POST['quincho'])){
            if(in_array($_POST['quincho'],$si_no)){
                $propiedad['quincho'] = $_POST['quincho'];
            }else{
                $Errores['quincho'] = 'La opcion debe ser (si/no)';
            }
        }else{
            $propiedad['quincho'] = NULL;
        }

        if(!empty($_POST['antiguedad'])){
            if(is_numeric($_POST['antiguedad'])){
                $propiedad['antiguedad'] = $_POST['antiguedad'];
            }else{
                $Errores['antiguedad'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['antiguedad'] = NULL;
        }

        if(!empty($_POST['precio'])){
            if(is_numeric($_POST['precio'])){
                $propiedad['precio'] = $_POST['precio'];
            }else{
                $Errores['precio'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['precio'] = NULL;
        }

        if(!empty($_POST['expensas'])){
            if(is_numeric($_POST['expensas'])){
                $propiedad['expensas'] = $_POST['expensas'];
            }else{
                $Errores['expensas'] = 'Debe ser un numero';
            }
        }else{
            $propiedad['expensas'] = NULL;
        }

        if(!empty($_POST['moneda'])){
            if(in_array($_POST['moneda'],$moneda)){
                $propiedad['moneda'] = $_POST['moneda'];
            }else{
                $Errores['moneda'] = 'La opcion debe ser (dolar/peso)';
            }
        }else{
            $propiedad['moneda'] = NULL;
        }

        if(!empty($_POST['descripcion'])){
            $propiedad['descripcion'] = $_POST['descripcion'];
        }else{
            $propiedad['descripcion'] = NULL;
        }

        /*
        if (!empty($_POST['fotos'])){
            $extensionArchivo = pathinfo($_FILES["fotos"]["name"], PATHINFO_EXTENSION);
            if($extensionArchivo != "jpg" && $extensionArchivo != "png" ) {
                $Error['fotos'] = 'La imagen tiene que ser formato jpg o png';
            }
            if( $_FILES['fotos']['size'] > 10000*1024){
                $Error['fotos'] = 'La imagen tiene que tener un tamaño menor a 10MB';
            }
        }*/
    }