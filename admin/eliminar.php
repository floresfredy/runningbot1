<?php
$cod = $_GET["doc_id"];
$rev = $_GET["doc_rev"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://f3e85e45.us-south.apigw.appdomain.cloud/api-eliminar/acceso-eliminar?docid=$cod&docrev=$rev",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_POSTFIELDS => "{\"id\":4898116048257024}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "Registro Eliminado. Redirigiendo...<SCRIPT LANGUAGE=javascript>window.history.go(-1)</SCRIPT>";
}
?>

