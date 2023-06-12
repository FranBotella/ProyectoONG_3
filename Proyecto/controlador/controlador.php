<?php

class Controller {



    public function cargaMenu (){
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1 && $_SESSION["carritolleno"]!="lleno") {
            return 'menuUser.php';
        }
        else if ($_SESSION['nivel_usuario'] == 1 && $_SESSION["carritolleno"]=="lleno") {
            return 'menuUserCarro.php';
        }
        else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }

    }






 


    public function inicio() {
        
        
             
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/inicio2.php';
    }

    public function politicas_de_privacidad() {

        
            
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/politicas_de_privacidad.php';
    }

    public function informacion() {

        
            
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/about.php';
    }
    public function causas() {

        
            
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/causes.php';
    }

    public function donaciones() {
       
        $_SESSION['clienteid']="AYAaEkvtH81FaW9FUYQQSlLW5dAxocxzQmnHuucHeLpToWup6oRQkh_ieo47E8fuJP71UPf3PNzefA_x";
       
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/donate.php';
    }
    public function eventos(){
        $nivel=0;
        try {
            //compruebo que  nivel es el usuario
            $post = new Usuarios();

            // $nivel= $post->consultarUsuario($_SESSION["user"]);
            $postContador = $post ->contadorPost();
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }




        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/event.php';
    }




    public function suscribirse(){
        //Si al realizar el formulario es correcto te redirige a enviarSucripcion
       
        try {
            $post = new Usuarios();

            $nivel= $post->consultarUsuario($_SESSION["user"]);
            
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }
        $menu=$this->cargaMenu();
        require __DIR__ . '/../correos/Suscripcion2.php';
    }
     
        public function enviarSuscripcion(){
           //Se pone en contacto con mailchimp y añade la informacion en la campaña creada en mailchimp 
           $darseBaja=false;
           if(isset( $_POST [ 'desuscribirse' ])){ 
            if(isset( $_POST [ 'cbox1' ])){ 
               
                try {
                    $post = new Usuarios();
                    echo $_SESSION["user"];
                   $baja="baja";
                  $prueba=$post->darseAlta($baja,$_SESSION["user"]);
                  $_SESSION["baja"]=true;
              
                  header("location:index.php?ctl=suscribirse");
                
                } catch (PDOException $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                    // save errors
                    $errorsGuide['NoGuide'] = "Ha habido un error <br>";
                }
            }
            else{
                header("location:index.php?ctl=inicio");
            }
        }



       
        require __DIR__ . '/../correos/enviarSuscripcion.php';
    }





    public function tienda(){
         //al seleccionar una categoria se muestran los articulos que se guardaron en la base de datos


         $nivel=0;

        try {

            $post = new Usuarios();
           
    
          
                // $nivel= $post->consultarUsuario($_SESSION["user"]);
              
            if(isset($_POST['valorSesion'])){
               
               $_SESSION['categoria']=$_POST['valorSesion'];
            
                $productosContador = $post ->contadorProductos($_POST['valorSesion']);
                
             }
           
          
           
            
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }




        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/tienda2.php';
    }







    



