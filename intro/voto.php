<?php

$name = $_REQUEST['term'];
require("conexion.php");   
$cnn=new conexion();
$con= $cnn->conectar();
mysql_select_db('proyecto', $con);
$consulta = "SELECT ID_USUARIO FROM USUARIO_PERSONAL where ID_USUARIO LIKE '%$name%'";
$result=mysql_query($consulta,$con);
if(mysql_num_rows($result)>0)
	{
   while( $filas=mysql_fetch_array($result)){
   $prueba[] = $filas['ID_USUARIO'];
   }

echo json_encode($prueba);
}
?>