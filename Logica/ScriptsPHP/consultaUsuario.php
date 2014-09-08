<?php
require_once ('../Controler/HCusuario.php');
    session_start();
  
  	$control = new HCusuario($_SESSION);
  	$control ->cargarUsuario(null);
  	$result = $control->obtenerConsulta();
	
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    
    <div class="container">
      <!-- Logo Empresa -->
      <div class="row">
        <div class="col-md-4">
          <img src="imagenes/logo.gif">
      	</div>
      	<div class="col-md-4">
      		<h1>Sofyinventarios<br> 
      		<small> v. Beta </small>
      		</h1>
      	</div>
      </div>	
    </div>

      
    <!-- menu superior -->
     <div class="container" style="padding-top: 1em;">
  		 <ul class="nav nav-tabs nav-justified">
    		 <li><a href="main.html">Inicio</a></li>
		     <li><a href="Empresa.html">Empresa</a></li>
         	 <li><a href="Dependencia.html">Dependencia</a></li>
         	 <li class="active"><a href="Linea.html">Linea</a></li>
		     <li><a href="Usuario.html">Usuario</a></li>
		     <li><a href="index.html">Salir</a></li> <!-- no elimina sessions, por favor revisar -->
	  	 </ul>
	   </div> 
    <p>
    <div class="container">
		<div class="row">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="formularioEmpresa.html">Registrar</a></li>
		     		<li class="active"><a href="../Logica/ScriptsPHP/consultaEmpresa.php">Reportar</a></li>
		     		<li><a href="main.html">Volver</a></li>
				</ul>
      		</div>
      		<div class="col-md-10">
				<div class="container" style="padding-top: 1em;">
			  		<div class="table-responsive">
			  		<table class="table table-hover">
			  			<thead>
			    			<tr>
			      				<th>ID</th>
			      				<th>Nombres</th>
			      				<th>Apellidos</th>
			      				<th>Cedula</th>
			      				<th>Direccion</th>
			      				<th>Ciudad</th>
			      				<th>Telefono</th>
			      				<th>Correo</th>
			      				<th>Usuario</th>
			      				<th>Seccion</th>
			    			</tr>
			  			</thead>
			  		<tbody>
			      	<?php	$count = count($result); 
			      			for ($index = 0; $index < $count; $index++) { 
								$row = $result[$index]; ?>
						<tr>	
							<td><?php echo $row['idusuario'];?></td>
						  	<td><?php echo $row['nombres'];?></td>
						  	<td><?php echo $row['apellidos'];?></td>
						  	<td><?php echo $row['cc'];?></td>
						  	<td><?php echo $row['direccion'];?></td>
						  	<td><?php echo $row['ciudad'];?></td>
						  	<td><?php echo $row['telefono'];?></td>
						  	<td><?php echo $row['correo'];?></td>
						  	<td><?php echo $row['usuario'];?></td>
						  	<td><?php echo $row['idseccion_secciones'];?></td>
						</tr>
					<?php 	} ?> 
			       </div>	
			       </table>     
			     </div>		
      		</div>
		</div>               
    </div>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
       <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    </body> 
</html>