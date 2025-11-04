<?php
// Iniciar la sesión
session_start();
 
// Desarmar todas las variables de sesión
$_SESSION = [];
 
// Destruir la sesión.
session_destroy();
 
// Redireccionar a la página de inicio de sesión
header("location: login.php");
exit;
?>