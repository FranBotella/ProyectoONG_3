
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>tienda-virtual</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
<link rel="stylesheet" href="css/normalizar.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&display=swap" rel="stylesheet">
<!-- paypol -->
<script src="https://www.paypal.com/sdk/js?client-id=AWmGgGx3hG3Yt8e5Pzgz-eyGgBkNw7xXqj1kGrBl15LWjB7h32HcnSymcE7pces7x0_w4M2C90GT1aq3&currency=USD"></script>

</head>

<body>


<div id="contenedor_carga">
		<div id="carga"></div>
		
</div>

<?php	
	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';
	}
	include $menu;
	
    ?>


<div id="body">
    
 <!-- <div class="container-fluid  "> -->
		<div > 
			<div class=" pt-2" id="contenido">
			<?php echo $contenido ?>
			</div>
		 </div>
	<!-- </div> -->

		
	</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../JS/functiones.js"></script>
<script src="../JS/jquery.js"></script>
<script src="../JS/jquery-ui.min.js"></script>
<script >
    
        $("#datepicker").datepicker();
   
</script>
<script >
    
        $("#datepicker2").datepicker();
   
</script>
<script>
	window.onload=function(){
		var contenedor=document.getElementById('contenedor_carga');
		contenedor.style.visibility='hidden';
		contenedor.style.opacity='0';
		var body=document.getElementById('contenido');
		body.style.visibility='visible';
		body.style.opacity='100';
	}
</script>
</body>
</html>