<?php
function deldoc($db,$id,$rev){
  $curl = curl_init();
  curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true, //or 1
      CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/'.$db.'/'.$id.'?rev='.$rev,
      CURLOPT_CUSTOMREQUEST => 'DELETE'
  ]);
  curl_exec($curl);
  curl_close($curl);
}
$docid = $_GET["doc_id"];
$docrev = $_GET["doc_rev"];
deldoc('mydb',$docid,$docrev);




$var = "Registro Eliminado. Redirigiendo...<SCRIPT LANGUAGE=javascript>window.history.go(-1)</SCRIPT>";
echo $var;

 ?>
