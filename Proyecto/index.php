<?php


require_once __DIR__ . '/modelo/config.php';
require_once __DIR__ . '/modelo/modelo.php';
require_once __DIR__ . '/controlador/controlador.php';
require_once __DIR__ . '/libs/bGeneral.php';
require_once __DIR__ . '/modelo/classUsuarios.php';

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario

if (! isset($_SESSION['nivel_usuario'])) { 
    $_SESSION['nivel_usuario'] = 0;
}


/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 **/
$map = array(
    
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0),
    'informacion' => array('controller'=>'Controller', 'action' =>'informacion','nivel_usuario'=>0),
    'causas' => array('controller' =>'Controller', 'action' =>'causas', 'nivel_usuario'=>0),
    'politicas_de_privacidad' => array('controller' =>'Controller', 'action' =>'politicas_de_privacidad', 'nivel_usuario'=>0),
    'iniciarSesion' => array('controller' =>'Controller', 'action' =>'iniciarSesion', 'nivel_usuario'=>0),
    'registro' => array('controller' =>'Controller', 'action' =>'registro', 'nivel_usuario'=>0),
    'enviarCodigo'=>array('controller'=>'Controller','action'=>'enviarCodigo','nivel_usuario'=>0),
    'recibirCodigo'=>array('controller'=>'Controller','action'=>'recibirCodigo','nivel_usuario'=>0),
    'recuperarContrasenya'=>array('controller'=>'Controller','action'=>'recuperarContrasenya','nivel_usuario'=>0),
    'error' => array('controller' =>'Controller', 'action' =>'error', 'nivel_usuario'=>0),
    'suscribirse'=>array('controller'=>'Controller','action'=>'suscribirse','nivel_usuario'=>1),
    'enviarSuscripcion'=>array('controller'=>'Controller','action'=>'enviarSuscripcion','nivel_usuario'=>1),
    'perfil'=>array('controller'=>'Controller','action'=>'perfil','nivel_usuario'=>1),
    'donaciones'=>array('controller'=>'Controller','action'=>'donaciones','nivel_usuario'=>0),
    'eventos'=>array('controller'=>'Controller','action'=>'eventos','nivel_usuario'=>0),
    'tienda'=>array('controller'=>'Controller','action'=>'tienda','nivel_usuario'=>0),
    'carrito'=>array('controller'=>'Controller','action'=>'carrito','nivel_usuario'=>1),
    'borrarElementoCarrito'=>array('controller'=>'Controller','action'=>'borrarElementoCarrito','nivel_usuario'=>1),
    'insertarElementoCarrito'=>array('controller'=>'Controller','action'=>'insertarElementoCarrito','nivel_usuario'=>1),
    'salir' => array('controller' =>'Controller', 'action' =>'salir', 'nivel_usuario'=>1),
    'insertarP' => array('controller' =>'Controller', 'action' =>'insertarP', 'nivel_usuario'=>2),
    'eliminarP' => array('controller' =>'Controller', 'action' =>'eliminarP', 'nivel_usuario'=>2),
    'insertarProducto' => array('controller' =>'Controller', 'action' =>'insertarProducto', 'nivel_usuario'=>2),
    'eliminarProducto' => array('controller' =>'Controller', 'action' =>'eliminarProducto', 'nivel_usuario'=>2),
    'editarPrecioProducto' => array('controller' =>'Controller', 'action' =>'editarPrecioProducto', 'nivel_usuario'=>2)
              
    
    
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .'</p></body></html>';
            exit;
            /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, 
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien 
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'],$controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(new $controlador['controller'],
            $controlador['action']));
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
        console_log("entrarErrorInicio");
}

?>