<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<div id="formularioCT">
<?php
$estado="pendiente";
try {
    $post = new Usuarios();
        
        $idUsu= $post->getIDUser($_SESSION["user"]);
       
       $productosCarrito= $post->getCarrito($idUsu, $estado);
    
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }


echo "<div id='formularios'>";
    echo "<form id='carritoFORM' name='carritoForm' ACTION='index.php?ctl=carrito' METHOD='post' >";

    foreach (  $productosCarrito as $arrayC) {
      $TituloPC1=  $arrayC["tituloProducto"];
      $PrecioPC1 = $arrayC["precio"];
      $CantidadPC1=  $arrayC["cantidad"];

       
      echo "<div class='itemcarrito'>";
   
        echo " <input type='text' class='tituloPCarrito' name='tituloProductoCarrito' value='$TituloPC1' readonly></input> ";
     
     echo "<br>";
       echo "<p class='textoCarrito'>Precio</p>";
      $PrecioPC1=$PrecioPC1."€";
       echo "<p class='textoCarrito'>$PrecioPC1</p>";
       echo "<p class='invisble'></p>";
       echo "<p class='textoCarrito'>Cantidad</p>";
       echo "<input type='number' name='cantidadPCarrito' class='cantidadCarrito' value='$CantidadPC1' ></input>";
       echo "<br>";
    //    al pulsar este boton y al confirmar la compra se borrara el productoi elegido y se volvera al carrito por si quisieras borrar alguno mas 
       echo "<input  role='button'  aria-label='confirmar quitar producto'  TYPE='button' NAME='BCarrito' class='BCarrito' VALUE='Quitar'>";
      
       echo "</div>";
       echo "<br>";


      
    }
    // calcula el total del carrito de la compra 
    echo "<p id='CTOTAL'  ></p>";
    echo "<input TYPE='text' name='elementoseleccionado' id='elementoseleccionado' value='' hidden></input>";
    echo "<input role='button' tabindex='1' aria-label='confirmar compra si no se ha seleccionado boton quitar compra,sino eliminara producto y no se habra confirmado compra'  TYPE='submit' NAME='bCarrito' id='bCarrito1' VALUE='Confirmar'>";

 
   
    echo "</form>";








echo "</div>";


?>
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
<a tabindex="5" role="link" aria-label="Enlace a facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="6" role="link" aria-label="Enlace a instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
        <a href="index.php?ctl=politicas_de_privacidad" tabindex="7" role="link">POLITICAS DE PRIVACIDAD</a>
    </div>
			</div>
		
		</div>
	</div>
	</footer>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>