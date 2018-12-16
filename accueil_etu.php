<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Accueil</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="global.css">
	</head>
	<body>
		<!--utilisation de la variable de session nom_user-->
		<p><a><?php echo 'Bienvenue Mme ou M. '.$_SESSION['login_user'].', sur ce playground de QCM.';?></a></p>
		<input type="button" class="btn btn-primary" onclick="location.href='qcm_repondre_qcm.php';" value="Répondre à un QCM" />
	</body>
	<?php include "footer.html" ?>
</html>