<?php
require_once "../conexion.php";

// Función para control de registro
function insertarUsuario(){
  $mysql = conexionSQL();

  // Se obtiene el usuario mediante el método POST
  $p = "SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."'";
  $Users = $mysql->query($p);

  // Si se encuentra un usuario con el mismo nombre, se envía un error
  if(mysqli_num_rows($Users)!=0){
    header("Location:../registro.php?error=true");

  // En caso contrario, se inserta el nuevo usuario en la DB
  // Todo nuevo usuario se registra con tipo usuario, los admin se registran desde la propia DB
  }else{
    $q = "INSERT INTO usuarios (usuario,pass,tipo) VALUE ("
    ."'".$_POST['usuario']."',"
    ."'".$_POST['pass']."',"
        ."'usuario'"
    .")";
    $mysql->query($q);
    $mysql->close();
    header("Location:../index.php");
  }
}

insertarUsuario();

?>