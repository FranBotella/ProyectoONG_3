<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div class="div-perfil container text-center p-1">
        <form id="eliminarForm" action="index.php?ctl=editarPrecioProducto" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                
            <p>titulo</p>
			<p>* <input  TYPE="text" NAME="titulo" VALUE="" PLACEHOLDER="titulo"> <br></p>
            
            <p>genero</p>
            <select name="generos" id="generos">
  <option value="Ropa">Ropa</option>
  <option value="Bolsos" >Bolsos</option>
  <option value="Artesania">Artesania</option>
  <option value="Bisuteria">Bisuteria</option>
  <option value="Estuches">Estuches</option>
</select>
<br>
<p>Nuevo Precio</p>
			<p>* <input  TYPE="number" NAME="precio" VALUE="" PLACEHOLDER="nuevoPrecio"> <br></p>            
                <br>
                <input  id="BTN-BTNregistro" TYPE="submit" NAME="bEditar" VALUE="editar"><br>
            </div>
          
        </form>
    </div>

    <footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<img id="socialMedia"  src="./img/facebook.png" ></img>
			<img  id="socialMedia"  src="./img/instgram3.png" ></img>
			</div>
		</div>
	</div>
	</footer>
   
</body>
 
</html>





<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>