<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Ajouter question</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="global.css">
</head>
<body>
<!--HTML TRAITEMENT DU FORMULAIRE SUR CETTE PAGE-->
	<h5 class="mb-4">Sélectionnez un QCM et associez-y des questions</h5>
	<form action="qcm_ajouter_1question.php" method="POST">
		<?php
				include('connexion.php');
				$choix_qcm = $linkpdo->query("SELECT id_qcm_fk, label_qcm FROM qcm");?>
		<!--choix du qcm : select values = id_qcm-->
		<select title="liste_de_qcm" name="liste_de_qcm">
			<?php
					foreach ($choix_qcm as $data1)
					{
					echo '<option value="' . $data1['id_qcm_fk'] . '">' . $data1['label_qcm'] . '</option>';
					}
			?>
		</select>
		<!--choix de la question : select values = id_question-->
		<?php $choix_question = $linkpdo->query("SELECT id_question, label_question FROM question");?>
		<select title="liste_de_questions" name="liste_de_questions">
			<?php
					foreach ($choix_question as $data)
					{
					echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
					}?>
		</select>
		<input class="btn btn-primary ml-2 mb-1" type="submit" name="ajouter_question" value="Ajouter cette question">
	</form>

	<!--PHP TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->
	<?php if(isset($_POST['ajouter_question'])){include('connexion.php');
			$id_question_a_ajouter =$_POST["liste_de_questions"];
			$id_qcm_a_modifier = $_POST["liste_de_qcm"];
			$req = $linkpdo->prepare('INSERT INTO contenir (id_question_fk, id_qcm_fk) VALUES(:id_question, :id_qcm_fk)');
				///Exécution de la requête
			$req->execute(array('id_question' => $id_question_a_ajouter,'id_qcm_fk' => $id_qcm_a_modifier));
	}?>
	<button class="btn btn-link mt-4" onclick="window.history.back()">Retour</button>
</body>
<?php include "footer.html"?>

</html>