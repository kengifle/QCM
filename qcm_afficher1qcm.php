<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->

<head>
	<meta charset="UTF-8">
	<title>affichage questions</title>
	<?php include "header.php"?>
</head>

<body>
	<?php include('connexion.php');?>
	<!--formulaire-->
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form action="qcm_afficher1qcm.php" method="POST">
				<!--affichage de la liste des qcm dans un select-->
				<?php include('connexion.php');
$reponse = $linkpdo->query("SELECT label_qcm, id_qcm_fk, id_user_fk FROM qcm");
?>
				<select title="choississez dans la liste" name="liste_de_qcm">
					<?php
foreach ($reponse as $data)
{echo '<option value="' . $data['id_qcm_fk'] . '">' . $data['label_qcm'] . '</option>';}
?>
				</select>
				<input type="submit" class="btn btn-primary" value="afficher ce qcm ?" name="validation_recherche_qcm">
			</form>
			<br><br>

			<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->

			<?php if(isset($_POST['validation_recherche_qcm'])){include('connexion.php');
	//recuperation id qcm depuis le formulaire
	$this_id_qcm =  $_POST['liste_de_qcm'];
	//requete pour afficher les questions du qcm
	$req_afficher_qcm = $linkpdo->query("SELECT  id_question, label_question FROM `contenir`, `question` WHERE `id_qcm_fk` = $this_id_qcm and `contenir`.`id_question_fk`= `question`.`id_question`");
	//requete pour obtenir le nom du qcm et l'afficher
	$req_nom_qcm = $linkpdo->query("SELECT label_qcm from qcm where id_qcm_fk = $this_id_qcm");
	$data = $req_nom_qcm->fetch();
	echo ("nom du qcm : ".$data["label_qcm"]);?>
			<p>NOTE : <br>Les bonnes réponses sont en bleu</p>
			<br>
			<?php
	if (!$req_afficher_qcm) {echo ("ERREUR SYSTEME") ;}
	$indice_question = 1;
	while ($donnees = $req_afficher_qcm->fetch()) {?>
			<br>
			<?php echo ("Question n° ".$indice_question);
$question = $donnees['id_question'];?>
			<table class="table table-striped table-hover ">
				<tbody>
					<table class="table table-striped table-hover ">
						<!--question-->

						<tr class="success">
							<td>
								<?php echo ($donnees['label_question']); ?>
							</td>
						</tr>
						<?php $indice_question++;?>
					</table>
					<br>
					<!--réponses-->
					<p>Reponses possibles :</p>
					<?php $req_afficher_reponses = $linkpdo->query("SELECT distinct  `id_reponse`, `label_reponse`, `validite`, `reponse`.`id_question_fk` FROM question, qcm, contenir, reponse where $question = `reponse`.`id_question_fk` and `reponse`.`id_question_fk`= `contenir`.`id_question_fk` and `contenir`.`id_qcm_fk` = $this_id_qcm");
		$indice_reponse = 1;?>
					<table class="table table-hover">
						<thead></thead>
						<tbody>
							<?php while ($donnees = $req_afficher_reponses->fetch()) {?>


							<tr>
								<td <?php if($donnees['validite']=="1" ){ echo ("style='color:blue'");}?>>
						<?php echo ($donnees['label_reponse']); ?>		
					</td>
				</tr>
				<?php $indice_reponse++;?>
<?php } ?>
		</tbody>
		</table>
	</tbody>
</table>
<?php } ?>
</body></div>
<div class="
								 col-sm-3">
		</div>
	</div>
	<?php include "footer.html"?>
	<?php
			// Principe : tant qu'il reste des donnees dans le tab de resultats de la req d'affichage des questions d'un qcm donné,
			//on affiche un tableau pour chaque question puis un tableau avec chacune des réponses à cette question
			//les questions et leurs réponses sont numérotées pour l'affichage
			//la validité de chaque réponse est affichée sous forme textuelle
			$req_afficher_qcm->closeCursor();}
			?>