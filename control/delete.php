<?php 
require_once "../conexion.php";

// Función para eliminar el producto seleccionado mediante el método POST
function eliminar(){
	$mysql = conexionSQL();

	$q = "DELETE FROM productos WHERE producto='".$_POST['producto']."'";
	$mysql -> query($q);
	$mysql -> close();
	print($q);
	header("Location:../vista/administrar.php");
}

eliminar();

?>