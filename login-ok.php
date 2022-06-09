<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>RunningBot - IBM TEAM - Index</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<style>
   .abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}

.oklogin {
  width: 450px;
}
</style>
   </head>
   <body>
   <div class="container">
      <div class="abs-center">
         <div class="oklogin">
            <div class="d-flex justify-content-center">
               <div class="spinner-border" role="status">
               <span class="sr-only">Loading...</span>
               </div>
            </div><br>
            

  

<?php
function get($id){
    // Get cURL resource
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true, //or 1
        CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/alumno/'.$id,
        CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $res= json_decode($resp,true); //result is associative array php
    curl_close($curl);
    return $res;
  }
       function display_row($rev,$id,$u,$p,$dn,$nom,$app,$apm){
          
         $username3 = $_POST['alumno'];
         $password3 = $_POST['pass'];
         $dnick = $dn;
         $nock = $nom;
         $apck = $app;
         $amck = $apm;


           if($u==$username3 && $p == $password3){
            $_SESSION['usuarioalumno'] = $username3;
            $_SESSION['usuariodni'] = $dnick;
            $_SESSION['usuarionom'] = $nock;
            $_SESSION['usuarioapat'] = $apck;
            $_SESSION['usuarioamat'] = $amck;
            
            
            if (isset($_POST['recordar2']) && $_POST['recordar2'] == 1){
            setcookie('usuarioalumno', 'alum', time() + 1000);
            setcookie('usuariodni', 'alumck', time() + 1000);
            setcookie('usuarionom', 'nombck', time() + 1000);
            setcookie('usuarioapat', 'patck', time() + 1000);
            setcookie('usuarioamat', 'matck', time() + 1000);
            }
            ?>
            
               <?php if ((isset($_SESSION['usuarioalumno'])) && ($_SESSION['usuarioalumno'] != ""))
                                 {
                                    echo "<div class='alert alert-success justify-content-center'
                        <div class='sign_btn'>Bienvenid@ ".$_SESSION['usuarioalumno'].". Será dirigido a la página principal...<script type='text/javascript'>
                        setTimeout( function() { window.location.href = 'index.php'; }, 3000 );</script></div>";
                                 }else{
                                    echo "<div class='alert alert-danger justify-content-center'
                        <div class='sign_btn'>Usuario no validado. Intente otra vez...<script type='text/javascript'>
                        setTimeout( function() { window.location.href = 'login.php'; }, 2000 );</script></div>";
                                 } 
                                 
                              ?>
                                 
                        
                  </div></div></div></div>
               
            <?php
            
           }   
       }  
$res = get('_all_docs');
$a = $res['rows'];      
for($i = 0; $i < count($a); $i++){
    $doc = get($a[$i]['id']);
    display_row($doc['_rev'],$doc['_id'],$doc['usuario'],$doc['pass'],$doc['dni'],$doc['nombres'],$doc['apepat'],$doc['apemat']);
}
?>
</body>
            
</html>