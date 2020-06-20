<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Propiedad;

class ControladorPropiedades extends Controller
{
    public function __construct()
    {
        $this->model = new Propiedad();
    }

    /* Busqueda Compras */

    public function compraCasa()
    {
        $propiedades = $this->model->get('compra','casa'); 
        return view('busqueda', compact('propiedades'));
    }

    public function compraDepto()
    {
        $propiedades = $this->model->get('compra','departamento'); 
        return view('busqueda', compact('propiedades'));
    }

    public function compraGalpon()
    {
        $propiedades = $this->model->get('compra','galpon'); 
        return view('busqueda', compact('propiedades'));
    }

    public function compraLocal()
    {
        $propiedades = $this->model->get('compra','local'); 
        return view('busqueda', compact('propiedades'));
    }

    public function compraLote()
    {
        $propiedades = $this->model->get('compra','lote');
        return view('busqueda', compact('propiedades'));
    }

    /* Busqueda Alquileres */

    public function alquilerCasa()
    {
        $propiedades = $this->model->get('alquiler','casa'); 
        return view('busqueda', compact('propiedades'));
    }

    public function alquilerDepto()
    {
        $propiedades = $this->model->get('alquiler','departamento'); 
        return view('busqueda', compact('propiedades'));
    }

    public function alquilerGalpon()
    {
        $propiedades = $this->model->get('alquiler','galpon'); 
        return view('busqueda', compact('propiedades'));
    }

    public function alquilerLocal()
    {
        $propiedades = $this->model->get('alquiler','local'); 
        return view('busqueda', compact('propiedades'));
    }

    /*Registro de propiedades*/

    public function registroProp(){
        return view('nueva.publicacion');
    }

    public function validarTipos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['operacion'])){
                $operacion = $_POST['operacion'];
            }
            if(isset($_POST['propiedad'])){
                $propiedad = $_POST['propiedad'];
            }

        return view('publicacion'.'.'.$operacion.'.'.$propiedad.'.create');
        }
    }

    
}
