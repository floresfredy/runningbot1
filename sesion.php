<?php
session_start();
if(!$_SESSION['usuarioalumno']){ 
header("Location: login.php");
exit;
}
?>