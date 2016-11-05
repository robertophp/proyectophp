<?php

$name = $_REQUEST['term'];
require("conexion.php");   
$cnn=new conexion();
$con= $cnn->conectar();
mysql_select_db('basesmash', $con);
$consulta = "SELECT NOMBRE , Categoria FROM USUARIO_PERSONAL inner join PUBLICACIONES on USUARIO_PERSONAL.ID_USUARIO=PUBLICACIONES.ID_USUARIO WHERE NOMBRE LIKE     '%name%' OR  Categoria LIKE '%name%'";
$result=mysql_query($consulta,$con);
if(mysql_num_rows($result)>0)
	{
   while( $filas=mysql_fetch_array($result)){
   $prueba[] = $filas['NOMBRE'];

    }
    while( $filas=mysql_fetch_array($result)){
   $prueba[] = $filas['categoria'];
   }
echo json_encode($prueba);
}
?>
                  