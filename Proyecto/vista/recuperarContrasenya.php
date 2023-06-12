<?php ob_start() ?>
		<!-- sacar mensajes de error si te has equivocado -->
		<div class="container text-center py-2">
		<div class="col-md-12">
			<?php if(isset($params['mensaje'])) :?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
		</div>
		<div class="col-md-12">
			<?php foreach ($errores as $error) {?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error."<br>"; ?></span></b>
			<?php } ?>
		</div>
	</div>
<?php if($contrasenya==""){ ?>
<div class="container text-center p-1">
		<form id="formurecuperarContrasenya" ACTION="index.php?ctl=recuperarContrasenya" METHOD="post" NAME="formRecuperarContrasenya">
			<br>
			
			<p>Introducir Correo con el que te registrastes</p>
			<p>* <input TYPE="text" NAME="email" VALUE="" PLACEHOLDER="email"><br></p>
			<div id="BTNrecuperarContrasenya">
				
				
				<input id="BTN-BTNrecuperarContrasenya"  TYPE="submit" NAME="brecuperarContrasenya" VALUE="recuperarContrasenya"><br>
				</div>
			</div>
		</form>
	</div>
    <?php } ?>
    <?php if($contrasenya!=""){ ?>



        <div class="container text-center p-1">
        <form id="formurecuperarContrasenya" ACTION="index.php?ctl=recuperarContrasenya" METHOD="post" NAME="formRecuperarContrasenya">
        <p>Vuelve a introducir el correo</p>
			<p>* <input TYPE="text" NAME="email2" VALUE="" PLACEHOLDER="        email"><br></p>

    <p>* <input TYPE="text" NAME="contraseñaNueva" VALUE="" PLACEHOLDER="        contraseñaNueva"><br></p>
    <input id="BTN-BTNuevaContrasenya"  TYPE="submit" NAME="bNuevaContrasenya" VALUE="NuevaContrasenya"><br> 
    </form>  
    </div>
<?php }?>
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
</div>
			</div>
		
		</div>
	</div>
	</footer>
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>