public function insertarElementoCarrito(){

    
    try {
        $post = new Usuarios();
        $nivel= $post->consultarUsuario($_SESSION["user"]);
        $idUsu= $post->getIDUser($_SESSION["user"]);
        if(isset($_POST['bProducto'])){
        
           //al insertar algo en el carrito se guarda un campo en la base de datos como pendiente y cambia su valor a confirmar cuando se acepta en el carrito
      
            $fechaActual = date("d-m-Y");
            $estado="pendiente";
       
           $carrito= $post->insertarCarrito(recoge('idProducto'),$idUsu,recoge('tituloProducto'), $fechaActual,$estado,recoge('precioProducto'),recoge('cantidadP'));
// el campo carrito lleno es para cambiar la imagen de carrito de vacio a lleno cuando se inserta productos
           $_SESSION["carritolleno"]="lleno";
if($_SESSION["numeroCarrito"]>0){
    // el ir sumando es para cuando vayamos a quitar productos y no haya cambiar la imagen a carrito vacio cuando sea 0
$_SESSION["numeroCarrito"]=$_SESSION["numeroCarrito"]+1;
header("Location: ".$_SERVER['HTTP_REFERER'].""); 
}
      else{
        
        $_SESSION["numeroCarrito"]=1;
header("Location: ".$_SERVER['HTTP_REFERER']."");
      }
        }
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }
   
}

    public function carrito(){
       
 
       
          
            try {
                $post = new Usuarios();
                    $nivel= $post->consultarUsuario($_SESSION["user"]);
                    $idUsu= $post->getIDUser($_SESSION["user"]);
                    $confirmadoCompra=false;
                    if(isset($_POST['bCarrito'])){
                    
                            if(recoge('elementoseleccionado')==""){
                        $estado1="pendiente";
                        $estado="confirmar";
                     
                       $carritoActualizado= $post->actualizaCarrito(recoge('precioProductoCarrito'),recoge('cantidadPCarrito'), $estado, $estado1, $idUsu);
                       $confirmadoCompra=true;
                      
                       $_SESSION["carritolleno"]="vacio";
                            }
                       else{
                        $_SESSION["numeroCarrito"]= $_SESSION["numeroCarrito"]-1;
                        if($_SESSION["numeroCarrito"]==0){
                        $_SESSION["carritolleno"]="vacio";
                        }
                        $estado="pendiente";
                        $carritoElementoBorrado= $post->BorrarElementoCarrito(recoge('elementoseleccionado'),$estado,$idUsu);
                       }
                
                    }

                } catch (PDOException $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                    // save errors
                    $errorsGuide['NoGuide'] = "Ha habido un error <br>";
                }
        
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/carrito2.php';
}

