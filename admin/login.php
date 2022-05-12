<?php session_start();
include('config.php');
$username = $_POST['userepemf218'];
$password = $_POST['password'];
if (isset($_POST['recordar']) && $_POST['recordar'] == 1){
setcookie('userepemf218', 'danny', time() + 1000);
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>Zona Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="estilo.css">

</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../images/profile.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
				<?php if($_POST['submit']){
	if($username == $username2 && $password == $password2) {
		$_SESSION['userepemf218'] = $username;
		//echo "<SCRIPT LANGUAGE=javascript>window.history.go(-2)</SCRIPT>";
		echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=index.php\">";
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
							<div class="d-flex justify-content-center mt-3 login_container">
					 <input type="submit" name="submit" value="Ingresar" class="btn login_btn" />
				   </div>
				   
					</form>
				</div>
				<div class="d-flex justify-content-center"><a href="../index.php" style="color:#fff;">Regresar a Página Principal</a></div>
			</div>
		</div>
	</div>
</body>
</html>