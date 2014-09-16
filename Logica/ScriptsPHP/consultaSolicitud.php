<?php
    require_once ('../Controler/HCsolicitud.php');
	
	session_start();
	$control = new HCsolicitud($_SESSION);
	
	if (isset($_POST['flag_prepare'])) 
	{
   		$flag = $_REQUEST['flagprepare'];
		if($flag)
		{
			$usuario = $control->getUsuario(TRUE);	
			$JsonUsuario = json_encode($usuario);
			echo $JsonUsuario;

      $dependencia = $control->getDependencia(TRUE);  
      $JsonDependecia = json_encode($dependencia);
      echo $JsonDependecia;

      $seccion = $control->getSeccion(TRUE);  
      $JsonSeccion = json_encode($seccion);
      echo $JsonSeccion;
		}
	}
	
  	$control ->cargarSolicitud(null);
  	$result = $control->obtenerConsulta();
    $usuario = $control->getUsuario();
    $dependencia = $control->getDependencia();
    $seccion = $control->getSeccion();

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
    		<li><a href="../../html/main.html">Inicio</a></li>
		    <li><a href="../../html/Empresa.html">Empresa</a></li>
       	 	<li><a href="../../html/Dependencia.html">Dependencia</a></li>
       	 	<li><a href="../../html/Seccion.html">Seccion</a></li>
       	 	<li><a href="../../html/Linea.html">Linea</a></li>
         	<li><a href="../../html/Sublinea.html">Sublinea</a></li>
       	 	<li><a href="../../html/Marca.html">Marca</a></li>
       	 	<li><a href="../../html/EstadoArticulo.html">Estado Articulo</a></li>
		 	    <li><a href="../../html/Articulo.html">Articulo</a></li>
          <li><a href="../../html/Solicitud.html">Solicitud</a></li>
         	<li><a href="../../html/Usuario.html">Usuario</a></li>
		 	<li><a href="../../index.html">Salir</a></li> <!-- no elimina sessions, por favor revisar -->
	  	 </ul>
	   </div> 
    <p>
    <div class="container">
		<div class="row">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="formularioSolicitud.html">Registrar</a></li>
		     		<li class="active"><a href="../Logica/ScriptsPHP/consultaSolicitud.html">Reportar</a></li>
		     		<li><a href="main.html">Volver</a></li>
				</ul>
      		</div>
      		<div class="col-md-10">
				<div class="container" style="padding-top: 1em;">
			  		<table class="table table-hover">
			  			<thead>
                <tr>
                  <th>ID</th>
                  <th>Solicitud</th>
                  <th>Tipo</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Solicitante</th>
                  <th>Usuario</th>
                  <th>Dependencia</th>
                  <th>Seccion</th>
                  <th>Nota de Envio</th>
                  <th>Fecha de Envio</th>}
                </tr>
              </thead>
			  		<tbody>
			      	<?php	
			      	        $count = count($result); 
			      			for ($index = 0; $index < $count; $index++) { 
								$row = $result[$index]; ?>
						<tr>	
							<td><?php echo $row['idsolicitud'];?></td>
						  	<td><?php echo $row['nota'];?></td>
						  	<td><?php echo ($row['tipo']);?></td>
                <td><?php echo ($row['fecha']);?></td>
                <td><?php echo ($row['estado']);?></td>
                <td><?php echo ($row['solicitante']);?></td>
                <td><?php echo $row['idusuario'];?></td>
                <td><?php echo ($row['iddependencia']);?></td>
                <td><?php echo ($row['idseccion']);?></td>
                <td><?php echo ($row['notaenvio']);?></td>
                <td><?php echo ($row['fechaenvio']);?></td>
						</tr>
					<?php } ?> 
			       </table>     
			     </div>		
      		</div>
		</div>               
    </div>
    </body> 
</html>
