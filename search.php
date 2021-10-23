<?php
    require_once "conexion.php";
    session_start();
    error_reporting(E_ALL ^ E_WARNING);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">  

    <title>Producto Gstore</title>
</head>
<body>
    <header class="container">
        <nav class="navbar navbar-expand-md navbar-dark">

            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="img/Gstore.png" alt="Logo" style="width: 100px;">
            </a>

            <!-- Botón Toggler/collapsible  -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links y busqueda -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
				<form class="form-inline" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="query">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                <!-- Nav con nombre de usuario y diferencia entre usuario y admin -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <?php
                        if(isset($_SESSION['user']) && $_SESSION['admin']==true){
                            print('<a class="nav-link text-light" href="vista/administrar.php"><span style="text-transform: uppercase;">'.$_SESSION['user'].'</span></a>');
                        ?>
                            </li>
                            <li class="nav-item">
                        <?php
                            print('<a class="nav-link text-light" href="control/cerrar_sesion.php">Salir</a>');
                        ?>
                            </li>
                            <li class="nav-item">
                        <?php
                        }
                        else if(isset($_SESSION['user'])){
                            print('<a class="nav-link text-light" href="#"><span style="text-transform: uppercase;">'.$_SESSION['user'].'</span></a>');
                        ?>
                            </li>
                            <li class="nav-item">
                        <?php
                            print('<a class="nav-link text-light" href="control/cerrar_sesion.php">Salir</a>');
                        ?>
                            </li>
                            <li class="nav-item">
                        <?php
                        }
                        else{
                            print('<a class="nav-link text-light" href="sesion.php">Iniciar sesión</a>');
                        ?>
                            </li>
                            <li class="nav-item">
                        <?php
                            print('<a class="nav-link text-light" href="registro.php">Registro</a>');
                        ?>
                            </li>
                        <?php
                        }
                    ?>
                </ul>
            </div>
        </nav>

        <!-- Navbar con enlaces a otras páginas -->
        <nav class="navbar navbar-expand-sm navbar-dark justify-content-center">
            <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="consolas.php">Consolas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="juegos.php">Juegos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="ofertas.php">Ofertas</a>
                    </li>
                </ul>
        </nav>
    </header>

    <?php
	$mysql = conexionSQL();

	// Busqueda obtenida mediante el método GET
	$query = $_GET['query']; 

	// Número minimo de caracteres para la consulta
	$min_length = 2;
	
	if(strlen($query) >= $min_length){ // Si la busqueda es igual o mayor al tamaño mínimo
		
		// Convierte caracteres usados en html a sus equivalentes, por ejemplo: < to &gt;
		$query = htmlspecialchars($query); 
		$q = "SELECT * FROM productos WHERE (`producto` LIKE '%".$query."%') OR (`descripcion` LIKE '%".$query."%')";
		$raw_results =  $mysql->query($q);
		?> 

		<section class="container">
			<div>
				<h2 class="text-light">Productos de la busqueda</h2>
            	<div class="row justify-content-center">

		<?php
		if(mysqli_num_rows($raw_results) > 0){ // Si hay uno o más productos
			while($results = mysqli_fetch_array($raw_results)){ ?>

				<div class="card col-md-3" style="margin: 20px;">
					<?php
						// Se envía la id del producto mediante el método GET para ser utilizada en producto.php
						print('<a href="producto.php?product='.$results['id'].'" style="text-decoration: none; color: white;"><img class="card-img-top" src="'.$results['imagen'].'" alt="Card image">');
					?>
					<div class="card-body">
						<?php
							print('<h4 class="card-title">'.$results['producto'].'</h4>');
							print('<p class="card-text">'.$results['descripcion'].'</p>');
							print('<h5 class="card-title">'.'$ '.$results['precio'].'</h5></a>');
						?>
					</div>
				</div>

			<?php } ?>

            	</div>
        	</div>

    	</section>
		<?php			
		}
		// Si no hay productos
		else{ ?> 
			
			<!-- No hay resultados para la busqueda -->
			<section class="container">
			<?php
				print('<h5 class="text-light">No hay productos para su busqueda</h5>');
				print('<p class="text-light">Intente nuevamente, puede que haya escrito mal o el producto no existe.</p>');
	
			?>

    	</section>

		<?php
		}
		
	}
	//  Si la busqueda es menor al tamaño mínimo
	else{ ?> 

		<!-- Tamaño menor del permitido -->
		<section class="container">
		<?php
			print('<h5 class="text-light">Tamaño de busqueda menor del permitido</h5>');
			print('<p class="text-light">Intente nuevamente, el tamaño mínimo de busqueda es de '.$min_length.' caracteres.</p><br>');
		?>
		</section>

	<?php
	}
	?>

    <!-- Footer con logo, contacto y redes sociales -->
    <footer>
        <div class="container">
            <span class="logo"><a href="index.php"><img src="img/Gstore.png" alt=""></a></span>
            <nav class="navbar navbar-expand-sm navbar-dark justify-content-center">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img src="icons/llamada-telefonica.png" alt="">
                        <br>
                        <p>
                        +5742198332
                        </p>
                    </li>
                    <li class="nav-item">
                        <img src="icons/correo-electronico.png" alt="">
                        <br>
                        <p>
                            gstore@store.com
                        </p>
                    </li>
                    <li class="nav-item">
                        <img src="icons/alfiler.png" alt="">
                        <br>
                        <p>
                        Calle 67 #53-108, Medellín, Antioquia
                        </p>
                    </li>
                </ul>
            </nav>
            <br>
            <div class="redes">
                <a href=""><img src="icons/facebook.png" alt=""></a>
                <a href=""><img src="icons/gorjeo.png" alt=""></a>
                <a href=""><img src="icons/instagram.png" alt=""></a>
                <a href=""><img src="icons/whatsapp.png" alt=""></a>
            </div>
            <br>
            <div class="derechos">
                <p>Copyright ©2021 Todos los Derechos Reservados | Gstore</p>
            </div>
        </div>
        
    </footer>

    
</body>
</html>