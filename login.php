<?php session_start();
include('admin/config.php');
$username = $_POST['userepemf218'];
$password = $_POST['password'];
if (isset($_POST['recordar']) && $_POST['recordar'] == 1){
setcookie('userepemf218', 'danny', time() + 1000);
}
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

      <title>Zona Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/estilo.css">
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
                                 <li class="nav-item">
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
      <!-- about -->
      <div class="ourwork">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <div class="titlepage">
                      <h2>Zona de Ingreso</h2>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/profile.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
				<?php if($_POST['submit']){
	if($username == $username2 && $password == $password2) {
		$_SESSION['userepemf218'] = $username;
		//echo "<SCRIPT LANGUAGE=javascript>window.history.go(-2)</SCRIPT>";
		echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=admin/index.php\">";
	}
} ?>
					<form name="form1" method="post" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input name="userepemf218" id="username" type="text" class="form-control input_user" placeholder="username" />
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" type="password" class="form-control input_pass" placeholder="password" />
							
						</div>
							<div class="d-flex justify-content-center mt-4 login_container">
                <input type="submit" name="submit" value="Ingresar" class="btn login_btn" />
				   </div>
               <div class="d-flex justify-content-center mt-3 login_container">
               <a href="facial.php" class="btn login_btn">Utilizar FACE ID</a>
               </div>
               <div class="d-flex justify-content-center mt-3 login_container">
               <span style="color:#fff;">¿No tienes una cuenta? Regístrate!</span>
               </div>
               <div class="d-flex justify-content-center mt-3 login_container">
               <a href="registro.php" class="btn login_btn">Crear Cuenta</a>
               </div>
				   <div class="d-flex justify-content-center mt-3 login_container">
                  <span><a href="index.php" style="color:#fff;">Regresar a Página Principal</a></span>
               </div>
					</form>
				</div>
				
			</div>
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

