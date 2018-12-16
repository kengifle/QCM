<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Suppression des questions</title>
	<?php include "header.php"?>
</head>
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->

<body>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<?php include('connexion.php');?>
			<form class="form" action="question_supprimer1question.php" method="POST">
				<legend>Supprimez une question</legend>
				<!--affichage et choix du theme-->
				<!--affichage de la liste des questions dans un select : values = id question-->
				<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
				<div class="form-group">
					<select class="form-control" title="liste_de_questions" name="liste_de_questions">
						<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select></div>
				<div class="form-group"><input type="submit" class="btn btn-primary" value="supprimer cette question?" name="validation_suppression_question">
				</div>
			</form><br>
		</div>
		<div class="col-sm-3"></div>
	</div>
</body>
<?php include "footer.html";?>

</html>
<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->
<?php if(isset($_POST['validation_suppression_question'])){include('connexion.php');
	$this_id_question=  $_POST['liste_de_questions'];
    $req_supprimer_question = ("DELETE FROM question where id_question = $this_id_question");  
    $linkpdo->exec($req_supprimer_question);
    echo "La question a été supprimée du stock.";?>
<?php }?>