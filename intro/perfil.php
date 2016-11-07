<?php 
session_start();
$user=$_SESSION['userid'];
require("conexion.php");
$cnn=new conexion();
$con= $cnn->conectar();

			mysql_select_db('proyecto', $con);
			
			
			$imagen="SELECT * FROM  USUARIO_PERSONAL WHERE ID_USUARIO =  '$user'";
			$info_perfil="SELECT * FROM perfil where ID_USUARIO='$user'";
			$perfil_result=mysql_query($info_perfil,$con);
			$resultado=mysql_query($imagen,$con);
			$carpetafoto="imagenes/imagenesperfil/";
			$carpetacv="imagenes/cv/";
			$carpeta_coverfoto="imagenes/coverfoto/";
			if(mysql_num_rows($resultado)>0 && $perfil_result>0)
		{	
			$fila = mysql_fetch_array($resultado);
			$fila_perfil=mysql_fetch_array($perfil_result);
			$_SESSION['fotoperfil']=$fila["IMAGEN"];
			
			
		}
		
// if(!isset($_SESSION['userid']))
// {
// 	header("Location: http://localhost/PHP/proyectophp-master/intro/index.html");
// }
//else{
?>


<!DOCTYPE html>
<html lang="eng">
<head>

	<meta charset="UTF-8">
	<title>
		Crowd
	</title>
	<meta name="viewport" content="width=width-device,user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link  rel = "stylesheet"  type = "text/css"  href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"> 
	<link rel="stylesheet"  href="css/fileinput.css" media="all" rel="stylesheet" type="text/css">
	<script  src = "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js" ></script> 
    <script  src = "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js" ></script> 
	
	<script src="js/fileinput.min.js" type="text/javascript"></script>
	<style type="text/css">
               .btn-social {
            color: white;
            opacity: 0.8;
        }

            .btn-social:hover {
                color: white;
                opacity: 1;
                text-decoration: none;
            }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-twitter {
            background-color: #00aced;
        }

        .btn-linkedin {
            background-color: #0e76a8;
        }

        .btn-google {
            background-color: #c32f10;
        }
    </style>
	
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
 
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
			<a class="navbar-brand" href="home.php">CrowdSourcing</a>
          
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
  <img src="http://localhost/PHP/proyectophp-master/intro/<?php echo $carpeta_coverfoto.$fila_perfil["coverfoto"];  ?>" width="1140" height="300"/>
  <i class="icon-picture"></i>
  
	 <div class="navbar navbar-success">
			<ul class="nav navbar-nav">
				  <li class="divider-vertical">
				  <li><a href="http://localhost/PHP/proyectophp-master/intro/perfil.php">Mi perfil</a></li>
				  <li><a href="http://localhost/PHP/proyectophp-master/intro/portafolio.php?usuario=<?php echo $user;?>">Portafolio</a></li>
				  <li><a href="http://localhost/PHP/proyectophp-master/intro/mispublicaciones.php">Mis Publicaciones</a></li>
				  <li><a href="http://localhost/PHP/proyectophp-master/intro/perfil_modificar.php">Modificar Perfil</a></li>
		  
			</ul>
	  </div>
  </div>
  <div class="container">
  <div class="row">
  	<div class="col-md-12">
    
      <div class="panel panel-default">
			<div class="panel-body">
              		<div class="row">
                      <div class="col-xs-12 col-sm-12 text-center">
                                <img src="<?php echo $carpetafoto.$_SESSION['fotoperfil'];  ?>" width="300" height="300" alt="" class="center-block img-circle img-responsive">
                                 </br></br>
                        </div><!--/col--> 
						 <div class="col-xs-12 col-sm-12 text-center">
                            <h2><strong>245</strong></h2>                    
                            <p><small>Posts</small></p>
                        </div><!--/col-->
						
						  <div class="col-xs-12 col-sm-8">
								
								<h2><?php echo $fila["NOMBRE"];?> <?php echo $fila["APELLIDOS"];?></h2>
								<a href="javascript:void(0)"  data-toggle="modal" data-target="#ver_cv" class="btn btn-xs bg-yellow"><span class="glyphicon glyphicon-eye-open"></span> Ver CV</a>
								<a href="http://localhost/PHP/proyectophp-master/intro/<?php echo $carpetacv.$fila_perfil["perfil_curriculum"];?>"  download class="btn btn-xs bg-red"><span class="glyphicon glyphicon-cloud-download"></span> Descargar CV</a>
								</br>
						  </div>
							 
                        </div><!--/col--> 
						</br>
                        <div class="col-xs-12 col-sm-8">
						
							 <div class="bg-teal-gradient" style="padding-bottom: 10px; padding-left: 10px;">
							 <h2> Informacion basica</h2>
								   <p><strong>Acerca de: </strong> <?php echo $fila_perfil["perfil_acercade"]; ?> </p>
										<p><strong>Fecha de nacimiento: </strong><?php echo $fila_perfil["perfil_fechanac"]; ?> </p>
										<p><strong>Genero: </strong><?php echo $fila_perfil["perfil_sexo"]; ?> </p>
										<p><strong>Ciudad de residencia: </strong> <?php echo $fila_perfil["perfil_residencia"]; ?></p>
										<p><strong>Idiomas: </strong>
											<span class="label label-info tags"><?php echo $fila_perfil["perfil_idiomas"]; ?></span> 
										</p>
										<p><strong>Estudios academicos: </strong>
											<span class="label label-info tags"><?php echo $fila_perfil["perfil_estudios_academicos"]; ?></span> 
										</p>
							</div>
							
                            
                        </div><!--/col-->          
                       

                        <div class="col-xs-12 col-sm-4">
                            <div  class="bg-green-gradient"style="padding-bottom: 10px; padding-left: 10px;">
								<h2> Habilidades </h2> 
								<h3> Habilidades Universales:  </h3>
										<p>
											<?php echo $fila_perfil["perfil_h_universales"]; ?>
										</p>
								<h3> Habilidades Innatas:  </h3>
										<p>
											<?php echo $fila_perfil["perfil_h_innatas"]; ?>
										</p>
										
							</div>
                        </div><!--/col-->
                       
                        
              		</div><!--/row-->
              </div><!--/panel-body-->
          </div><!--/panel-->

    
    
    </div>
  </div>
