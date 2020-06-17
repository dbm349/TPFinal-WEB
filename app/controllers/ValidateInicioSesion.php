<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST['email'])){
        $ErroresInicio['email'] = 'Email vacio';
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $ErroresInicio['email']='No respeta el formato de un email';
    }

    if(empty($_POST['pass'])){
        $ErroresInicio['pass'] = 'Password vacia';
    }

}