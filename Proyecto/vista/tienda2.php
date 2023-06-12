<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Asociacion GUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tienda.css">
    <link rel="icon" type="image/x-icon" href="img/logoGUP.icon">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
  </head>
  <body>
  <?php	
  






	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';

	}
	include $menu;
	
    ?>

    
    <div class="hero-wrap" style="background-image: url('img/root/bg_777.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php?ctl=inicio">Inicio</a></span> <span>Tienda</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tienda</h1>
          </div>
        </div>
      </div>
    </div>
    <form  id="formularioTienda" method="POST" action="index.php?ctl=tienda">
<div class="categorias" id="categorias"> 
                <a role="link" class="genres" id="Ropa" tabindex="1" aria-label="Categoria Ropa" >Ropa</a>
                <a role="link" class="genres" id="Bolsos" tabindex="2" aria-label="Categoria Bolsos"  >Bolsos</a>
                <a  role="link" class="genres" id="Estuches" tabindex="3" aria-label="Categoria Estuches"  >Estuches</a>
                <a  role="link"  class="genres" id="Artesania" tabindex="4" aria-label="Categoria Artesania" >Artesania</a>
                <a role="link" class="genres" id="Bisuteria" tabindex="5" aria-label="Categoria Bisuteria"  >Bisuteria</a>
                
                </div>
               
                </form>

<?php
                if($menu=="menuInvitado.php"){
   
   $entrar=false;
  //  echo "<script language='javascript'>";
  //  echo "alert('Necesitas iniciar sesión para comprar')";
  echo "<p id='mensajeDonar'></p>";
  //  echo "</script>"; 
?>

<script language='javascript'>
  

    document.getElementById("mensajeDonar").innerHTML="NECESITAS INICIAR SESIÓN PARA COMPRAR PRODUCTOS";
  
     </script>
<?php
 

}
 else{
   $entrar=true;
   try {

     $post = new Usuarios();
    
   
         $nivel= $post->consultarUsuario($_SESSION["user"]);
     
    
 } catch (PDOException $e) {
     error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
     // save errors
     $errorsGuide['NoGuide'] = "Ha habido un error <br>";
 }




 }

?>




                <?php  if( $nivel==2){?>
<div id='botonesAdminTienda'>
<form id='formuInsertar' ACTION='index.php?ctl=insertarProducto' METHOD='post' NAME='formInsertar'>
<input type='submit' class='buttonForm' id="insertarProducto" name='insertar' value='Insertar' />
</form>
<form id='formuEliminar' ACTION='index.php?ctl=eliminarProducto' METHOD='post' NAME='formEliminar'>
<input type='submit' class='buttonForm' id="eliminarProducto" name='eliminar' value='Eliminar' />
</form>
<form id='formuEditar' ACTION='index.php?ctl=editarPrecioProducto' METHOD='post' NAME='formEditar'>
<input type='submit' class='buttonForm' id="editarPrecio" name='eliminar' value='Editar precio' />
</form>
</div>
<?php } ?>
   
                <div id="borrar">
    <div id='formulariosT'>
    <div class="row">
                
<?php

if(isset($_POST['valorSesion']) && $entrar==true){
    
  $generoEscogido= $_POST['valorSesion'];
  $tiempo=0;
  
  for ($i=0; $i<= $productosContador ; $i++) { 
      $tiempo=0;
  
      try {
          $post2 = new Usuarios();
         
          $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
          while($postValidar==0){
              $i++;
              $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
              $tiempo++;
             
              if($tiempo==500){
              break;
              }
              
            }
  
          
          if($postValidar>0){
              $postProducto = $post2-> getTituloProducto($i,$generoEscogido);
              $productoId = $post2->getIdProducto($i,$generoEscogido);
              $productoContenido = $post2-> getContenidoProducto($i,$generoEscogido);
          $productoImagen = $post2-> getImagenProducto($i,$generoEscogido);
          $precioProducto = $post2->  getprecioProducto($i,$generoEscogido); 
  
          echo "<br>";
          echo "<form  class='tiendaForm  col-md-4 '  ACTION='index.php?ctl=insertarElementoCarrito' METHOD='post' >";
        
          echo " <table id=$productoId class='tabla_tienda '>";
          echo "<tr>";
          echo "<td><input type='hidden' name='idProducto' value='$productoId' ></input></td>";
          echo "</tr>";
          echo " <tr>";
          echo " <th><input type='text' name='tituloProducto' class='tituloProductoTienda' value='$postProducto' readonly></th> ";
          echo " </tr>";
         
         echo " <tr>";
         echo " <th ><img class=imagenesEve src=./img/root/imgTienda/$productoImagen></img></th>";
         echo "  <th> <textarea   rows='3' cols='100'>$productoContenido</textarea></th>";
         echo "</tr>";
         echo " <tr>";
     
      // echo "  <th colspan='2'> <textarea   rows='3' cols='50'>$productoContenido</textarea></th>";
         echo " </tr>";
         echo " <tr>";
         echo "<th >Precio </th>";
         $precioProducto=$precioProducto."€";
         echo "<th><input type='text' class='tiendaPrecio' name='precioProducto' value='$precioProducto' readonly></input></th>";
         echo "  </tr>";
         echo "<tr>";
         echo "<th>Cantidad</th>";
         echo "<th><input type='number' class='tiendaCantidad' name='cantidadP' ></input></th>";
         echo "</tr>";
         echo "<tr>";
         //Añadir
         echo "<th colspan='2'><input  id='BTN-Añadir'  TYPE='submit' NAME='bProducto' class='btn btn-danger'  VALUE='Añadir'></th>";
         echo " </table>";
         echo "</form>";
         echo "<br>";
  
  
  
  
  
      echo "<script language='JavaScript'>";
       echo "document.getElementById('$generoEscogido').style.color='lightsalmon';";
       echo "</script>";
    
          }
          
       
  
        
      
         
      } catch (PDOException $e) {
          error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
       
          $errorsGuide['NoGuide'] = "Ha habido un error <br>";
      }
   
  
  
  }
  
  }


