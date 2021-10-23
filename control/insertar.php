<?php 
require_once "../conexion.php";

// Función para insertar propiedades al DB obtenidas por método POST
function insertarProducto(){
	$mysql = conexionSQL();

	// Origen y destino de la imagen
	$origen = $_FILES['imagen']['tmp_name'];
	$destinopc = "../img/".$_POST['producto'].".jpg";
    $destinodb = "img/".$_POST['producto'].".jpg";
	move_uploaded_file($origen, $destinopc);

	$q = "INSERT INTO productos (producto,descripcion,tipo,precio,imagen,detalles) VALUE ("
		."'".$_POST['producto']."',"
		."'".$_POST['descripcion']."',"
		."'".$_POST['tipo']."',"
        ."'".$_POST['precio']."',"
		."'".$destinodb."',"
        ."'".$_POST['detalles']."'"
		.")";

	$mysql->query($q);
	$mysql->close();
	header("Location:../vista/administrar.php");
}

insertarProducto();
?>