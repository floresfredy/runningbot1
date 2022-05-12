<?php
include('sesion.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Zona admin</title>
	<link rel="stylesheet" href="estilo2.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="simple-login-container">
    <h2>Agregar nuevo registro</h2>
	<form action="guardar.php" method="post">
    <div class="row">
        <div class="col-md-12 form-group">
            <input id="nombre" name="nombre" type="text" required class="form-control" placeholder="Nombre">
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 form-group">
            <input id="distancia" name="distancia" type="text" required placeholder="Ingrese distancia recorrida" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input id="tiempo" name="tiempo" type="text" required placeholder="Ingrese tiempo realizado" class="form-control">
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 form-group">
            <input id="ritmo" name="ritmo" type="text" required placeholder="Ingrese ritmo" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input id="s" type="submit" class="btn btn-block btn-login" value="Guardar" >
			<button class="btn btn-block btn-login" onclick='window.location.href="registros.php"'>Ver Registros</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
		<a href="cerrar.php">Cerrar sesion</a>
        </div>
    </div>
</form>
</div>

</body>
</html>
