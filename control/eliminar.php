<?php
require_once "../conexion.php";

// Se crea la tabla con todos los productos y se añade un botón de radio 
function crearTablaEliminar(){
	$mysql = conexionSQL();
	$q = "SELECT * FROM productos";
	if($Productos = $mysql->query($q)){
		$tabla = "<table>";
			$tabla .= "<thead>";
				$tabla .= "<tr>";
                    $tabla .= "<th>Select</th>";
					$tabla .= "<th>Id</th>";
					$tabla .= "<th>Producto</th>";
					$tabla .= "<th>Descripcion</th>";
					$tabla .= "<th>Tipo</th>";
                    $tabla .= "<th>Precio</th>";
					$tabla .= "<th>Imagen</th>";
                    $tabla .= "<th>Detalles</th>";
				$tabla .= "</tr>";
			$tabla .= "</thead>";
			$tabla .= "<tbody>";
			while($c = $Productos->fetch_assoc()){
				$tabla .= "<tr>";
                    $tabla .= "<td><input type='radio' name='producto' value='".$c['producto']."'></td>";
					$tabla .= "<td>".$c['id']."</td>";
					$tabla .= "<td>".$c['producto']."</td>";
					$tabla .= "<td>".$c['descripcion']."</td>";
					$tabla .= "<td>".$c['tipo']."</td>";
                    $tabla .= "<td>".$c['precio']."</td>";
					$tabla .= "<td><img width='200px' src='../".$c['imagen']."'></td>";
                    $tabla .= "<td>".$c['detalles']."</td>";
				$tabla .= "</tr>";
			}
			$tabla .= "</tbody>";
		$tabla .= "</table>";
	}
	$mysql -> close();
	return print($tabla);
}
?>