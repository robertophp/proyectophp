<?php
if(isset($_POST['usuario1']) && isset($_POST['contra1']))
{			
			$usuario = $_POST['usuario1'];
			$contra  = md5($_POST['contra1']);
			require("conexion.php");
	        session_start();
			$cnn=new conexion();
			$con= $cnn->conectar();
			mysql_select_db('proyecto', $con);
			
			
			$datosdeusuario="SELECT * FROM  usuario_personal WHERE ID_USUARIO =  '$usuario' AND contra ='$contra'";
			$resultado=mysql_query($datosdeusuario,$con);
	
		if(mysql_num_rows($resultado)>0)
		{
			$_SESSION['userid']=$usuario;
			header("Location: http://localhost:8080/intro/home.php");
		}
		else
		{		

				echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTA INTENTELO DE NUEVO")</script> ';
				echo "<script>location.href='http://localhost:8080/intro/index.html'</script>";

		}
		mysql_close($con);
}

		

?>