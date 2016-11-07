<?php session_start(); ?> 

<?php

if(!isset($_SESSION['userid']))
{
	echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/index.html'</script>";
	}
else{
	require("conexion.php");
	
	$cnn=new conexion();
	$con= $cnn->conectar();
	mysql_select_db('proyecto', $con);	
			
	
		$acercade=$_POST['acercade'];
		$fechanacimiento=$_POST['fechanacimiento'];
		$carpetafoto="imagenes/imagenesperfil/";
		$carpetacv="imagenes/cv/";
		$carpetacoverfoto="imagenes/coverfoto/";
		$idiomas=$_POST['idiomas'];
		$sexo=$_POST['sexo'];
		$residencia=$_POST['residencia'];
		$estudiosacademicos=$_POST['estudiosacademicos'];
		$h_universales=$_POST['universales'];
		$h_innatas=$_POST['innatas'];
		$_SESSION['carpeta']=$carpeta;
		$nombrearchivo_foto=$_FILES['cambiarfoto']['name'];
		$nombretemporal_foto=$_FILES['cambiarfoto']['tmp_name'];
		$nombrearchivo_coverfoto=$_FILES['coverfoto']['name'];
		$nombretemporal_coverfoto=$_FILES['coverfoto']['tmp_name'];
		$nombrearchivo_cv=$_FILES['subircv']['name'];
		$nombretemporal_cv=$_FILES['subircv']['tmp_name'];

		$rutaArchivo_foto=$carpetafoto.$nombrearchivo_foto;
		$rutaArchivo_cv=$carpetacv.$nombrearchivo_cv;
		$rutaArchivo_coverfoto=$carpetacoverfoto.$nombrearchivo_coverfoto;
	# si es un formato de imagen
            if($_FILES["cambiarfoto"]["type"]=="image/jpeg" || $_FILES["cambiarfoto"]["type"]=="image/pjpeg" || $_FILES["cambiarfoto"]["type"]=="image/gif" || $_FILES["cambiarfoto"]["type"]=="image/png")
            {
				if($_FILES["subircv"]["type"]=="application/pdf" || $_FILES["subircv"]["type"]=="application/msword" || $_FILES["subircv"]["type"]=="application/vnd.ms-excel" || $_FILES["subircv"]["type"]=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["subircv"]["type"]=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" )
				{
					if($_FILES["coverfoto"]["type"]=="image/jpeg" || $_FILES["coverfoto"]["type"]=="image/pjpeg" || $_FILES["coverfoto"]["type"]=="image/gif" || $_FILES["coverfoto"]["type"]=="image/png")
            {
			
					if(move_uploaded_file($nombretemporal_foto,$rutaArchivo_foto) && move_uploaded_file($nombretemporal_cv,$rutaArchivo_cv)&& move_uploaded_file($nombretemporal_coverfoto,$rutaArchivo_coverfoto))
					{
						
						$usuario=$_SESSION['userid'];
						$actualizarperfil="UPDATE perfil  set perfil_acercade='$acercade', perfil_fechanac='$fechanacimiento',  perfil_sexo='$sexo',  perfil_residencia='$residencia' , perfil_idiomas='$idiomas' , perfil_estudios_academicos='$estudiosacademicos' , perfil_h_universales='$h_universales' , perfil_h_innatas='$h_innatas' , perfil_curriculum='$nombrearchivo_cv' , coverfoto='$nombrearchivo_coverfoto', fecha=CURDATE() where ID_USUARIO='$usuario'";
						$actualizafoto="UPDATE USUARIO_PERSONAL set IMAGEN='$nombrearchivo_foto' where ID_USUARIO='$usuario'";
						if(mysql_query($actualizarperfil,$con) && mysql_query($actualizafoto,$con))
						{
							
							echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/perfil.php'</script>";
							
						}
					}
					else
					{
						echo "mal";
					}
			}
				}
			}
			else{
				echo '<script>alert("No se puede agregar este tipo de archivo")</script> ';
				echo "<script>location.href='http://localhost/PHP/proyectophp-master/intro/home.php'</script>";
			}

}
?>

