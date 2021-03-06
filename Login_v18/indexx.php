<!DOCTYPE html>
<html lang="en">
<head>
	<title>CONNEXION</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<?php
require 'cnxbd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login=$_POST['login'];
    $password=$_POST['password'];
    $resultat=mysqli_query($db, "select * from admin where login = '$login' and password = '$password';");
    if ($resultat && $resultat->num_rows > 0) {
        header("Location: coifh.html", true, 301);
    } else {
        $feedback = "Erreur d'authentification";
    }
}
?>
	
	<div class="limiter">
		<div class="container-login100"> 
			<div class="wrap-login100">
			<form class="login100-form validate-form" method="post" action="index.php">
					<span class="login100-form-title p-b-43">
						CONNEXION
					</span>
					<div>

									<?php if (isset($feedback)) { ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> <center>nom d'utilisateur et mot de passe erronés </center></span>
</div>


<?php } ?>
</div>

	
					
	<div class="wrap-input100 validate-input" data-validate = "le pseudo est obligatoire">
						<input class="input100" type="text" name="login">
						<span class="focus-input100"></span>
						<span class="label-input100">LOGIN</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="LE MOT DE PASSE EST OBLIGATOIRE">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mot de passe</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="Rester Connecter">
							<label class="label-checkbox100" for="ckb1">
								Rester connecter
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Oublier mot de passe?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Connecter
						</button>
					</div>
		 		
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Ou inscription VIA
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
				</a>


					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/beaute.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>