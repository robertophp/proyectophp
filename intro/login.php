<?php

$nombre   = "";
$apellido = "";
$usuario  = "";
$correo   = "";
$contra   = "";
$contra1  = "";

$nombre   = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario  = $_POST['usuario'];
$correo   = $_POST['correo'];
$tipo_usuario=$_POST['tipo'];
$contra   = md5($_POST['contra']);
$contra1  = md5($_POST['contra2']);


		if($contra1 != $contra)
		{
			echo '<script>alert("Las contraseñas no son iguales")</script> ';
			echo "<script>location.href='http://localhost:8080/intro/index.html'</script>";
		}
		else
		{
			require("conexion.php");

			$cnn=new conexion();
			$con= $cnn->conectar();
			mysql_select_db('proyecto', $con);
	
			$consultaexisteusuario="SELECT * FROM  USUARIO_PERSONAL WHERE ID_USUARIO =  '$usuario' OR EMAIL ='$correo'";
			$resultado=mysql_query($consultaexisteusuario,$con);
	
	if(mysql_num_rows($resultado)>0)
		{
			header("Location: http://www.pymesv.com/sitesmash/intro/errorcrearusuario.php");
		}
	else
		{
		$sql= "INSERT INTO USUARIO_PERSONAL (ID_USUARIO,tipo_usuario,contra,NOMBRE, APELLIDOS,EMAIL,imagen)VALUES('$usuario','$tipo_usuario','$contra','$nombre','$apellido','$correo','logo.png')";
		$retval=mysql_query($sql,$con);
		
				session_start();
				$_SESSION['userid']=$usuario;
				//aqui empiezo yo con la confirmacion.
				$mensaje = "Registro en www.pymesv.com/sitesmash/intro/index.html\n\n";
				$mensaje .= "Estos son tus datos de registro:\n";
				$mensaje .= "Usuario: $usuario.\n";
				$mensaje .= "Contraseña: $contra.\n\n";
				$mensaje .= "Tu cuenta ha sido creada exitosamente puedes hacer uso de Crowdsorcing cuando quieras";
				
				
				
				$asunto = "Cuenta Creada exitosamente";
				if(mail($correo,$asunto,$mensaje))
					{
					echo '<script>alert("Te has registrado correctamente")</script> ';
					echo "<script>location.href='http://localhost:8080/intro/home.php'</script>";
					//echo "Se ha enviado un mensaje a tu correo electronico con el código de activación";
					}
					else
					{
						echo "Ha ocurrido un error y no se puede enviar el correo";
					}
						//aqui termino yo con la confirmacion
						
				
					
			
	
	
	mysql_close($con);
		}
	
		}	
	
	




?>


