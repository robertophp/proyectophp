<?php session_start(); ?> 

<?php

if(!isset($_SESSION['userid']))
{
	echo "<script>location.href='http://localhost:8080/intro/index.html'</script>";
	}
else{
	require("conexion.php");
	
	$cnn=new conexion();
	$con= $cnn->conectar();
	mysql_select_db('proyecto', $con);	
			
	
		$descripcion=$_POST['descripcion'];
		$titulo=$_POST['titulo'];
		$categoria=$_POST['selectbasic'];
		$estudio=$_POST['estudio'];
		$carpeta="imagenes/imagenesapp/";
		$idioma=$_POST['idioma'];
		$precio=$_POST['precio'];
		$fecha=$_POST['fecha'];
		$especifi=$_POST['especificaciones'];
		$_SESSION['carpeta']=$carpeta;
		$nombrearchivo=$_FILES['subirarchivo']['name'];
		$nombretemporal=$_FILES['subirarchivo']['tmp_name'];

		$rutaArchivo=$carpeta.$nombrearchivo;
	# si es un formato de imagen
            if($_FILES["subirarchivo"]["type"]=="image/jpeg" || $_FILES["subirarchivo"]["type"]=="image/pjpeg" || $_FILES["subirarchivo"]["type"]=="image/gif" || $_FILES["subirarchivo"]["type"]=="image/png" || $_FILES["subirarchivo"]["type"]=="application/pdf" || $_FILES["subirarchivo"]["type"]=="application/msword" || $_FILES["subirarchivo"]["type"]=="application/vnd.ms-excel" || $_FILES["subirarchivo"]["type"]=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["subirarchivo"]["type"]=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" )
            {
				if(move_uploaded_file($nombretemporal,$rutaArchivo))
				{
					
					$usuario=$_SESSION['userid'];
					$insertarpost="INSERT INTO publicaciones (ID_USUARIO,descripcion, IMG, categoria,nivel_estudio,Idioma,oferta,especificaciones,Titulo) values ('$usuario','$descripcion','$nombrearchivo','$categoria','$estudio','$idioma','$precio','$especifi','$titulo')";
					if(mysql_query($insertarpost,$con))
					{
						$_SESSION['publicacionexitosa']=true;
						echo '<script>alert("POST REALIZADO CON EXITO")</script> ';
						echo "<script>location.href='http://localhost:8080/intro/home.php'</script>";
					}
				}
				else
				{
					echo "mal";
				}
			}
			else{
				echo '<script>alert("No se puede agregar este tipo de archivo")</script> ';
				echo "<script>location.href='http://localhost:8080/intro/home.php'</script>";
			}

}
?>

