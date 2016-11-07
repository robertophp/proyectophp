<?php 
session_start();
$user=$_SESSION['userid'];
require("conexion.php");
$cnn=new conexion();
$con= $cnn->conectar();

			mysql_select_db('proyecto', $con);
			
			
			$imagen="SELECT * FROM  USUARIO_PERSONAL WHERE ID_USUARIO =  '$user'";
			$resultado=mysql_query($imagen,$con);
			$carpetafoto="imagenes/imagenesperfil/";
			if(mysql_num_rows($resultado)>0)
		{	
			$fila = mysql_fetch_array($resultado);
			$_SESSION['fotoperfil']=$fila["IMAGEN"];
			
			
		}
				$info="SELECT * FROM perfil WHERE ID_USUARIO='$user'";
				$resultadoinfo= mysql_query($info, $con);
				$array_info= mysql_fetch_array($resultadoinfo);
		
				
		$acercade=$array_info["perfil_acercade"];
		$fechanac=$array_info["perfil_fechanac"];
		$sexo=$array_info["perfil_sexo"];
		$residencia=$array_info["perfil_residencia"];
		$idiomas=$array_info["perfil_idiomas"];
		$estudios=$array_info["perfil_estudios_academicos"];
		$h_universales=$array_info["perfil_h_universales"];
		$h_innatas=$array_info["perfil_h_innatas"];
		$google=$array_info["perfil_google"];
		$facebook=$array_info["perfil_facebook"];
		$linkedin=$array_info["perfil_linkedin"];
		$twitter=$array_info["perfil_twitter"];
		$curriculum=$array_info["perfil_curriculum"];
		$coverfoto1=$array_info["coverfoto"];
		
//if(!isset($_SESSION['userid']))
//{
//	header("Location: http://www.pymesv.com/sitesmash/intro/index.html");
//}
//else{
		?>

<!DOCTYPE HTML>
<html lang="eng">
<head>

	<meta charset="UTF-8">
	<title>
		Crowd
	</title>
	<meta name="viewport" content="width=width-device,user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link rel="stylesheet"  href="css/fileinput.css" media="all" rel="stylesheet" type="text/css">
	<link  rel = "stylesheet"  type = "text/css"  href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"> 
	<script  src = "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js" ></script> 
    <script  src = "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js" ></script> 
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
	
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	<script src="js/fileinput.min.js" type="text/javascript"></script>
 
 </head>

<body>
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
      
        <div class="navbar-header">
			<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</a>
			<a class="navbar-brand" href="#">CrowdSourcing</a>
          
        </div>
        <div class="navbar-collapse collapse">
        
      	    <div class="form-group">
             
					<div class="col-sm-5 col-md-8">
						<form class="navbar-form" role="search" action="perfil_ver2.php" method="post">
							<div class="input-group">
								<input type="text" id="texto" class="form-control" placeholder="Buscar" name="q">
								<script type="text/javascript">
									
								 $(function(){   
									$("#texto").autocomplete({
									  source: "voto.php"
									 
									});
									});
								   
								</script>	
								<div class="input-group-btn">
									<button class="btn btn-default " type="submit"><i class="glyphicon glyphicon-search "></i>.</button>
								</div>
							</div>
						</form>
					</div>
							  
					<ul class="nav navbar-nav navbar-right" >
						  <li><a href="http://localhost/PHP/proyectophp-master/intro/home.php">Inicio</a></li>
						  <li><a href="http://localhost/PHP/proyectophp-master/intro/mail.php">Mensajes</a></li>
							<li class="dropdown">
								 <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
								<img src="<?php echo $carpetafoto.$_SESSION['fotoperfil'];  ?>" width="30" height="30" class="img-circle special-img"> <?php echo $user; ?> <b class="caret"></b></a>
										<ul class="dropdown-menu">
								<li><a href="http://localhost/PHP/proyectophp-master/intro/perfil.php"><i class="fa fa-cog"></i> Mi Cuenta</a></li>
										
								<li class="divider"></li>
								<li><a href="http://localhost/PHP/proyectophp-master/intro/signout.php" ><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
										</ul>
							</li>
									
					</ul>

      		</div>
      	
        </div>


    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->
  

  
  <div class="container">
  </br> </br></br>
  <!--<form -->
    <h1>Editar Perfil</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
	  
        <form class="form-horizontal" role="form" action="perfil_actualiza.php" method="POST" enctype="multipart/form-data">
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php echo $carpetafoto.$_SESSION['fotoperfil'];  ?>" class="avatar img-circle" alt="avatar" width="200" height="200" >
          <h6>Cambiar foto de perfil...</h6>
          
          <input id="input-5" type="file" class="form-control" class="btn btn-default" name="cambiarfoto" value="<?php echo $_SESSION['fotoperfil']; ?>" >
		  <script>
					$(document).on('ready', function() {
						$("#input-5").fileinput({showCaption: false});
					});
					</script>
		  </br></br>
		  <h6><strong>SUBIR CV</strong></h6>
		  <input id="input-6" type="file" class="form-control" class="btn btn-default" name="subircv" value="<?php echo $curriculum; ?>" >
		  <script>
					$(document).on('ready', function() {
						$("#input-6").fileinput({showCaption: false});
					});
					</script>
					
			</br></br>
		  <h6><strong>Cambiar CoverPhoto</strong></h6>
		  <input id="input-7" type="file" class="form-control" class="btn btn-default" name="coverfoto" value="<?php echo $coverfoto; ?>">
		  <script>
					$(document).on('ready', function() {
						$("#input-7").fileinput({showCaption: false});
					});
					</script>		
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Informacion basica</h3>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Acerca de:</label>
            <div class="col-lg-8">
              <textarea rows="4" class="form-control" type="text"  name="acercade"  > <?php echo $acercade; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Fecha de nacimiento:</label>
            <div class="col-lg-8">
              
                <input type='text' class="form-control" id='fecha'  name="fechanacimiento" value="<?php echo $fechanac; ?>">
				<script>
					$( document ).ready(function() {
						$('#fecha').datepicker();
					});
				</script>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Genero:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control" name="sexo" value="<?php echo $sexo; ?>">
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                 </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Ciudad de Residencia:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="residencia" value="<?php echo $residencia; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Idiomas: </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="idiomas" value="<?php echo $idiomas; ?>">
			  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Estudios Academicos:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="estudiosacademicos" value="<?php echo $estudios; ?>">
            </div>
          </div>

		  <h3>Habilidades</h3>
			<div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
           <strong>Competencias universales</strong>Son las competencias adquiridas. Es la capacidad que has ganado para realizar determinadas tareas en entornos laborales y profesionales..
        </div>
		<div class="form-group">
		    <label class="col-md-3 control-label">Competencias Universales</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="universales" value="<?php echo $h_universales; ?>">
            </div>
          </div>
		  <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
           <strong>Habilidades innatas</strong>son aquellas habilidades que tienes como persona y que tambien pueden aportar algo en tu entorno laboral.
        </div>
		<div class="form-group">
		    <label class="col-md-3 control-label">Habilidades innatas</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="innatas" value="<?php echo $h_innatas; ?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="Submit" class="btn btn-primary" value="Guardar Cambios">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancelar">
            </div>
          </div>
        </form>
      </div>
  </div>
  </form>
</div>


  <!--termina crear nuevo post  nuevo -->
  
 
 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/fileinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
</body>

</html>
<?php mysql_close($con);
// } 
?>
