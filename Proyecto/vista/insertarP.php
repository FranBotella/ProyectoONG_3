<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div class="div-perfil container text-center p-1">
        <form id="insertarForm" action="index.php?ctl=insertarP" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                
            <p>titulo</p>
			<p>* <input  TYPE="text" NAME="titulo" VALUE="" PLACEHOLDER="titulo"> <br></p>
            <p>contenido</p>
            <p>* <textarea  name="contenido" rows="20" cols="200"></textarea><br></p>
         <p>Fecha inicio</p>
                <input id="datepicker" name="fechain" VALUE="" type="text"></input>   
                <br>
            <label>Fecha Fin</label>
            <br>
            <input id="datepicker2" name="fechafin" VALUE="" type="text"></input>   
            <br>
           
			
                <label>subir imagen :</label><br>
                <input type="file" name="imagen" id="imagen"/>
                <br>
                <br>
                <input  id="BTN-BTNregistro2" TYPE="submit" NAME="bPost" VALUE="Postear"><br>
            </div>
          
        </form>
    </div>

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
          
              
              
                move_uploaded_file($directorioTemp, './img/' . 'root' . '/' . $_FILES['imagen']['name']);
                
                header("Refresh:0");
            }

            
          

        }
     
      
    }


?>





<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>