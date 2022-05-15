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
      <link href="css/estilos.css" rel="stylesheet" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
                                 <li class="nav-item">
                                    <a class="nav-link" href="integrantes.php">INTEGRANTES</a>
                                 </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="componentes.php">COMPONENTES</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="ganadores.php">GANADORES</a>
                                 </li>
                              </ul>
                              <div class="sign_btn"><a href="login.php">Iniciar Sesión</a></div>
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
      <div class="ourwork">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <div class="titlepage">
                      <h2>Reconocimiento Facial por Edwin Ramos</h2>
                   </div>
                   <p>Azure Face es capaz de identificar los rostros que aparecen en una imagen devolviendo las coordenados de la ubicación de dicha persona. Además, esta detección implica a su vez extraer datos como atributos faciales, género, edad, emociones o incluso las gafas.</p>
                </div>
             </div><br>

            <center> <div class="row">
               <div class="col-md-12">
                   
      <!-- <h3> RECONOCIMIENTO FACIAL </h3> -->
                  <div class="camera">
                     <video id="video">Video stream not available.</video>
                     <button id="startbutton">Tomar Foto</button>                   
                  </div>
                  <canvas id="canvas"></canvas>
                  <div class="output">
                     <img src="" title="hollaa" class="img-fluid" id="photo" alt="La captura de pantalla aparecerá en este cuadro">
                  </div>   
                  
               </div>
             </div><br></center>

            <center> <div class="row">
               <div class="col-md-12">
      <!-- <h3>RECONOCIMIENTO FACIAL CON FACE API</h3> -->
                  <div class="mb-2">
                     <label for="ur1"><strong>Ingresar URL de la imagen:</strong> </label>
                     <input type="text" name="url" id="url" class="form-control">
                  </div>
                  <div class="mb-2"> 
                     <label for="url"><strong>Imagen</strong></label>
                     <div>
                           <img src="" alt="" class="img-fluid" id="urlImagen">
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary mb-3" id="btnAnalizar"><strong>Analizar</strong></button>
                  <div id="resultado"></div>
              </div>
         </div></center>
         
      </div>


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
      <script src="js/face.js"></script>
   </body>
</html>

