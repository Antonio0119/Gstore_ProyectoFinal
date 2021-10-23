<?php 

// Se definen los datos del servidor y la base de datos
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASS","");
define("DB","proyectofinal");

// Función que realiza la conexión mysql
function conexionSQL(){
	$link = new mysqli(SERVIDOR,USUARIO,PASS,DB);
	if($link->connect_error) {
		$error = "Error de conexion: ".$link->connect_errno
				."Mensaje: ".$link->connect_error;
		die($error);
	}else{
		$q = "SET CHARACTER SET UTF8";
		$link->query($q);
		return $link;
	}
}
		
?>