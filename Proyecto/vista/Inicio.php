<?php ob_start() ?>


<!-- 
carrusel -->
<div id="borrar">
  
  <div id="demo" class="carousel slide " data-bs-ride="carousel" tabindex="1">

  <!-- Indicators/dots -->
  <!-- <div class="carousel-indicators">
    <button type="button" aria-label="boton para primera imagen" role="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" aria-label="boton para segunda imagen" role="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" aria-label="boton para tercer imagen" role="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" aria-label="boton para cuarta imagen" role="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div> -->

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="imgCarruselInicio" src="./img/root/263.jpg" alt="niñosSenegal1" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/400.jpg" alt="niñosSenegal2" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/IMG_20150315_144911.jpg" alt="niñosSenegal3" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/129.jpg" alt="niñosSenegal4" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button  role="button" aria-label="boton lado izquierdo para pasar imagen" class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button role="button" aria-label="boton lado derecho para pasar imagen" class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

</div>

<button  type="button" hidden id="botonCookies"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Politica de cookies
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
       
       
      </div>
      <div class="modal-body">
      <p>Esta página web usa cookies
Las cookies de este sitio web se usan para personalizar el contenido y los anuncios, ofrecer funciones de redes sociales y analizar el tráfico. Además, compartimos información sobre el uso que haga del sitio web con nuestros partners de redes sociales, publicidad y análisis web, quienes pueden combinarla con otra información que les haya proporcionado o que hayan recopilado a partir del uso que haya hecho de sus servicios</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
      <p>Asociación GUP</p>
	<p tabindex="2">

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="3">

Teléfono 616-420-909

</p>
<p tabindex="4">

asociaciongup@hotmail.es



</p>
<a tabindex="5" role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="6" role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
    <a href="index.php?ctl=politicas_de_privacidad" tabindex="7" role="link">POLITICAS DE PRIVACIDAD</a>
</div>
			</div>
		
		</div>
	</div>
	</footer>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>