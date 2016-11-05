<?php

class conexion{
	function conectar(){
		
		$host="localhost";
		$user="root";
		$pwd="nVC3XJt2nmyF5Lxx";
		$bdd="proyecto";

		return mysql_connect($host,$user,$pwd,$bdd);
	}
}

?>