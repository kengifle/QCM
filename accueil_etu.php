<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ACCUEIL : ETUDIANT</title>
</head>
<body>
	<!--utilisation de la variable de session nom_user-->
	<p><a><?php echo 'Bienvenue, '.$_SESSION['login_user'].' , sur ce playground de QCM.';?></a></p>
	<p><a href="qcm_repondre_qcm.php">Voulez-repondre à un qcm ?</a></p>
</body>
<?php include "footer.html"?>
</html>