if(isset($_POST['valorSesion']) && $entrar==false){
  $generoEscogido= $_POST['valorSesion'];
  $tiempo=0;
  
  for ($i=0; $i<= $productosContador ; $i++) { 
      $tiempo=0;
  
      try {
          $post2 = new Usuarios();
         
          $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
          while($postValidar==0){
              $i++;
              $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
              $tiempo++;
             
              if($tiempo==500){
              break;
              }
              
            }
  
          
          if($postValidar>0){
              $postProducto = $post2-> getTituloProducto($i,$generoEscogido);
              $productoId = $post2->getIdProducto($i,$generoEscogido);
              $productoContenido = $post2-> getContenidoProducto($i,$generoEscogido);
          $productoImagen = $post2-> getImagenProducto($i,$generoEscogido);
          $precioProducto = $post2->  getprecioProducto($i,$generoEscogido); 
  
          echo "<br>";
          echo "<form  class='tiendaForm  col-md-4 '  ACTION='index.php?ctl=insertarElementoCarrito' METHOD='post' >";
        
          echo " <table id=$productoId class='tabla_tienda '>";
          echo "<tr>";
          echo "<td><input type='hidden' name='idProducto' value='$productoId' ></input></td>";
          echo "</tr>";
          echo " <tr>";
          echo " <th><input type='text' name='tituloProducto' class='tituloProductoTienda' value='$postProducto' readonly></th> ";
          echo " </tr>";
         
         echo " <tr>";
         echo " <th ><img class=imagenesEve src=./img/root/imgTienda/$productoImagen></img></th>";
         echo "  <th> <textarea   rows='3' cols='100'>$productoContenido</textarea></th>";
         echo "</tr>";
         echo " <tr>";
     
      // echo "  <th colspan='2'> <textarea   rows='3' cols='50'>$productoContenido</textarea></th>";
         echo " </tr>";
         echo " <tr>";
         echo "<th >Precio </th>";
         $precioProducto=$precioProducto."€";
         echo "<th><input type='text' class='tiendaPrecio' name='precioProducto' value='$precioProducto' readonly></input></th>";
         echo "  </tr>";
         echo "<tr>";
         echo "<th>Cantidad</th>";
         echo "<th><input type='number' class='tiendaCantidad' name='cantidadP' ></input></th>";
         echo "</tr>";
         echo "<tr>";
         //Añadir
        //  echo "<th colspan='2'><input  id='BTN-Añadir'  TYPE='submit' NAME='bProducto' class='btn btn-danger'  VALUE='Añadir'></th>";
         echo " </table>";
         echo "</form>";
         echo "<br>";
  
  
  
  
  
      echo "<script language='JavaScript'>";
       echo "document.getElementById('$generoEscogido').style.color='lightsalmon';";
       echo "</script>";
    
          }
          
       
  
        
      
         
      } catch (PDOException $e) {
          error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
       
          $errorsGuide['NoGuide'] = "Ha habido un error <br>";
      }
   
  
  
  }
}



?>

</div>
</div>
<!-- 
otro div -->
</div>
    
		

<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <!-- <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Redes sociales</h2>
             
                
                <li class="ftco-animate"><a href="https://www.instagram.com/asociaciongup/?hl=es"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/asociaciongup/?locale=es_ES"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div> -->
         
          <div class="col-md-2">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Enlaces de la web</h2>
              <ul class="list-unstyled">
                <li><a href="index.php?ctl=inicio" class="py-2 d-block">Inicio</a></li>
                <li><a href="index.php?ctl=informacion" class="py-2 d-block">Sobre nosotros</a></li>
                <li><a href="index.php?ctl=donaciones" class="py-2 d-block">Donar</a></li>
                <li><a href="index.php?ctl=tienda" class="py-2 d-block">Tienda</a></li>
                <li><a href="index.php?ctl=causas" class="py-2 d-block">Causas</a></li>

              </ul>
            </div>
          </div>

<!-- // -->

<div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Eventos recientes</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(img/root/652.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="index.php?ctl=eventos">Evento Cultural</a></h3>
            
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(img/root/055.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="index.php?ctl=eventos">Aldea del Senegal</a></h3>
                 
                </div>
              </div>
            </div>
          </div>



<div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Politica de cookies</h2>
              <p>Esta página web usa cookies
Las cookies de este sitio web se usan para personalizar el contenido y los anuncios, ofrecer funciones de redes sociales y analizar el tráfico. Además, compartimos información sobre el uso que haga del sitio web con nuestros partners de redes sociales, publicidad y análisis web, quienes pueden combinarla con otra información que les haya proporcionado o que hayan recopilado a partir del uso que haya hecho de sus servicios</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <!-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> -->
                <li class="ftco-animate"><a href="https://www.facebook.com/asociaciongup/?locale=es_ES"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/asociaciongup/?hl=es"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">¿Tienes dudas?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+34 616-420-909</span></a></li>
	                <li><a href="#"><span id="correoA" class="icon icon-envelope"></span><span class="text">asociaciongup@hotmail.es</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- <p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
 Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p> 
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/functiones.js"></script> 
  </body>
</html>