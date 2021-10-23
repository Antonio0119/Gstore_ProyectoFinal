<?php 
require_once "../conexion.php";

// Función para actualizar información de un producto
function actualizarProducto(){

    // Se obtiene la información de un producto por id mediante el método GET
	$mysql = conexionSQL();
    $id = $_GET['id'];
    $q1 = "SELECT * FROM productos WHERE id=$id";
    if($Producto = $mysql->query($q1)){
        $p = $Producto->fetch_assoc();
    }

    // Origen y destino de la imagen
	$origen = $_FILES['imagen']['tmp_name'];
	$destinopc = "../img/".$_POST['producto'].".jpg";
	move_uploaded_file($origen, $destinopc);

    // Si el origen se encuentra vacio, se mantiene la imagen actual del producto
    if($origen==""){
        $destinodb = $p['imagen'];
    }
    // Si el origen no está vacio, se agrega la imagen subida mediante el método POST
    else{
        $destinodb = "img/".$_POST['producto'].".jpg";
    }

    // Se actualiza la información del producto obtenida en el formulario con el método POST
	$q = "UPDATE productos SET producto='".$_POST['producto']."', descripcion='".$_POST['descripcion']."', tipo='".$_POST['tipo']."', 
    precio='".$_POST['precio']."', imagen='".$destinodb."', detalles='".$_POST['detalles']."' WHERE id='".$_GET['id']."'";

	$mysql->query($q);
	$mysql->close();
	header("Location:../vista/administrar.php");
}

actualizarProducto();
?>