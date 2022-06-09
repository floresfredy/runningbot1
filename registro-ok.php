<?php
// var_dump($_POST);
$user = new stdClass;
$user->tipo = 'alumno';
$user->nombres = $_POST["nombres"];
$user->apepat = $_POST["apepat"];
$user->apemat = $_POST["apemat"];
$user->dni = $_POST["dni"];
$user->genero = $_POST["genero"];
$user->email= $_POST["email"];
$user->fecha = $_POST["fecha"];
$user->cel = $_POST["cel"];
$user->usuario = $_POST["usuario"];
$user->pass = $_POST["pass"];

 //echo json_encode($user);

$curl = curl_init();
// curl options
$options = array(
CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/alumno',
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
Cuenta creada. Redirigiendo...<script type="text/javascript">
setTimeout( function() { window.location.href = "login.php"; }, 3000 );
</script>
';
echo $var;

?>


