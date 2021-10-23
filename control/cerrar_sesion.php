<!-- Se destruye la sesión y se redirige al index -->

<?php
    session_start();
    session_destroy();
    header("Location:../index.php");
?>