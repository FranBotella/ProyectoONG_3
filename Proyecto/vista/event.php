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
    <link rel="stylesheet" href="css/eventos.css">
    <link rel="icon" type="image/x-icon" href="img/logoGUP.icon">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
  </head>
  <body>
  <?php	
	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';
	}
	include $menu;
  if($menu=="menuInvitado.php"){
   
   
  }else{
 
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

  <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
    <a class="navbar-brand" href="index.php?ctl=inicio"><img id="logo" src="./img/logoGUP.jpg"></img></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php?ctl=inicio" class="nav-link">Inicio</a></li>
          <li class="nav-item"><a href="index.php?ctl=informacion" class="nav-link">Sobre nosotros</a></li>
          <li class="nav-item"><a href="index.php?ctl=causas" class="nav-link">Causas</a></li>
          <li class="nav-item"><a href="index.php?ctl=donaciones" class="nav-link">Donar</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
          <li class="nav-item active"><a href="index.php?ctl=eventos" class="nav-link">Eventos</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav> -->
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_11.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php?ctl=inicio">Inicio</a></span> <span>Eventos</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Eventos</h1>
          </div>
        </div>
      </div>
    </div>

    <?php if( $nivel==2){?>
      <br>
    <div id="botonesAdminEventos">
        
<form id="formuInsertar" ACTION="index.php?ctl=insertarP" METHOD="post" NAME="formInsertar">
<input type="submit" class="buttonForm" id="insertarPost" name="insertar" value="INSERTAR" />
</form>
<form id="formuInsertar" ACTION="index.php?ctl=eliminarP" METHOD="post" NAME="formEliminar">
<input type="submit" class="buttonForm" id="eliminarPost" name="bEliminar" value="ELIMINAR" />
</form>
</div>
<?php }?>
    <section class="ftco-section" id="borrar" >
      <div class="container">
        <div class="row">
        	

    <?php

    try{
      $post2 = new Usuarios();
      
      $resultado  = $post2->  sacarordenPost();
    
      foreach($resultado as $result){
    if( $post2->  getIdPostValidar($result['id'])){
        $postId=$result['id'];
            $postFechafin = $post2-> getFechaFin( $postId);
          $sacarM=strval(substr($postFechafin,0,2));
          $sacarD=strval(substr($postFechafin,3,2));
          $sacarY=strval(substr($postFechafin,6,4));
        $postImagen=$result['imagen'];
        $fechaValida=$sacarD."/".$sacarM."/".$sacarY;
        $postTitulo=$result['titulo'];
        $postContenido=$result['contenido'];
        echo "  <div id=$postId class='col-md-4 d-flex ftco-animate' >";
        //quitar clase abajo
        echo " <div id=atributo3 class='blog-entry align-self-stretch'>";
         echo "  <a  id='imagenEvento' class='block-20 ' style='background-image: url(img/root/$postImagen);'>";
           echo " </a>";
          echo  "<div class='text p-4 d-block'>";
           echo   "<div id='borrarD' class='meta mb-3' >";
            echo    "<div><a href='#'>$fechaValida</a></div>";
            echo " <p class='time-loc'><span class='mr-2'> Fecha de fin |</span> <span>Pichar en el titulo de abajo para leer más</span></p> ";
            echo  "</div>";
            echo   "<h3 class='heading mb-4'><a  class=tituloblog>$postTitulo</a></h3>";
          
            echo  "<p class=blog id=atributo>$postContenido</p>";
        
           echo "</div>";
         echo "</div>";
       echo "</div>";   

    }


      }
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
     
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }


//desde aqui

//     $tiempo=0;

// for ($i=0; $i <=$postContador ; $i++) { 
//     try {
//         $post2 = new Usuarios();
      
//         $postValidar = $post2->  getIdPostValidar($i);
//         while($postValidar==0){
//             $i++ ;
//             $postValidar = $post2->  getIdPostValidar($i);
//             $tiempo++;
//             if($tiempo==500){
//                 break;
//             }
//           }

//           $dia=strval(date('d'));
//           $mes=strval(date('m'));
//           $anyo=strval(date('Y'));
          
//         if($postValidar==1){
            // las comprobaciones de fechas es para verificar que si ese vento se ha caducado o no en funcion de la fecha actual 
          //   $postFechafin = $post2-> getFechaFin($i);
          // $sacarM=strval(substr($postFechafin,0,2));
          // $sacarD=strval(substr($postFechafin,3,2));
          // $sacarY=strval(substr($postFechafin,6,4));
        
//hasta aqui


          // if($sacarY<=$anyo){
          //   if($mes<$sacarM){

        //aqui

      //       $postTitulo = $post2-> getTitulo($i);
      //       $postId = $post2->getIdPost($i);
      //   $postContenido = $post2-> getContenido($i);
      //   $postImagen = $post2-> getImagen($i);
      // $postFecha= $post2->  getFechaFin($i);
       //hasta aqui
      
       

    //   echo "  <div id=$postId class='col-md-4 d-flex ftco-animate'>";
    //   echo " <div class='blog-entry align-self-stretch'>";
    //    echo "  <a href='blog-single.html' class='block-20' style='background-image: url(img/root/$postImagen);'>";
    //      echo " </a>";
    //     echo  "<div class='text p-4 d-block'>";
    //      echo   "<div class='meta mb-3'>";
    //       echo    "<div><a href='#'>$postFecha</a></div>";
          
         
    //       echo  "</div>";
    //       echo   "<h3 class='heading mb-4'><a href='#'>$postTitulo</a></h3>";

    //       echo  "<p>$postContenido</p>";
    //    echo     "<p><a href='event.html'>Join Event <i class='ion-ios-arrow-forward'></i></a></p>";
    //      echo "</div>";
    //    echo "</div>";
    //  echo "</div>";




        
//     }
//     if($mes==$sacarM){
//         if($sacarD>$dia ){
        //     $postTitulo = $post2-> getTitulo($i);
        //     $postId = $post2->getIdPost($i);
        // $postContenido = $post2-> getContenido($i);
        // $postImagen = $post2-> getImagen($i);
        // $postFecha= $post2-> getFechaFin($i);

        //desde aqui
      //   $fechaValida=$sacarD."/".$sacarM."/".$sacarY;
       
      //   echo "  <div id=$postId class='col-md-4 d-flex ftco-animate' >";
        
      //   echo " <div id=atributo3 class='blog-entry align-self-stretch'>";
      //    echo "  <a   class='block-20 ' style='background-image: url(img/root/$postImagen);'>";
      //      echo " </a>";
      //     echo  "<div class='text p-4 d-block'>";
      //      echo   "<div class='meta mb-3' >";
      //       echo    "<div><a href='#'>$fechaValida</a></div>";
      //       echo " <p class='time-loc'><span class='mr-2'> Fecha de fin |</span> <span>Pichar en el titulo de abajo para leer más</span></p> ";
      //       echo  "</div>";
      //       echo   "<h3 class='heading mb-4'><a  class=tituloblog>$postTitulo</a></h3>";
          
      //       echo  "<p class=blog id=atributo>$postContenido</p>";
        
      //      echo "</div>";
      //    echo "</div>";
      //  echo "</div>";   
        //hasta aqui

//         }

// }

//     }

//desde aqui
//         }  
//     } catch (PDOException $e) {
//         error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
     
//         $errorsGuide['NoGuide'] = "Ha habido un error <br>";
//     }

 
// }
//hasta aqui
    ?>

  </div>
</div>
</div>

</section>
    <section class="ftco-section">
      <div class="container">
        <div class="row" id="contenido">
        
          <!-- <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-2.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-3.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-4.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-5.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-6.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>
    </section>
		
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