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
    <link rel="stylesheet" href="css/donate.css">
    <link rel="icon" type="image/x-icon" href="img/logoGUP.icon">

    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />

    <script src="https://www.paypal.com/sdk/js?client-id=AWmGgGx3hG3Yt8e5Pzgz-eyGgBkNw7xXqj1kGrBl15LWjB7h32HcnSymcE7pces7x0_w4M2C90GT1aq3&currency=USD"></script>
  </head>
  <body>
  <?php	
  
   $entrar="";
	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';
   
      
	}
	include $menu;
  if($menu=='menuInvitado.php'){
    $entrar=false;
  }
  else{
    $entrar=true;
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
          <li class="nav-item active"><a href="index.php?ctl=donaciones" class="nav-link">Donar</a></li>
          <li class="nav-item"><a href="index.php?ctl=tienda" class="nav-link">Tienda</a></li>
          <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="index.php?ctl=eventos" class="nav-link">Eventos</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav> -->
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php?ctl=inicio">Inicio</a></span> <span>Donar</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Donar</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" id="donaciones">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/donar1.avif);"></div>
        				<div class="info ml-4" >
        					<h3 id="donar1" tabindex="1" role="button" >10 €</h3>
        					
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" id="donaciones2">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/donar2.webp);"></div>
        				<div class="info ml-4">
        					<h3 id="donar2" tabindex="2" role="button">20 €</h3>
        					
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" id="donaciones3">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/donar3.webp);"></div>
        				<div class="info ml-4">
                <h3 id="otraCantidad" tabindex="3" aria-label="Introducir Cantidad">Otra cantidad</h3>
                  <input tabindex="4" type="number" id="precioDI" aria-label="introdducir cantidad"></input>
        					
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" id="donaciones4">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/donar4.jpg);"></div>
        				<div class="info ml-4">
                  <p>Seleccionar Causa:</p>
        				<select name="titleD" id="titleD" tabindex="4" aria-label="Seleccionar causa" >
                    <option role="option" value="Comedor Social">Comedor Social </option>
                   <option  role="option" value="Albert Ballerini" >Senegal</option>
                   <option role="option" value="Asociacion" >Asociacion</option>
                </select>
        					
        				</div>
        			</div>
        		</div>
        	</div>
        
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" id="donaciones2">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/donar5.webp);"></div>
        				<div class="info ml-4">
                <div id="btn-donaciones" >
                  <input tabindex="6" id="BTN-BTNContinuar"   class="btn btn-danger" TYPE="submit" NAME="Continuar" VALUE="Continuar" tabindex="5" role="buton">
                </div>
        					
        				</div>
        			</div>
        		</div>
        	</div>


      </div>
    </section>
    <?php

   
      if($entrar==true){
      ?>
    <dialog id="modal">
<form method="dialog"  id="formModal">

    <label><?php echo $_SESSION["user"] ?></label>
    <br>
    <label>Tu correo<p ><?php echo $_SESSION["email"]?></p></label>
    <br>
    <label>Cantidad <p id="CDonada"></p>euros</label>
    
    <label>Destinado a : <p id="CCausa"></p></label>
    

    <!-- paypal -->
    <div id="paypal-button-container">
      
    </div>
    <button role="button" id="btn-cerrar-modal" type="submit">Cerrar</button>
    
</form>
</dialog>
 <?php
      }else{
       $entrar==false;
      //  echo "<script language='javascript'>";
      //  echo "alert('Necesitas iniciar sesión para realizar la donación')";
      //  echo "</script>"; 
      //  echo "<p>Necesitas iniciar sesión para realizar la donación</p>";
      }
     
    
 ?>

 <?php
if($entrar!=true){
 ?>

<script language='javascript'>
  var btnContinuar = document.getElementById("BTN-BTNContinuar");
  btnContinuar.addEventListener("click", function () {
    document.getElementById("mensajeDonar").innerHTML="NECESITAS INICIAR SESIÓN PARA REALIZAR LA DONACIÓN";
  })
     </script>
    
<?php
 $entrar==false;
}
?>


 <p id="mensajeDonar"></p>

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

<script src="js/jquery-ui.min.js"></script>

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