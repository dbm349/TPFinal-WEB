 <?php

    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');

    $router->get('users', 'ControladorUsuarios@ingresar');
    $router->get('users/registrarse', 'ControladorUsuarios@registrar');
    $router->post('users/validate', 'ControladorUsuarios@validarUsuarioNuevo');
    $router->post('users/sesion', 'ControladorUsuarios@validarInicioSesion');
    $router->get('users/cerrarSesion', 'ControladorUsuarios@cerrarSesion');
    $router->get('users/ModificarDatos', 'ControladorUsuarios@modificar');

    $router->get('publicacion/registroProp','ControladorPropiedades@registroProp');
    $router->post('publicacion/validate','ControladorPropiedades@validarTipos');
    
    
    $router->get('Comprar/casa', 'ControladorPropiedades@compraCasa');
    $router->get('Comprar/depto', 'ControladorPropiedades@compraDepto');
    $router->get('Comprar/galpon', 'ControladorPropiedades@compraGalpon');
    $router->get('Comprar/local', 'ControladorPropiedades@compraLocal');
    $router->get('Comprar/lote', 'ControladorPropiedades@compraLote');


    $router->get('Alquilar/casa', 'ControladorPropiedades@alquilerCasa');
    $router->get('Alquilar/depto', 'ControladorPropiedades@alquilerDepto');
    $router->get('Alquilar/galpon', 'ControladorPropiedades@alquilerGalpon');
    $router->get('Alquilar/local', 'ControladorPropiedades@alquilerLocal');


    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
