<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div class="div-perfil container text-center p-1">
        <form id="insertarForm" action="index.php?ctl=insertarProducto" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                
            <p>titulo</p>
			<p>* <input  TYPE="text" NAME="titulo" VALUE="" PLACEHOLDER="titulo"> <br></p>
            <p>contenido</p>
            <p>* <textarea  name="contenido" rows="3" cols="50"></textarea><br></p>
            <br>
            <p>precio</p>
            <p>* <input  TYPE="number" NAME="precio" VALUE="" PLACEHOLDER="precio"> <br></p>
            <p>genero</p>
            <select name="generos" id="generos">
  <option value="Ropa">Ropa</option>
  <option value="Bolsos" >Bolsos</option>
  <option value="Artesania">Artesania</option>
  <option value="Bisuteria">Bisuteria</option>
  <option value="Estuches">Estuches</option>
</select>
<br>
                <label>subir imagen :</label><br>
                <input type="file" name="imagen" id="imagen"/>
                <br>
                <br>
                <input  id="BTN-BTNregistro" TYPE="submit" NAME="bAñadir" VALUE="añadir"><br>
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
<?php
    if (isset($_POST['bPost'])) {
        if (($_FILES['imagen']['error'] != 0)) {
            switch ($_FILES['imagen']['error']) {
                case 1:
                    $errors["imagen"] = "UPLOAD_ERR_INI_SIZE. File very big";
                    break;
                case 2:
                    $errors["imagen"] = "UPLOAD_ERR_FORM_SIZE. File very big";
                    break;
                case 3:
                    $errors["imagen"] = "UPLOAD_ERR_PARTIAL. File update is interrumpt ";
                    break;
                case 4:
                    $errors["imagen"] = "UPLOAD_ERR_NO_FILE. File is not update";
                    break;
                case 6:
                    $errors["imagen"] = "UPLOAD_ERR_NO_TMP_DIR. Without temporal folder <br>";
                case 7:
                    $errors["imagen"] = "UPLOAD_ERR_CANT_WRITE. Not to write in the disk<br>";

                default:
                    $errors["imagen"] = 'Error undefined.';
            }
        } else {
            $nameFile = $_FILES['imagen']['name'];
            $directorioTemp = $_FILES['imagen']['tmp_name'];

            $tamanyoFile = filesize($directorioTemp);
            $extension = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));

            if (!in_array($extension, $extensions)) {
                $errors["imagen"] = "The extension is not valid";
            }
            if ($tamanyoFile > $max_file_size) {
                $errors["imagen"] = "The image is more " . $max_file_size;
            }

            if (empty($errors)) {
          
              
              
                move_uploaded_file($directorioTemp, './img/' . 'root' . '/imgTienda'.'/' . $_FILES['imagen']['name']);
                
                header("Refresh:0");
            }

            
          

        }
     
      
    }


?>





<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>