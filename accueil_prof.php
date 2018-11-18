<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ACCUEIL : Professeurs</title>
</head>

<body>
	<!--utilisation de la variable de session nom_user-->
	<p>
		<a>
			<?php echo 'Bienvenue, Mme ou M  '.$_SESSION['login_user'].' , sur ce playground de QCM.';?></a></p>
	<p>Vous êtes actuellement connecté(e) en tant qu'enseignant.</p>
	<div>
		<p>QUESTIONS</p>
		<p><a href="question_ajouter.php">Voulez vous saisir une question?</a>
			<p>
				<p><a href="question_afficher_toutes.php">Voulez-vous afficher TOUTES les questions?</a></p>
				<p><a href="question_afficher1question.php">Voulez-vous afficher UNE question en particulier?</a></p>
				<p><a href="reponse_afficher.php">Voulez-vous afficher toutes les réponses?</a></p>
	</div>
	<div>
		<p>QCM</p>
		<p><a href="qcm_afficher1qcm.php">Voulez-vous afficher UN Qcm ?</a></p>
		<p><a href="qcm_ajouter.php">Voulez vous créer un nouveau Qcm ?</a></p>
		<p><a href="qcm_ajouter_1question.php">Voulez ajouter une question à un Qcm ?</a></p>
	</div>
</body>
<?php include "footer.html"?>

</html>