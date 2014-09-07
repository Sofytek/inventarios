<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>  
  <head>  
    <meta http-equiv="content-type" content="text/html; charset=windows-1250">  
    <title>
      Registro de Empresa
    </title>  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </head>  
  <body>         
    <form class="form-horizontal" action="../logica/Controler/requestEmpresa.php" method="POST">
      <fieldset>
        <!-- Form Name -->
        <legend>Registro Empresa
        </legend>
        <!-- Text input-->
        <div class="form-group">  
          <label class="col-md-4 control-label" for="textinput">Nombre
          </label>     
          <div class="col-md-4">  
            <input id="empresa" name="empresa" placeholder="Nombre empresa" class="form-control input-md" type="text">  

          </div>
        </div>
        <!-- Multiple Checkboxes -->
        <div class="form-group">  
          <div class="col-md-4">  
            <div class="checkbox">    
              <label for="checkboxes-0">      
                <input name="activo" id="activo" value="1" type="checkbox">Activo
              </label>	
            </div>  
          </div>
        </div>
        <!-- Button -->
        <div class="form-group">  
          <div class="col-md-4">    
            <button id="singlebutton" name="Registrar" class="btn btn-primary">Registrar
            </button>  
          </div>
        </div>
      </fieldset>
    </form>  
  </body>
</html>