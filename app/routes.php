 <?php

    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');

    $router->get('users', 'ControladorUsuarios@ingresar');
    $router->get('users/registrarse', 'ControladorUsuarios@registrar');
    $router->post('users/validate', 'ControladorUsuarios@validarUsuarioNuevo');
    $router->post('users/sesion', 'ControladorUsuarios@validarInicioSesion');
    $router->get('users/cerrarSesion', 'ControladorUsuarios@cerrarSesion');
    



    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
