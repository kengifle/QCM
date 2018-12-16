<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>affichage questions</title>
</head>
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->

<body>
	<?php include('connexion.php');?>
	<form action="qcm_repondre_qcm.php" method="POST">
		<!--affichage de la liste des qcm dans un select, value : id_qcm-->
		<?php
include('connexion.php');
$reponse = $linkpdo->query("SELECT label_qcm, id_qcm_fk, id_user_fk FROM qcm");?>
		<select title="choisissez dans la liste" name="liste_de_qcm">
			<?php
foreach ($reponse as $data)
{echo '<option value="' . $data['id_qcm_fk'] . '">' . $data['label_qcm'] . '</option>';}
?></select>
		<input type="submit" value="repondre au qcm?" name="repondre_qcm">
	</form>
	<br>


	<!--PHP***TRAITEMENT DU FORMULAIRE SUR LA PAGE-->

	<?php if(isset($_POST['repondre_qcm'])){include('connexion.php');
	//récupération id qcm depuis le formulaire et stockage dans une variable de session
	$this_id_qcm =  $_POST['liste_de_qcm'];
	$_SESSION['id_qcm']= $this_id_qcm;

	//requete pour afficher le nom du qcm
		$req_nom_qcm = $linkpdo->query("SELECT label_qcm from qcm where id_qcm_fk = $this_id_qcm");
		$data = $req_nom_qcm->fetch();
		echo $data["label_qcm"];
	
	//requete pour afficher le qcm
		$req_afficher_qcm = $linkpdo->query("SELECT  id_question, label_question
		FROM `contenir`, `question`
		WHERE `id_qcm_fk` = $this_id_qcm
		and `contenir`.`id_question_fk`= `question`.`id_question`");

	?>
	<br>
	<?php if (!$req_afficher_qcm) {echo ("ERREUR SYSTEME") ;}
	//tant qu'il reste des donnees dans le tab de resultats
	//on affiche un formulaire contenant chaque question
	//et chacune des réponses à cette question
	//les questions et leurs réponses sont numérotées pour l'affichage
	//la validité de chaque réponse est fournie sous forme de string
	//les noms d'input pour les reponses sont générés et tous différents
	$indice_question = 0;
	// AFFICHER SEULEMENT LA 1e QUESTION
	//$donnees = $req_afficher_qcm->fetch();
	//formulaire généré en php depuis la bdd qui sera traité page traitement_valider_reponse
	while ($donnees = $req_afficher_qcm->fetch()) {?>
	<br>
	<form action="traitement_valider_reponse.php" method="POST">

		<br><br>
		<table border="1">
			<tbody>
				<table>
					<tr>
						<td>
							<!-- affichage des questions -->
							<?php $indice_question++;
		echo ("Question numéro ".$indice_question);
		$question = $donnees['id_question']; ?>
						</td>
						<?php $_SESSION['id_question']=$question;?>
					</tr>
					<tr>
						<td>
							<?php echo ($donnees['label_question']); ?>
						</td>
					</tr>
				</table>
				<br><!-- affichage des reponses -->
				<a>Reponses possibles</a>
				<?php $req_afficher_reponses = $linkpdo->query("SELECT distinct  `id_reponse`, `label_reponse`, `validite`, `reponse`.`id_question_fk`
		FROM question, qcm, contenir, reponse
		where $question = `reponse`.`id_question_fk`
		and `reponse`.`id_question_fk`= `contenir`.`id_question_fk`
		and `contenir`.`id_qcm_fk` = $this_id_qcm");
		$indice_rep = 1;
		while ($donnees = $req_afficher_reponses->fetch()) {?>
				<table>
					<thead></thead>
					<tbody>
						<tr>
							<td>
								<?php echo ($indice_rep." / ".$donnees['label_reponse']); ?>
							</td>
							<td>
								<?php //if($donnees['validite'] == "1"){ echo ("/ vrai");} else {echo ("/ faux");}?>
							</td>
						</tr>
						<?php $_SESSION["indice_reponse"] = $indice_rep;
			$indice_rep++;?>
					</tbody>
				</table>
			</tbody>
		</table>
		<?php } ?>
		<?php
			include('connexion.php');
			$reponse = $linkpdo->query("SELECT label_reponse, id_reponse, validite FROM reponse, question 
			where id_question = `reponse`.`id_question_fk` and id_question = $question");?>
		<!-- input select dynamique :
		values = id_reponse
		name = chaque input généré reçoit un nom different, indicé par chaque question
		chaque input sera traité dans une boucle page traitement valider reponse -->
		<br><select title="choississez dans la liste" <?php echo'name="liste_de_questions'.$indice_question.'">';?>>
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_reponse'] . '">' . $data['label_reponse'] . '</option>';
			}?>
		</select>
		<?php } ?>
		<?php $req_afficher_qcm->closeCursor();
			$_SESSION["indice_question"] = $indice_question;?>
		<br><br><br>
		<input type="submit" value="valider vos réponses?" name="repondre_question">
	</form>
	

	<?php } ?>
</body>
<?php include "footer.html"?>

</html>