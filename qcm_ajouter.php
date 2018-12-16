<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Création QCM</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="global.css">
	</head>
	<body>
		<h5 class="mb-4">Entrez un nom pour ce nouveau QCM</h5>
		<form action="qcm_ajouter.php" method ="POST">
			<input type="text" name="nom_qcm" placeholder="Ex : Maths TP3">
			<input class="btn btn-primary" type="submit" name= "ok">
		</form>
		<input class="btn btn-primary mt-4" type="submit" value="Associer des questions au QCM" onclick="location.href='qcm_ajouter_1question.php';">

		<button class="btn btn-link mt-4" onclick="window.history.back()">Retour</button>
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