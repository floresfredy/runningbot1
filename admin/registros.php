<?php
include('sesion.php');
function get($id){
    // Get cURL resource
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true, //or 1
        CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/mydb/'.$id,
        CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $res= json_decode($resp,true); //result is associative array php
    curl_close($curl);
    return $res;
  }
  
  
  function html1(){
    $var ='
<!DOCTYPE html>
<html>
<head>
<title>Zona admin</title>
	

    <link rel="stylesheet" href="estilo2.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    
    <script>
    function confirmar()
    {
        if(confirm("¿Estas seguro de eliminar?"))
            return true;
        else
            return false;
    }
    </script>



<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container">
<h1>Registros</h1>
<table id="example" class="table table-striped table-bordered" style="width:100%; background-color:#fff">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Distancia</th>
                <th>Tiempo</th>
                <th>Ritmo</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>';
        echo $var;
      }
       function display_row($rev,$id,$n,$d,$t,$r){
         $m = "<tr><td>$n</td><td>$d</td><td>$t</td><td>$r</td><td><a href='eliminar.php?doc_id=$id&doc_rev=$rev' onclick='return confirmar()'><i class='icon-trash'></i> Eliminar</a></td></tr>";
         echo $m;
       }
       function html2(){
        $end = '
            </tbody>
        
    </table>
</div>
<div class="simple-login-container">

    
    
    <div class="row">
        <div class="col-md-12 form-group">
            <button class="btn btn-block btn-login" onclick=window.location.href="index.php">Inicio</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
		<a href="cerrar.php">Cerrar sesion</a>
        </div>
    </div>
<script>
$(document).ready(function() {
    $("#example").DataTable(
        {
            language: {
                search: "Buscar:"
            }
        } 
    );
} );
</script>
</div>
</body>
</html>

';
echo $end;
}
$res = get('_all_docs');
$a = $res['rows'];
html1();
//var_dump($a);
for($i = 0; $i < count($a); $i++){
    $doc = get($a[$i]['id']);
    display_row($doc['_rev'],$doc['_id'],$doc['nombre'],$doc['distancia'],$doc['tiempo'],$doc['ritmo']);
}
html2();
?>