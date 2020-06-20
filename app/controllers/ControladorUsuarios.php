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

    

    /**--------------REGISTRO DE USUARIO ---------------*/
    public function registrar()
    {
        return view('usuario.create');
    }

    public function validarUsuarioNuevo()
    {
        $Errores =  array();
        require 'app/controllers/ValidateUsuarioNuevo.php';

        /*Si no hay errores guardo usuario nuevo en la BD*/ 
        if (empty($Errores)){
            $usuario = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'mail' => $_POST['email'],
                'telefono' => $_POST['tel'],
                'pass' => md5($_POST['pass'])
            ];
            $this->model->insert($usuario); /*FALTA VALIDAR SI YA EXISTE EL MAIL DE USUARIO EN LA BASE DE DATOS*/
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

    /**---------------INICIO DE SESION ---------------*/

    public function ingresar()
    {
        return view('usuario.ingresar');
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
                $_SESSION['usuario'] = $mail;
                $inicio = true;
                return view('index', ['inicio'=>$inicio]);
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

    /**------------------------CIERRE DE SESION ---------------------*/
    public function cerrarSesion(){
        session_unset();
        session_destroy();
        $inicio = false;
        return view('index',['inicio'=>$inicio]);
    }

    /**---------------------MODIFICACION DE USUARIO ----------------*/
    public function modificar(){
        /* Mostrar vista para cambiar datos */
        /**Se podria recuperar datos de la bd para mostrar en el formulario de modificacion*/
    }

}
