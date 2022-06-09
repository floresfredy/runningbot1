<?php
include('sesion.php');
// var_dump($_POST);
$user = new stdClass;
$user->tipo = 'usuario';
$user->dni = $_POST["dni"];
$user->nombre = $_POST["nombre"];
$user->distancia = $_POST["distancia"];
$user->tiempo = $_POST["tiempo"];
$user->fecha = $_POST["fecha"];
 //echo json_encode($user);

$curl = curl_init();
// curl options
$options = array(
CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/carrera',
CURLOPT_POST => 1,
CURLOPT_POSTFIELDS => json_encode($user),
CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
CURLOPT_RETURNTRANSFER => true /* if not, curl_exec() throws output*/
);
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);
//it will display with option to go index.html or getdocs.php

$var = '
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
    <h2>Se ha guardado el registro</h2>
    
    <div class="row">
        <div class="col-md-12 form-group">
            <button class="btn btn-block btn-login" onclick=window.location.href="index.php">Inicio</button>
            <button class="btn btn-block btn-login" onclick=window.location.href="registros.php">Ver Registros</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
		<a href="cerrar.php">Cerrar sesion</a>
        </div>
    </div>

</div>

</body>
</html>

';
echo $var;

?>
