<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Nouveau QCM</title>
		<?php include "header.html"?> 
	</head>
	<body>
		<legend>nouveau questionnaire</legend>
		<p>Entrez un nom pour votre questionnaire svp</p>
		<form class="form" action="qcm_ajouter.php" method ="POST">
			<input type="texte" name="nom_qcm" placeholder="par ex. Maths TP3">
			<input class="btn btn-primary" type="submit" name= "ok" value ="nouveau qcm">
		</form>
		<p><a href="qcm_ajouter_1question.php">Voulez-vous ajouter une question à un Qcm ?</a></p>
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