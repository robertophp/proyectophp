<?php 
session_start();
$user=$_SESSION['userid'];
require("conexion.php");
$cnn=new conexion();
$con= $cnn->conectar();


			mysql_select_db('proyecto', $con);
	if(isset($_SESSION['userid']))
{		
			$idpost=$_SESSION['idpost'];
			$prueba1="SELECT ID_USUARIO from PUBLICACIONES where ID_POST='$idpost'";
			$prueba2="SELECT * FROM post_aplicaciones where ID_USUARIO='$user' AND ID_POST='$idpost'";
			$resultado1=mysql_query($prueba1,$con);
			$usuariopost=mysql_fetch_array($resultado1);
			$resultado2=mysql_query($prueba2,$con);
			$carpetafoto="imagenes/imagenesperfil/";
			$consulta="INSERT INTO post_aplicaciones (ID_POST,ID_USUARIO,FECHA) VALUES ('$idpost','$user',CURDATE())";
			
			
			if($usuariopost["ID_USUARIO"]==$user)
		{
		echo '<script>alert("No puede aplicar a una publicacion generada por usted mismo")</script> ';
				echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/mostrarengrande.php'</script>";
		}
		else if(mysql_num_rows($resultado2)>0)
		{
		echo '<script>alert("Ya aplico a esta publicacion")</script> ';
				echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/mostrarengrande.php'</script>";
		}
		else
		{
			if(mysql_query($consulta,$con))
			{	
				echo '<script>alert("HAS APLICADO CON EXITO!")</script> ';
				echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/mostrarengrande.php'</script>";
			}
		}
}else{
	header("Location: http://localhost/PHP/proyectophp-master/intro/index.html");
}
?>