public function insertarProducto(){
    $nameFile = "";
    $dir = "../../img";
    $max_file_size = "51200000";
    $extensions = array(
        "jpg",
        "png",
        "gif"
    );
    if (isset($_POST['bAñadir'])) {
        $titulo = recoge('titulo');
        $contenido = recoge('contenido');
        $imagen=$_FILES['imagen']['name'];
       $precio=recoge('precio');
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->insertarProducto($genero,$titulo,$imagen,$contenido,$precio);
            
            header("location:index.php?ctl=insertarProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=insertarProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/insertarProducto2.php';   
}




public function eliminarProducto(){
   
    if (isset($_POST['bEliminar'])) {
        $titulo = recoge('titulo');
        
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->eliminarProducto($genero,$titulo);
            
            header("location:index.php?ctl=eliminarProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eliminarProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/eliminarProducto2.php';   
}



public function eliminarP(){
   //Se eliminan articulos de la pagina eventos
    if (isset($_POST['bEliminar'])) {
        $titulo = recoge('titulo');
        
       
        try {
                        
            $l = new Usuarios();
            $l->eliminarP($titulo);
            
            header("location:index.php?ctl=eliminarP");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eliminarP");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/eliminarP2.php';   
}





public function editarPrecioProducto(){
   
    if (isset($_POST['bEditar'])) {
        $titulo = recoge('titulo');
        $precio=recoge('precio');
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->editarPrecioProducto($precio,$genero,$titulo);
            
            header("location:index.php?ctl=editarPrecioProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=editarPrecioProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/editarPrecioProducto2.php';   
}








public function insertarP(){
    //se inserta post en la pagina de eventos
    $nameFile = "";
    $dir = "../../img";
    $max_file_size = "51200000";
    $extensions = array(
        "jpg",
        "png",
        "gif"
    );
    if (isset($_POST['bPost'])) {
        $titulo = recoge('titulo');
        $contenido = recoge('contenido');
        $imagen=$_FILES['imagen']['name'];
        $fechaini=recoge('fechain');
        $fechafin=recoge('fechafin');
        echo $fechaini;
        try {
                        
            $l = new Usuarios();
            $l->insertarP( $titulo,$imagen , $contenido,$fechaini,$fechafin  );
            
            header("location:index.php?ctl=eventos");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eventos");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/insertarP2.php';   
}


public function enviarCodigo(){
   
    //al registrarse se enviar un codigo al correo que ha puesto el usuario
    
    $code = tokenG();
   $emailCodigo=$_SESSION['email'];
  $_SESSION['codigo']= $code;
  
    require __DIR__ . '/../correos/enviar.php';
}
public function recibirCodigo(){
    $codeIn = $_POST["codigoIn"];
    
            if($_SESSION['codigo']==$codeIn){
                if($_SESSION['user']=="admin"){
                    try {
                        $passwordBD = crypt_blowfish($_SESSION['pass']); 
                    $l = new Usuarios();
                    $l->registrarse($_SESSION['user'], $passwordBD, $_SESSION['email']);
                    mkdir(__DIR__ ."/../img/".$_SESSION['user'], 0777);
                    copy(__DIR__ ."/../img/image.png", __DIR__ ."/../img/".$_SESSION['user']."/image.png");
                    $l->subirNivelAdmin(2,$_SESSION['user']);
                    header("location:index.php?ctl=registro");
                    } catch (Exception $e) {
                        // $l->deshacer();
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                        header("location:index.php?ctl=registro");
                    } 
                }else{
                try {
                  
                    $passwordBD = crypt_blowfish($_SESSION['pass']); 
                    $l = new Usuarios();
                    $l->registrarse($_SESSION['user'], $passwordBD, $_SESSION['email']);
                    mkdir(__DIR__ ."/../img/".$_SESSION['user'], 0777);
                copy(__DIR__ ."/../img/image.png", __DIR__ ."/../img/".$_SESSION['user']."/image.png");
                    header("location:index.php?ctl=inicio");
                } catch (Exception $e) {
                    // $l->deshacer();
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header("location:index.php?ctl=registro");
                } 
            }
            }

require __DIR__ . '/../correos/recibe.php';
}

public function recuperarContrasenya(){
    $params = array(
       
        'pass' => '',
       
        
        );
        $errores=array();
    $contrasenya="";
     //al recuperar la contraseña  se escribe tu correo si es correcto tendras que vovlerlo a escribir y  se abrira un formulario para cambiar la contraseña
    if (isset($_POST['brecuperarContrasenya'])) {
        $correo = recoge('email');
        $errores=array();
        
        if(cCorreo2($correo,$errores)){
                try {
                        
                    $l = new Usuarios();
                 $contrasenya= $l->getContrasenya($correo);
         
                  
                } catch (Exception $e) {
                   
                    // error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    // header("location:index.php?ctl=inicio");
                } 
            }
        }
            $contraseñaNueva="";
            if (isset($_POST['bNuevaContrasenya'])) {
                if(cPass(recoge('contraseñaNueva'), "pass", $errores)){
                $contraseñaNueva =crypt_blowfish( recoge('contraseñaNueva'));
                $correo2 = recoge('email2');
                try {
                        
                    $g = new Usuarios();
                 $nuevaContrasenya=$g->actualizaContrasenya($correo2,$contraseñaNueva);
                 
                    header("location:index.php?ctl=inicio");
                } catch (Exception $e) {
                    // $l->deshacer();
                    // error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    // header("location:index.php?ctl=inicio");
                } 
                }
                else{
                    $params = array(
                       
                        'pass' => $contraseñaNueva
                    );
                   
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            
               
            }

require __DIR__ . '/../vista/recuperarContrasenya2.php';
}



public function perfil(){

        try {
            $user = new Usuarios();

            $userGet = $user->getUser($_SESSION["user"]);
            $emailGet = $user->getEmail($_SESSION["user"]);
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }

        $nameFile = "";
        $dir = "../../img";
        $max_file_size = "51200000";
        $extensions = array(
            "jpg",
            "png",
            "gif"
        );

        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/perfil2.php';
}

    
    public function registro() {
  
        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }

        
            $params = array(
                'user' => '',
                'pass' => '',
                'email' => '',
                
                );
            $errores=array();
            $error;
            if (isset($_POST['bRegistro'])) {
                $user = recoge('user');
                $pass = recoge('pass');
                $emailCompro=recoge('email');
                try {
                    $usuario = new Usuarios();
                  //compruebo email recogido  
                if ($emailCompro!="" ) {
                    //compruebo si esta en la base de datos el correo
                    if ( $usuario->checkEmail($_POST["email"])) {
                $email="";
                cCorreo($email,$errores);
                    }
                    else{
                        $email = recoge('email');
                        $emailCodigo = validarCorreo('email');
                    }
             
                }
                else{
                   $email="";
                  
                }
            
            } catch (PDOException $e) {
                error_log($e->getMessage() . "##Code: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                // save errors
                $errorsGuide['NoGuide'] = "Error <br>";
            }  
            //compruebo que son validos los correos y sino se muestra mensaje de error
            cTexto($user, "user", $errores);
            
            cPass($pass, "pass", $errores);
            cCorreo($email,$errores);
                if (empty($errores)){
                       
                    try {
                        
                   
                       
                        $_SESSION['email']=$email;
                        $_SESSION['user']=$user;
                        $_SESSION['pass']=$pass;
                        $_SESSION["mensaje"]=null;

                        header("location:index.php?ctl=enviarCodigo");

                   
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }

                } else {
                    $params = array(
                        'user' => $user,
                        'pass' => $pass,
                        
                        'email' => $email,
                       
                        
                        );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                    
                }
            }
        
            $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/registro2.php';
    }



    public function error() {
        
        $menu=$this->cargaMenu();

        require __DIR__ . '/../vista/error.php';
    }


    public function salir() {
        session_destroy();
        header ("location:index.php?ctl=home");
    }


    public function iniciarSesion() {
     
        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }

        $params = array(
            'user' => '',
            'pass' => '',
           
            
            );
        $errores=array();
            if (isset($_POST['bIniciarSesion'])) { 
                $nombreUsuario = recoge('user');
                $contrasenya = recoge('pass');
                cTexto($nombreUsuario, "user", $errores);
            
            cPass($contrasenya, "pass", $errores);
            if (empty($errores)){
                        try{      
                    $m = new Usuarios();
                
                    if ($m->consultarUsuario($nombreUsuario)) {
                       
                        $level=$m->consultarUsuario($nombreUsuario);
                        $_SESSION['nivel_usuario'] = $level;
                    
                      
                       
                    // Compruebo si el password es correcto
                        if ($m->checkPassword($nombreUsuario,$contrasenya )) {
                        
                        $_SESSION['email']=$m->getEmail($nombreUsuario);
                        $_SESSION['user']= $nombreUsuario;    
                        $_SESSION["carritolleno"]="vacio";
                        $_SESSION["mensaje"]="bien";      
                        $_SESSION["baja"]=false;
                        $_SESSION["alta"]=false;
                        $_SESSION["correoSuscribirse"]=false;
                        header('Location: index.php?ctl=inicio');
                   }
                 
                
                }else {
                        $params = array(
                            'user' => $nombreUsuario,
                            'pass' => $contrasenya
                        );
                       
                        $params['mensaje'] = $contrasenya;
                    }
               
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            }
        }
        else {
            $params = array(
                'user' => $nombreUsuario,
                'pass' => $contrasenya,
                
                
               
                
                );
            $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            
        }
        }
    
      
        require __DIR__ . '/../vista/iniciarSesion2.php';
    }



}




?>