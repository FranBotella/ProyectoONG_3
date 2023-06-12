<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<!-- botones de administrador para insertar y eliminar blogs en la base de datos -->
<?php if( $nivel==2){?>
    <div id="botonesAdminEventos">
        
<form id="formuInsertar" ACTION="index.php?ctl=insertarP" METHOD="post" NAME="formInsertar">
<input type="submit" class="buttonForm" id="insertarPost" name="insertar" value="INSERTAR" />
</form>
<form id="formuInsertar" ACTION="index.php?ctl=eliminarP" METHOD="post" NAME="formEliminar">
<input type="submit" class="buttonForm" id="eliminarPost" name="bEliminar" value="ELIMINAR" />
</form>
</div>
<?php }?>
<div id="borrar">

<?php

$tiempo=0;

for ($i=0; $i <=$postContador ; $i++) { 
    try {
        $post2 = new Usuarios();
      
        $postValidar = $post2->  getIdPostValidar($i);
        while($postValidar==0){
            $i++ ;
            $postValidar = $post2->  getIdPostValidar($i);
            $tiempo++;
            if($tiempo==500){
                break;
            }
          }

          $dia=strval(date('d'));
          $mes=strval(date('m'));
          $anyo=strval(date('Y'));
          
        if($postValidar==1){
            // las comporbaciones de fechas es para verificar que si ese vento se ha caducado o no en funcion de la fecha actual 
            $postFechafin = $post2-> getFechaFin($i);
          $sacarM=strval(substr($postFechafin,0,2));
          $sacarD=strval(substr($postFechafin,3,2));
          $sacarY=strval(substr($postFechafin,6,4));
        

          if($sacarY<=$anyo){
            if($mes<$sacarM){
               
            $postTitulo = $post2-> getTitulo($i);
            $postId = $post2->getIdPost($i);
        $postContenido = $post2-> getContenido($i);
        $postImagen = $post2-> getImagen($i);
       
        echo "<div id=$postId class=blog>";
      
        echo "<a class=tituloblog >$postTitulo </a>";
        
        echo "<img class=imagenesEve src=./img/root/$postImagen></img>";
        echo "<p>$postContenido</p>";
        
        echo "</div>";
       
        
    }
    if($mes==$sacarM){
        if($sacarD>$dia ){
            $postTitulo = $post2-> getTitulo($i);
            $postId = $post2->getIdPost($i);
        $postContenido = $post2-> getContenido($i);
        $postImagen = $post2-> getImagen($i);
       
        echo "<div id=$postId class=blog>";
      
        echo "<a class=tituloblog >$postTitulo </a>";
        
        echo "<img class=imagenesEve src=./img/root/$postImagen></img>";
        echo "<p>$postContenido</p>";
        
        echo "</div>";      
        }

}

    }
        }  
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
     
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }

 
}

?>

</div>

<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter"  >
			<p>Contáctanos</p>
            <p>Asociación GUP</p>
	<p tabindex="1">

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="2">

Teléfono 616-420-909

</p>
<p tabindex="3">

asociaciongup@hotmail.es



</p>
<a  href="https://www.facebook.com/asociaciongup/?locale=es_ES" tabindex="4" role="link"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a href="https://www.instagram.com/asociaciongup/?hl=es" tabindex="5" role="link">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
        <a href="index.php?ctl=politicas_de_privacidad" tabindex="6" role="link">POLITICAS DE PRIVACIDAD</a>
    </div>
			</div>
		
		</div>
	</div>
	</footer>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>