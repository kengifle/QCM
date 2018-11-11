<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Nouveau QCM</title>
	</head>
	<body>
		<p>Entrez un nom pour votre questionnaire svp</p>
		<form action="traitement_qcm_ajouter.php" method ="POST">
			<input type="texte" name="nom_qcm" placeholder="par ex. Maths TP3">
			<input type="submit" name= "ok">
		</form>
	</body>
</html>