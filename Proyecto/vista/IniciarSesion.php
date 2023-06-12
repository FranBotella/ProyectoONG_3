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
	<!-- formulario -->
	<div class="container text-center p-1">
		<form id="formuRegistro" ACTION="index.php?ctl=iniciarSesion" METHOD="post" NAME="formIniciar">
		<br>	
		<p>Usuario</p>
		<p>* <input  TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="             usuario" tabindex="1" > <br></p>
		<p>Contraseña</p>
		<i>Minimo 12 caracteres, una letra en mayúscula y un número</i>	
		<p id="btnPSW">* <input  id="password2" TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="           Contraseña" tabindex="2" ><img id="ojo" src="./img/ojoCerrado.png" alt=""><br></p>
		<!-- <input type="button" role="button" id="ojo" value="Mostrar/ocultar contraseña"> -->
	
	<!-- </input> -->
			<div id="BTNregistro">
				<div class="botones">
					<div >
					<p>¿No tienes cuenta?</p>
					<p><a role="link" href="index.php?ctl=registro" tabindex="3">Registrarse</a></p>
					</div>
					<div>
					<p><a  role="link" href="index.php?ctl=recuperarContrasenya" tabindex="4">Recuperar Contraseña</a></p>
					</div>
					<input   id="BTN-BTNregistro" TYPE="submit" NAME="bIniciarSesion" VALUE="Iniciar Sesión" tabindex="5" role="button"><br>
				
				</div>
			</div>
			
		</form>
		
	</div>
	<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
	<p tabindex="6">Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="7">

Teléfono 616420909

</p>
<p>

asociaciongup@hotmail.es



</p>
<a  tabindex="8" role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="9" role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
		<a href="index.php?ctl=politicas_de_privacidad" tabindex="10" role="link">POLITICAS DE PRIVACIDAD</a>
	</div>
			</div>
		
		</div>
	</div>
	</footer>
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>