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
	<p><?php echo 'Bienvenue, Mme ou M. '.$_SESSION['login_user'].', sur notre service de gestion de questionnaires à choix multiples.';?></p>
	<p>Vous êtes actuellement connecté(e) en tant qu'enseignant(e).</p>

	<h5>QUESTIONS</h5>
	<div class="mb-4">
		<input type="button" class="btn btn-primary" onclick="location.href='question_ajouter.php';" value="Créer une nouvelle question" />
		<input type="button" class="btn btn-primary" onclick="location.href='question_afficher_toutes.php';" value="Visualiser toutes les questions" />
		<input type="button" class="btn btn-primary" onclick="location.href='question_afficher1question.php';" value="Visualiser une question" />
	</div>


	<h5>QCM</h5>
	<div class="mb-4">
		<input type="button" class="btn btn-primary" onclick="location.href='qcm_ajouter.php';" value="Créer un nouveau QCM" />
		<input type="button" class="btn btn-primary" onclick="location.href='qcm_ajouter_1question.php';" value="Ajouter une question à un QCM" />
		<input type="button" class="btn btn-primary" onclick="location.href='qcm_afficher1qcm.php';" value="Visualiser un QCM" />
	</div>

	<h5>Thèmes</h5>
	<div>
		<input type="button" class="btn btn-primary" onclick="location.href='themes.php';" value="Gérer les thèmes" />
	</div>
</body>
<?php include "footer.html"?>
</html>