<?php ob_start() ?>

<div id="borrar">
    <div class="div-perfil container text-center p-1">
        <form id="perfilForm" action="index.php?ctl=perfil" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                <div class="box"><img class="foto-perfil" src=
                    <?php
                        echo "./img/" . $_SESSION['user'] . "/image.png";
                    ?>>
                </div>
                
                <!--User's information-->
                
                <label>Usuario :<label  tabindex="1"><?php echo $userGet ?></label></label>
                <!-- <div class="name-user">
                    <label  tabindex="1"><?php echo $userGet ?></label><br>
                </div> -->
                <br>
                <?php
             
                 if( $_SESSION["mensaje"]!="bien"){
                    echo "<p>Correo ya existe o no es valido</p>";
                } ?>
                <label>Email :  <input  tabindex="2" type="text" value="<?php echo $emailGet?>" name="Email" id="Email" class="slope"></input></label>
                <!-- <div class="user-box">
                    <input  tabindex="2" type="text" value="<?php echo $emailGet?>" name="Email" id="Email" class="slope"></input><br>
                </div> -->
               <br>
              
                <label>Cambiar imagen de perfil :</label><br>
                <input type="file" name="imagen" id="imagen"/>
                <br>
                <input type="submit" class="buttonForm optionButton" name="submitImage" value="Aceptar"/>
                <input type="button" id="Cancel" class="buttonForm optionButton" name="Cancel" value="Cancelar" onClick="perfil.php"/>
                <br>
            </div>
            <input aria-label="cerrar sesion" role="button"  tabindex="3" type="submit" class="buttonForm" name="SignOff" value="Desloguearse" />
            <br>
            <?php
                if (isset($_REQUEST["SignOff"])) {
                    session_destroy();
                    header("location:index.php?ctl=inicio");
                }
            ?>
        
        </form>
    </div>
            </div>
    <footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
            <p>Asociación GUP</p>
	<p  tabindex="4">

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p  tabindex="5">

Teléfono 616-420-909

</p>
<p  tabindex="6">

asociaciongup@hotmail.es



</p>
<a aria-label="enlace a facebook" role="link"  tabindex="7" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a aria-label="enlace a instagram" role="link"  tabindex="8" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
        <a href="index.php?ctl=politicas_de_privacidad" tabindex="9" role="link">POLITICAS DE PRIVACIDAD</a>
    </div>
			</div>
		
		</div>
	</div>
	</footer>
    <script>
        //Restores values of inputs to nothing =""
        let cancel = document.getElementById("Cancel");

        cancel.addEventListener('click', () => {
            let cancelV = document.querySelectorAll(".slope");
            cancelV.forEach(name => {
                document.getElementById(name.id).value = "";
            })
        });
    </script>
</body>
 
</html>
<?php
    if (isset($_REQUEST['submitImage'])) {
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
                //change img profile in this page
                $nameFile = "image.png";
                if (is_file("./img/" . $_SESSION['user'] . "/" . $nameFile)) {
                    unlink("./img/" . $_SESSION['user'] . "/image.png");
                }

                move_uploaded_file($directorioTemp, './img/' . $_SESSION['user'] . '/' . $nameFile);
                header("Refresh:0");
            }
        }
     
       
    }

     if(isset($_REQUEST["submitImage"])){
        
    try {
       
            //comprobar que el correo es valido
        if (preg_match("#[\w\._]{3,}@\w{5,}\.+[\w]{2,}#i", $_POST["Email"]) == 1) {
            $usuario = new Usuarios();
           
           
            
                $_SESSION["mensaje"]="bien";
                $update = $usuario->actualizainfo( $_POST["Email"],$_SESSION["user"]);
                header("location:index.php?ctl=informacion");
            
        }  else{
            $_SESSION["mensaje"]="mal";
           
            echo $_SESSION["mensaje"];
            header("location:index.php?ctl=perfil");
        }
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Code: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Error <br>";
    }  
}
else{
    $_SESSION["mensaje"]="bien"; 
}

?>



<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>





