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
		<a><?php echo 'Bienvenue, M ou Mme  '.$_SESSION['nom_user'].' , sur ce playground de QCM.';?></a></p>

		<p>
		<a href="question_ajouter.php">Voulez vous saisir une question?</a>

		<p>

		<p><a href="question_afficher.php">Voulez-vous afficher TOUTES les questions?</a></p>

		<p><a href="question_afficher1question.php">Voulez-vous afficher UNE question en particulier?</a></p>

		<p><a href="reponse_afficher.php">Voulez-vous afficher les réponses?</a></p>
		<!--lien vers page deconnexion qui detruira la session et renverra à l'index-->
		<a href="deconnexion.php"> se deconnecter </a></p>
	</body>
</html>