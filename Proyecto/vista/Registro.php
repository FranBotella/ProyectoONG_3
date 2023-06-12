<?php ob_start() ?>
	

	<!-- sacar mensajes de error -->
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
	
		<!-- formulario -->
	
	<div class="container text-center p-1">
		<form id="formuRegistro" ACTION="index.php?ctl=registro" METHOD="post" NAME="formRegistro">
			<br>
			<p>Usuario</p>
			<p>* <input tabindex="1" TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="             Usuario" aria-label="introducir usuario"> <br></p>
			<p>Contraseña</p>
			<i>Minimo 12 caracteres, una letra en mayúscula y un número</i>
			<p id="btnPSW">* <input tabindex="2" id="password" TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="           Contraseña" aria-label="introducir contraseña"><img id="ojo2" src="./img/ojoCerrado.png" alt=""><br></p>
		<!-- <input type="button" id="ojo2" value="Mostrar/ocultar contraseña"></input> -->
		
			<p>Email</p>
			<p>* <input tabindex="3" TYPE="text" NAME="email" VALUE="<?php echo $params['email'] ?>" PLACEHOLDER="               email" aria-label="introducir email"><br></p>
			<div id="BTNregistro">
				<div class="botones">
					<div >
					<p>¿Ya tienes cuenta?</p>
					
					<p><a role="link" tabindex="4" href="index.php?ctl=iniciarSesion">IniciarSesion</a></p>
					</div>
				
				<input tabindex="5" role="button" id="BTN-BTNregistro"  TYPE="submit" NAME="bRegistro" VALUE="Registrarse"><br>
				</div>
			</div>
		</form>
	</div>
	<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p >Contáctanos</p>
	<p tabindex="6">Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="7">

Teléfono 616420909

</p>
<p tabindex="8">

asociaciongup@hotmail.es



</p>
<a  tabindex="9" role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="10" role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
		<a href="index.php?ctl=politicas_de_privacidad" tabindex="11" role="link">POLITICAS DE PRIVACIDAD</a>
	</div>
			</div>
		
		</div>
	</div>
	</footer>
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>