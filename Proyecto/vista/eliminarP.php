<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div class="div-perfil container text-center p-1">
        <form id="eliminarForm" action="index.php?ctl=eliminarP" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                
            <p>titulo</p>
			<p>* <input  TYPE="text" NAME="titulo" VALUE="" PLACEHOLDER="titulo"> <br></p>
            
                <br>
                <input  id="BTN-BTNregistro2" TYPE="submit" NAME="bEliminar" VALUE="eliminar"><br>
            </div>
          
        </form>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
	<p >Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p >

Teléfono 616420909

</p>
<p >

asociaciongup@hotmail.es



</p>
<a  role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a  role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
</div>
			</div>
		
		</div>
	</div>
	</footer>
   
</body>
 
</html>






<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>