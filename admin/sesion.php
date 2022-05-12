<?php
session_start();
if(!$_SESSION['userepemf218']){ 
header("Location: login.php");
exit;
}
?>