</div>
  
  
 

  
     
  <!--crear nuevo post  nuevo -->
<div class="share-wrapper col-xs-1 col-xs-push-10" >
   <a href="javascript:void(0)" style="background: none" data-toggle="modal" data-target="#publicar">
     <i class="glyphicon glyphicon-plus btn btn-info btn-raised withripple" style="color: #03a9f4; background: rgba(255, 255, 255, 0.90); font-size: 30px; padding-left: 16px; padding-top: 14px; height: 60px;">
       <div class="share-ripple ripple-wrapper" ></div>
       </i>
    </a>  
</div> 

<div id="publicar" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crear nuevo post</h4>
      </div>
      <div class="modal-body ">
        <form action="subirarchivo.php" method="POST" enctype="multipart/form-data" >
			<div class="form-group">
			<label>Titulo:</label>
                   <input type="text" class="form-control" name="titulo">
              <div class="row">
                <div class="col-xs-6 col-md-3">
                      <div class="form-group ">
                        <label for="sel1">Nivel de estudio:</label>
                      <select id="estudio" name="estudio" class="form-control">
					  <option value="Indiferente">Indiferente</option>
					  <option value="Bachillerato">Bachillerato</option>
					  <option value="Técnico">Técnico</option>
					  <option value="Universitario">Universitario</option>
					</select>
                         </div>
                 </div>
                 <div class="col-xs-6 col-md-3">
                   <label>Idioma:</label>
                   <input type="text" class="form-control" name="idioma">
                </div>
                <div class="col-xs-6 col-md-3">
                   <label>Oferta:</label>
                   <input type="text" class="form-control" placeholder="$" name="precio">
                </div>
                <div class="col-xs-6 col-md-3">
                   <label>Vence:</label>
                  <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="fecha" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>
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
					  <option value="Diseño web">Diseño web</option>
					  <option value="Logos">Logos</option>
					  <option value="Marketing">Marketing</option>
					  <option value="Medio Ambiente">Medio Ambiente</option>
					  <option value="Politica">Politica</option>
					</select>
							  
				 </div>
				</div>
				<br/>
				<br/>
				<input type="Submit" value="Publicar" class="btn btn-success btn"> </input>
			</div>
		</form>
      </div>
	
	  
     
     </div>

  </div>
</div>

<div id="ver_cv" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CURRICULUM VITAE</h4>
      </div>
      <div class="modal-body ">
      
     <iframe name"ventana" src="http://localhost/PHP/proyectophp-master/intro/<?php echo $carpetacv.$fila_perfil["perfil_curriculum"];?>" width="100%" height="400"></iframe>
     </div>
	</div>
  </div>
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
 //} 
?>
