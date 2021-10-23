<?php
    require_once "conexion.php";
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

    <script type="text/javascript" src="js/programa.js"></script>

    <title>Inicio de sesión Gstore</title>
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

                <!-- Nav con inicio de sesión y registro -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="sesion.php">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="registro.php">Registro</a>
                    </li>
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

    <!-- Formulario de inicio de sesión -->
    <section class="container">
        <form class="registro" action="control/control_sesion.php" method="POST">
            <h2>Inicio de sesión</h2>
            <br>
            <?php

            // Si se obtiene un error mediante el método GET, no se aceptará el nombre de usuario ingresado
            if(isset($_GET['error']) && $_GET['error']==true){
                print('<span style="color:red;">Error: Nombre de usuario o contraseña invalidos.</span><br><br>');
            }
            ?>

            <!-- Nombre de usuario y contraseña -->
            <label>Usuario:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input id="nombre" type="text" name="usuario" maxlength="20"><br><br>
            <label>Contraseña:&nbsp;</label>
                <input type="password" name="pass" maxlength="20"><br><br>
            <input class="btn btn-primary" type="submit" name="enviar" value="Iniciar">
        </form>
    </section>

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