<?php

    //Falta agregar verificacion de email existente en la base de datos

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        if(empty($_POST['nombre'])){
            $Errores['nombre'] = 'Nombre vacio';
        } elseif (!preg_match('/^[A-Za-zÀ-ž\s]+$/',$_POST['nombre'])) {
            $Errores['nombre']=' El nombre solo debe contener letras. ';
        }

        if(empty($_POST['apellido'])){
            $Errores['apellido'] = 'Apellido vacio';
        } elseif (!preg_match('/^[A-Za-zÀ-ž\s]+$/',$_POST['apellido'])) {
            $Errores['apellido']=' El apellido solo debe contener letras. ';
        }
        
        if(empty($_POST['tel'])){
            $Errores['tel'] = 'Telefono vacio';
        }elseif(!is_numeric($_POST['tel'])){
            $Errores['tel'] = 'Debe contener solo numeros';
        }

        if(empty($_POST['email'])){
            $Errores['email'] = 'Email vacio';
        } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $Errores['email']='No respeta el formato de un email';
        }

        if(empty($_POST['pass'])){
            $Errores['pass'] = 'Password vacia';
        }

    }