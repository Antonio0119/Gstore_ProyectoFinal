<?php 
require_once "../conexion.php";

// Función para control de inicio de sesión
function verificarUsuario(){
	$mysql = conexionSQL();

    // Se obtiene el usuario y la contraseña mediante el método POST
	$q = "SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."' AND pass='".$_POST['pass']."'";
	$Users = $mysql->query($q);

    // Se comprueba si efectivamente existe el usuario y se inicia la sesión
	if(mysqli_num_rows($Users)!=0){
		session_start();
		$_SESSION['user'] = $_POST['usuario'];
		$_SESSION['auth'] = true;
	}

    // Se diferencia entre admin, usuario y error
    // El admin es redirigido a la página de administrador y el usuario al index
    $a = $Users->fetch_assoc();
    if(isset($_SESSION['auth']) && $_SESSION['auth'] == true && $a['tipo']=="admin"){
        $_SESSION['admin']=true;
        header("Location: ../vista/administrar.php");	
    }
    else if (isset($_SESSION['auth']) && $_SESSION['auth'] == true)
    {
        $_SESSION['admin']=false;
        header("Location: ../index.php");
    }
    else
    {
        header("Location: ../sesion.php?error=true");
    }
    
}

verificarUsuario();
?>