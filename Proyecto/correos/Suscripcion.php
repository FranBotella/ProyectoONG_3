

<?php 
    $statusMsg  = !empty( $_SESSION [ 'msg' ])? $_SESSION [ 'msg' ]: '' ; 
    unset ( $_SESSION [ 'mensaje' ]); 
    echo  $statusMsg ; 
    $_SESSION["mensaje"]="bien";
?>

<html>
    <head>
        <link rel="stylesheet" href="./css/estilo.css">
        <link rel="stylesheet" href="css/normalizar.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
       
<nav class="menu navbar navbar-expand-lg " >
	<div class="container-fluid" >

					<a href="index.php?ctl=inicio" class="navbar-brand"  ><img id="logo" src="./img/logoGUP.jpg"></img></a>
				
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     			 <span class="navbar-toggler-icon"></span>
</button>
			
				
				

				 <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MENU
          </a> -->
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
				<li class="nav-item" >
					<a href="index.php?ctl=informacion" class="nav-link" >INFORMACION</a>
				</li>
				<li class="nav-item"  >
					<a href="index.php?ctl=donaciones" class="nav-link" >DONAR</a>
				</li>
				<li class="nav-item" >
					<a href="index.php?ctl=eventos" class="nav-link" >EVENTOS</a>
				</li>
			
				<li class="nav-item" >
					<a href="index.php?ctl=tienda"class="nav-link" >TIENDA</a>
				</li>
				<li class="nav-item" >
					<a href="index.php?ctl=carrito" class="nav-link" >CARRITO</a>
				</li>	
				<li class="nav-item" >
					<a href="index.php?ctl=perfil" class="nav-link" >PERFIL</a>
				</li>
				<li class="nav-item" >
					<a href="index.php?ctl=suscribirse" class="nav-link" >SUSCRIBIRSE</a>
				</li>
			</ul>
			
		</div>
	</div>
</nav>

<div id="body">
    <div id="suscribirse">
<form ACTION="index.php?ctl=enviarSuscripcion" METHOD="post"  >
	<h1>Suscribirse</h1>
    <p><label>Nombre:</label><input type="text" class="inputnewsletter" name="fname"PLACEHOLDER=" nombre"></input></p>
    
    <p><label>Apellido:</label><input type="text" class="inputnewsletter" name="nombre"PLACEHOLDER=" apellido"></input></p>
    
    <p><label >Correo:</label><input type="text"  class="inputnewsletter" name="correo_electrónico" PLACEHOLDER="  correo"></input></p>
    
<p><input type="submit" id="btn-suscribirse"  name="submit" value="Suscribirse" /></p>
<h1>Desuscribirse</h1>
    <input type="checkbox" id="cbox1" name="cbox1" value="desuscribirse"> no quiero recibir newsletter
<p><input type="submit" id="btn-suscribirse"  name="desuscribirse" value="Desuscribirse" /></p>
</form>

</div>

</div>
<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
			<p>Asociación GUP</p>
	<p>

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p>

Teléfono 616-420-909

</p>
<p>

asociaciongup@hotmail.es



</p>
<a  href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
		<a href="index.php?ctl=politicas_de_privacidad"  role="link">POLITICAS DE PRIVACIDAD</a>
	</div>
			</div>
		
		</div>
	</div>
	</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../JS/functiones.js"></script>
<script src="../JS/jquery.js"></script>
<script src="../JS/jquery-ui.min.js"></script>
<body>
</html>




