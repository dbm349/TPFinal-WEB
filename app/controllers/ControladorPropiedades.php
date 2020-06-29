<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Propiedad;
use App\Models\Users;

class ControladorPropiedades extends Controller
{
    public function __construct()
    {
        $this->model = new Propiedad();
    }

    /**---------------Busqueda Pagina Principal ---------------*/
    public function busquedaIndex(){
        
    }

    /**---------------Busqueda Nav--------------- */
    /* Busqueda Compras */

    public function compraCasa()
    {
        $propiedades = $this->model->get('venta','casa'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function compraDepto()
    {
        $propiedades = $this->model->get('venta','departamento'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function compraGalpon()
    {
        $propiedades = $this->model->get('venta','galpon'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function compraLocal()
    {
        $propiedades = $this->model->get('venta','local'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function compraQuinta()
    {
        $propiedades = $this->model->get('venta','quinta'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function compraCochera()
    {
        $propiedades = $this->model->get('venta','cochera'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    /* Busqueda Alquileres */

    public function alquilerCasa()
    {
        $propiedades = $this->model->get('alquiler','casa'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function alquilerDepto()
    {
        $propiedades = $this->model->get('alquiler','departamento'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function alquilerGalpon()
    {
        $propiedades = $this->model->get('alquiler','galpon'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function alquilerLocal()
    {
        $propiedades = $this->model->get('alquiler','local'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function alquilerQuinta()
    {
        $propiedades = $this->model->get('alquiler','quinta'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    public function alquilerCochera()
    {
        $propiedades = $this->model->get('alquiler','cochera'); 
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('busqueda2', ['inicio'=>$inicio, 'propiedades'=>$propiedades]);
    }

    /*---------------Registro de propiedades---------------*/

    public function registroProp(){
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('nueva.publicacion',['inicio'=>$inicio]);
    }

    public function validarTipos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['operacion'])){
                $operacion = $_POST['operacion'];
            }
            if(isset($_POST['propiedad'])){
                $propiedad = $_POST['propiedad'];
            }

        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('publicacion.'.$operacion.'.'.$propiedad.'.create',['inicio'=>$inicio,'operacion'=>$operacion,'propiedad'=>$propiedad]);
        }
    }

    public function InsertarPropiedad(){
        session_start();
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }

        $user = [
            'mail' => $_SESSION['usuario'],
            'pass' => $_SESSION['pass']
        ];
    
        $ErroresProp =  array();
        $propiedad = array();
        $propiedad['mail'] = $_SESSION['usuario'];
        require 'app/controllers/ValidatePropiedad.php';
        

        if(empty($ErroresProp)){
            
            $this->model->insert($propiedad);
            //print_r($propiedad);
            return view('propiedad.datos',['inicio'=>$inicio, 'propiedad'=>$propiedad]);
           
        }else{
            return view('about',['inicio'=>$inicio,'errores'=>$ErroresProp]);
            
        }
    }

    /*-----------VER------------- */

    public function verProp(){
        $propiedad = $_GET['direccion'];
        print_r($propiedad);
    }
}
