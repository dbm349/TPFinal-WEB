<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Users;

class ControladorUsuarios extends Controller
{

    public function __construct()
    {
        $this->model = new Users();
    }

    public function ingresar()
    {
        return view('usuario.ingresar');
    }

    public function registrar()
    {
        return view('usuario.create');
    }

    public function validarUsuarioNuevo()
    {
        $Errores =  array();
        require 'app/controllers/ValidateUsuarioNuevo.php';

        if (empty($Errores)){ 

            $usuario = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'mail' => $_POST['email'],
                'telefono' => $_POST['tel'],
                'pass' => md5($_POST['pass'])
            ];

            $this->model->insert($usuario);
            return view('usuario.ingresar');

        }else{
            return view('usuario.create', [
                                            'errores'=> $Errores,
                                            'nombre' => $_POST['nombre'],
                                            'apellido' => $_POST['apellido'],
                                            'mail' => $_POST['email'],
                                            'telefono' => $_POST['tel']
            ]);
        }
        
    }

    public function validarInicioSesion()
    {
        $ErroresInicio =  array();
        require 'app/controllers/ValidateInicioSesion.php';

        if(empty($ErroresInicio)){

            $mail = $_POST['email'];
            $pass = md5($_POST['pass']);
            $user = [
                    'mail' => $mail,
                    'pass' => $pass
            ];

            $existe = $this->model->BuscarUsuario($user);
            if($existe){
                session_start();
                $_SESSION['sesion_iniciada'] = true;
                $_SESSION['nombre'] = $mail;
                return view('index'); /*FALTA*/
            }
            else{
                $ErroresInicio['email'] = 'El usuario o contraseña es incorrecto';
                return view('usuario.ingresar',['mail'=>$mail,
                                                'erroresInicio'=>$ErroresInicio
                                                ]);
            }
        }else{
            return view('usuario.ingresar',['mail'=>$mail,
                                            'erroresInicio'=>$ErroresInicio
            ]);
        }
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
        return view('index');
    }
}
