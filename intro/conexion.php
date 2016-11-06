<?php

class conexion{
	function conectar(){
		
		$host="ec2-52-27-236-219.us-west-2.compute.amazonaws.com";
		$user="root";
		$pwd="awsmysql";
		$bdd="proyecto";

		return mysql_connect($host,$user,$pwd,$bdd);
	}
}

?>