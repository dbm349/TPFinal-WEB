<?php

namespace App\Controllers;

class PagesController
{
    /**
     * Show the home page.
     */
    public function home()
    {
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('index',['inicio'=>$inicio]);
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        session_start() ;
        if(isset($_SESSION['iniciado'])){
            $inicio = true;
        }else{
            $inicio=false;
        }
        return view('about',['inicio'=>$inicio]);
    }
}
