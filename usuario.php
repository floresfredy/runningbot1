<?php
include('sesion.php');
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
      <!-- site metas -->
      <title>RunningBot - IBM TEAM</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/favicon.ico" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="images/logo.jpg" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="header_information">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="index.php"> INICIO  </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="nosotros.php"> NOSOTROS  </a>
                                 </li> 
                                 <li class="nav-item active">
                                    <a class="nav-link" href="integrantes.php">INTEGRANTES</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="componentes.php">COMPONENTES</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="ganadores.php">GANADORES</a>
                                 </li>
                              </ul>
                              <?php if ((isset($_SESSION['usuarioalumno'])) && ($_SESSION['usuarioalumno'] != ""))
                                 {
                                    
                                    echo "<div class='dropdown'>
                                    <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <img src='images/avatar.png' height ='32' width='32' /> Hola ".$_SESSION['usuarioalumno']."
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                      <a class='dropdown-item' href='usuario.php?user=".$_SESSION['usuarioalumno']."'>Ver Perfil</a>
                                      <a class='dropdown-item' href='ganadores.php'>Ver Ganadores</a>
                                      <a class='dropdown-item' href='cerrar.php'>Cerrar Sesión</a>
                                    </div>
                                  </div>";
                                 }
                                    else
                                 {
                              ?>
                              <button class="btn btn-light" type="button"><a href="login.php"><img src="images/avatar.png" height ="32" width="32" /> Iniciar Sesión</a></button><?php }?>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- about -->
      <div id="about"  class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-9">
                  <div class="titlepage">
                     <h2 class="mayus"><?php echo $_SESSION['usuarionom']." ".$_SESSION['usuarioapat']." ".$_SESSION['usuarioamat'];?></h2>
                     <!--primera tabla-->
                     <span></span>
                     <p>Estado Físico</p>
                     <div class="bd-example">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">DNI</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Talla</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
function getch($id){
    // Get cURL resource
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true, //or 1
        CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/chatbot/'.$id,
        CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $res= json_decode($resp,true); //result is associative array php
    curl_close($curl);
    return $res;
  }
  function display_rowch($rev,$id,$dnch,$pech,$tach){
   $iddnich = $_SESSION["usuariodni"];
   if($dnch==$iddnich){
    $m = "
    <tr><td>$dnch</td><td>$pech</td><td>$tach</td></tr>";
      
    echo $m;
   }
   
 
}

$res = getch('_all_docs');
$a = $res['rows'];      
for($i = 0; $i < count($a); $i++){
    $doc = getch($a[$i]['id']);
    display_rowch($doc['_rev'],$doc['_id'],$doc['dni'],$doc['peso'],$doc['talla']);
}
?>
                              
                            </tbody>
                          </table>
                        </div>
                     </div>
                     <!--fin primera tabla-->
                     <!--segunda tabla-->
                     <span></span>
                     <p>Carreras Realizadas</p>
                     <div class="bd-example">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Distancia</th>
                                <th scope="col">Tiempo</th>
                                <th scope="col">Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
function getc($id){
    // Get cURL resource
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true, //or 1
        CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/carrera/'.$id,
        CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $res= json_decode($resp,true); //result is associative array php
    curl_close($curl);
    return $res;
  }
  function display_rowc($rev,$id,$dnc,$dic,$tic,$fec){
   $iddni = $_SESSION["usuariodni"];
   if($dnc==$iddni){
    $m = "
    <tr><td>$dic metros</td><td>$tic segundos</td><td>$fec</td></tr>";
    
    echo $m;
   }
   
 
}

$res = getc('_all_docs');
$a = $res['rows'];      
for($i = 0; $i < count($a); $i++){
    $doc = getc($a[$i]['id']);
    display_rowc($doc['_rev'],$doc['_id'],$doc['dni'],$doc['distancia'],$doc['tiempo'],$doc['fecha']);
}
?>
                              
                              </tbody>
                          </table>
                        </div>
                     </div>
                     <!--fin segunda tabla-->
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="about_img">
                  <img src="images/avatar.png" class="rounded-circle" alt="#"/>
                  </div><br/>
                     <p>Datos del estudiante</p><br/>
                     <div class="bd-example">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
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
  function display_row($rev,$id,$n,$ap,$am,$dn,$gn,$em,$fe,$ce,$us){
   $iduser = $_GET["user"];
   if($us==$iduser){
    $m = "<tr><th><b>Nombres: </th><td class='mayus'>$n</td></tr>
    <tr><th><b>Ape. Paterno: </th><td class='mayus'>$ap</td></tr>
    <tr><th><b>Ape. Materno: </th><td class='mayus'>$am</td></tr>
    <tr><th><b>DNI: </th><td>$dn</td></tr>
    <tr><th><b>Género: </th><td class='mayus'>$gn</td></tr>
    <tr><th><b>Email: </th><td>$em</td></tr>
    <tr><th><b>Fecha de Nac.: </th><td class='mayus'>$fe</td></tr>
    <tr><th><b>Celular: </th><td class='mayus'>$ce</td></tr>";
    
    echo $m;
   }
   
 
}

$res = get('_all_docs');
$a = $res['rows'];      
for($i = 0; $i < count($a); $i++){
    $doc = get($a[$i]['id']);
    display_row($doc['_rev'],$doc['_id'],$doc['nombres'],$doc['apepat'],$doc['apemat'],$doc['dni'],$doc['genero'],$doc['email'],$doc['fecha'],$doc['cel'],$doc['usuario']);
}
?>
                             
                            </tbody>
                          </table>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
     
      <!--  footer -->
      <footer>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2022 Todos los derechos reservados - Grupo IBM</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
    
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

