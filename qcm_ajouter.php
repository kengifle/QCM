<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Nouveau QCM</title>
	</head>
	<body>
		<p>Vous allez saisir un nouveau questionnaire.</p>
		<p>Entrez un nom pour votre questionnaire svp</p>
		<form action="qcm_ajouter.php" method ="POST">
			<input type="texte" name="nom_qcm" placeholder="par ex. Maths TP3">
			<input type="submit" name= "ok">
		</form>
		<p><a href="qcm_ajouter_1question.php">Voulez ajouter une question à ce Qcm ?</a></p>
	</body>
	<?php include "footer.html"?>
</html>
<!--PHP*** TRAITEMENT DU FORMULAIRE DE CETTE PAGE -->
<?php if(isset($_POST['ok'])){include('connexion.php');
		$nom_qcm=$_POST["nom_qcm"];
		$req = $linkpdo->prepare('INSERT INTO qcm (label_qcm, id_user_fk ) VALUES(:label_qcm, :id_user_fk)');
				///Exécution de la requête préparée
			$req->execute(array('label_qcm' => $nom_qcm,'id_user_fk' => $_SESSION['id_user']));
}?>