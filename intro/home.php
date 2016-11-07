<?php 
session_start();
$user=$_SESSION['userid'];
require("conexion.php");
$cnn=new conexion();
$con= $cnn->conectar();

			mysql_select_db('proyecto', $con);
			
			$imagen="SELECT imagen FROM  USUARIO_PERSONAL WHERE ID_USUARIO =  '$user'";
			$resultado=mysql_query($imagen,$con);
			$carpetafoto="imagenes/imagenesperfil/";
			
		
			if(mysql_num_rows($resultado)>0)
		{	
			$fila = mysql_fetch_array($resultado);
			$_SESSION['fotoperfil']=$fila["imagen"];
			
			
		}
			
if(!isset($_SESSION['userid']))
 {
 	header("Location: http://localhost:8080/intro/index.html");
 }
else{?>



<!DOCTYPE html>
<html lang="eng">
<head>

	<meta charset="UTF-8">
	<title>
		Crowd
	</title>
	<meta name="viewport" content="width=width-device,user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link rel="stylesheet"  href="css/fileinput.css" media="all"  type="text/css">
	<link rel="stylesheet" href="css/newcss.css">
	<link  rel = "stylesheet"  type = "text/css"  href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"> 
    <script  src = "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js" ></script> 
    <script  src = "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js" ></script> 
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/fileinput.min.js" type="text/javascript"></script>
	
	
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	
 </head>
<body>
<div class="navbar-wrapper">
<style type="text/css">
.navbar-collapse{background-color: #0B1554;}
.navbar-header{background-color: #0B1554;}
.modal-header {background-color: #66b3ff}

</style>
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" >
      
        <div class="navbar-header">
			<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</a>
			<a class="navbar-brand" style="color:white;"  href="http://localhost:8080/intro/home.php">OutSourcing</a>
          
        </div>
        <div class="navbar-collapse collapse ">
        
      	    <div class="form-group">
             
					<div class="col-sm-5 col-md-8">
						<form class="navbar-form" role="search"  action="perfil_ver2.php" method="post">
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

				
    <!-- Brand and toggle get grouped for better mobile display -->
    			     <div class="form-inline float-xs-right" style="height: 2px;">
    			     <form action="" method="post" >
					 <select class="form-group" name="categorias"  style="height: 30px; margin-top: 10px;">
       				 <option value="Todos">Todos</option>
					  <option value="2">Logos</option>
					  <option value="1">Diseño web</option>
					  <option value="3">Marketing</option>
					  <option value="4">Medio Ambiente</option>
					  <option value="5">Politica</option>
    			 </select>
    			  
      	             <button class="btn btn-default btn-md " style="margin-top: 8px; height: 30px; width: 40px;" type="submit"><i class="glyphicon glyphicon-search "></i></button>
      					</div>
      					</form>
      					</div>

					<ul class="nav navbar-nav  navbar-right" style="height: 0px; ">
				   <li class="nav-item">
				   <a style="color:white;" href="http://localhost:8080/intro/home.php">Inicio</a></li>
			
							<li class="dropdown">
								 <a  style="color:white;" href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
								<img src="<?php echo $carpetafoto.$_SESSION['fotoperfil'];  ?>" width="30" height="30" class="img-circle special-img"> <?php echo $user; ?> <b class="caret"></b></a>
										<ul class="dropdown-menu">
							
								<li><a href="#"><i class="fa fa-cog"></i> Mi Cuenta</a></li>
								<li class="divider"></li>
								<li><a  href="http://localhost:8080/intro/signout.php" ><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a></li>
										 </ul>
							</li>
					</ul>

      		</div>
      	
        </div>


    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->
<hr>





				 
 <div id="wrapper">
  <div id="columns">
  <?php
	if(isset($_POST["categorias"]))
	{
		$seleccion = $_POST["categorias"];
		if($seleccion=='Todos')
		{
			$traerpost="SELECT * FROM PUBLICACIONES INNER JOIN usuario_personal on usuario_personal.ID_USUARIO=PUBLICACIONES.ID_USUARIO";		
		}
		else{
		$traerpost = "SELECT * FROM PUBLICACIONES INNER JOIN usuario_personal on usuario_personal.ID_USUARIO=PUBLICACIONES.ID_USUARIO where Categoria='$seleccion'";
	}
	}else
		{
	$traerpost="SELECT * FROM PUBLICACIONES INNER JOIN usuario_personal on usuario_personal.ID_USUARIO=PUBLICACIONES.ID_USUARIO";				
		}
	
	$poststraidos=mysql_query($traerpost,$con);
	$carpetadestino="imagenes/imagenesapp/";
	$contador=0;
    $num=1;
	while (($fila = mysql_fetch_array($poststraidos))!=NULL){?>
	<form action="mostrarengrande.php" method="POST">
		<div class="pin">
	<img src="<?php echo $carpetadestino.$fila["IMG"];?>" />
		 <div class="well"> 
        <?php echo $fila["descripcion"];?>
      </div>
	  <div class ="row">
	   <input  type="submit"   value="Ver +" class="btn btn-default btn col-md-3 col-xs-3 text-left">
	 <!--   .'('.$fila["tipo_usuario"].')' -->
	  <a name="a" class="col-md-6 col-xs-3 text-center" href="#">Por: <?php echo $fila["ID_USUARIO"].'('.$fila["tipo_usuario"].')'; ?>   </a>
	  <input type="text" name="valor1" value="<?php echo $fila["ID_POST"];?>" hidden>
	  

       </div>
       </div>
       </form>
      

<?php  } ?>
</div>
</div>



<div class="share-wrapper col-xs-1 col-xs-push-10" >
   <a href="javascript:void(0)" data-toggle="modal" data-target="#publicar">
     <i class="glyphicon glyphicon-plus btn btn-info btn-raised withripple" style="color:none; background: #0B1554; font-size: 30px; padding-left: 16px; padding-top: 14px; height: 60px;">
       <div class="share-ripple ripple-wrapper" ></div>
       </i>
    </a>  
</div> 






<div id="publicar" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content-->
   <div class="modal-content">

      <div class="modal-header">
        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:white;" ><center>Nueva publicacion</center></h4>
      </div>
      <div class="modal-body ">
        <form action="subirarchivo.php" method="POST" enctype="multipart/form-data" >
			<div class="form-group">
			<label>Titulo:</label>
                   <input type="text" class="form-control" name="titulo">
              <div class="row">
                <div class="col-xs-6 col-md-3">
				<label>Nivel de estudio:</label>
				<div class="btn-group">
					<select id="estudio" name="estudio" class="form-control">
					  <option value="1">Indiferente</option>
					  <option value="2">Bachillerato</option>
					  <option value="3">Técnico</option>
					  <option value="4">Universitario</option>
					</select>
							  
				 </div>
                 </div>
                 <div class="col-xs-6 col-md-3">
                   <label>Idioma:</label>
                   <input type="text" class="form-control" name="idioma">
                </div>
                <div class="col-xs-6 col-md-2">
                   <label>Oferta:</label>
                   <input type="text" class="form-control" placeholder="$" name="precio">
                </div>
                <div class="col-xs-6 col-md-2">
                   <label>Vence:</label>
                  <div class="form-group">
                <div class='input-group ' style="width: 50px;">
                    <input type='date' class="form-control" name="fecha"   />
                  
                </div>
            </div>
        </div>
        
              </div>
      			<textarea class="form-control" rows="3" name="descripcion" placeholder="Breve descripcion de proyecto"></textarea>
				 </br>
				<textarea class="form-control" rows="5" name="especificaciones" placeholder="Mas especificaciones del proyecto"></textarea>
				 </br>	
          <div class="btn-group">
				<input id="input-4" name="subirarchivo" type="file"  class="btn btn-default">
					<script>
					$(document).on('ready', function() {
						$("#input-4").fileinput({showCaption: false});
					});
					</script>
             
				<div class="btn-group">
					<select id="selectbasic" name="selectbasic" class="form-control">
					  <option value="1">Diseño web</option>
					  <option value="2">Logos</option>
					  <option value="3">Marketing</option>
					  <option value="4">Medio Ambiente</option>
					  <option value="5">Politica</option>
					</select>
							  
				 </div>
				</div>
				<br/>
				<br/>
				<center><input type="Submit" value="Publicar" class="btn btn-primary btn"> </input></center>
			</div>
		</form>
      </div>
	
	  
     
     </div>

  </div>
</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/fileinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

</body>

</html>
<?php mysql_close($con);
  }?>

