<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<?php if(isset($_POST['ok'])){include('connexion.php');
		$nom_qcm=$_POST["nom_qcm"];
		$req = $linkpdo->prepare('INSERT INTO qcm (label_qcm, id_user_fk ) VALUES(:label_qcm, :id_user_fk)');
				///Exécution de la requête
			$req->execute(array('label_qcm' => $nom_qcm,'id_user_fk' => $_SESSION['id_user']));
		}?>
		<?php
		//req ajout question INSERT INTO `contenir`( `id_qcm_fk`, `id_question_fk`) VALUES (2,58)
		?>
		<form action="traitement_qcm_ajouter.php" method ="POST">
			
			<?php
			include('connexion.php');
			$reponse1 = $linkpdo->query("SELECT id_qcm_fk, label_qcm FROM qcm");?>
			<select title ="liste_de_qcm" name="liste_de_qcm"><?php
					foreach ($reponse1 as $data1)
					{
					echo '<option value="' . $data1['id_qcm_fk'] . '">' . $data1['label_qcm'] . '</option>';
					}
			?></select>
			<?php
			$reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
			<select title ="liste_de_questions" name="liste_de_questions"><?php
					foreach ($reponse as $data)
					{
					echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
					}
			?></select>
			<input type="submit" name="ajouter_question" value="ajouter cette question">
		</form>
		<?php if(isset($_POST['ajouter_question'])){include('connexion.php');
		//req ajout question INSERT INTO `contenir`( `id_qcm_fk`, `id_question_fk`) VALUES (2,58)
		$id_question_a_ajouter =$_POST["liste_de_questions"];
		$id_qcm_a_modifier = $_POST["liste_de_qcm"];
			
				$req = $linkpdo->prepare('INSERT INTO contenir (id_question_fk, id_qcm_fk) VALUES(:id_question, :id_qcm_fk)');
					///Exécution de la requête
				$req->execute(array('id_question' => $id_question_a_ajouter,'id_qcm_fk' => $id_qcm_a_modifier));
				//recuperation de l'id_question dans une variable de session
				//$_SESSION['id_question'] = $linkpdo->lastInsertId();
		}?>
	</body>
</html>