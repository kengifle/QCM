<?php session_start()
//recupération des ik qcm et user dans les variables de session
//la requete est lancée tant qu'il y a des questions dans le qcm.
//le nbre de questions est transmis par une variable de session
//le nom du $_POST contenant id_reponse varie avec l'indice de la question
//, comme l'input dans le formulaire
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Félicitations</title>
</head>
<body>
	<p>Vous venez de répondre au questionnaire : <?php echo $_SESSION['id_qcm'];?></p>
<?php if(isset($_POST['repondre_question'])){include('connexion.php');

$nbre_de_questions = $_SESSION['indice_question'];
$id_user = $_SESSION["id_user"];
$id_qcm = $_SESSION["id_qcm"];
for ($i = $nbre_de_question; $i >0; $i --){
	echo ('yo   '.$nbre_de_questions);
	$reponse = $_POST['liste_de_questions'.$nbre_de_questions];
	echo $reponse;
	$nbre_de_questions --;
	$req ="INSERT INTO `a_rempli`(`id_user_fk`, `id_qcm_fk`, `id_reponse_fk`)
	VALUES ($id_user, $id_qcm, $reponse)";
	///Exécution de la requête
	$linkpdo->exec($req);}}

	?>
	<form action="traitement_valider_reponse.php" method = "POST">
		<input type="submit" name ="verdict" value = "connaître votre note? ">
	</form>
<?php
	//traitement du formulaire
	if(isset($_POST['verdict'])){include('connexion.php');
		$id_user = $_SESSION["id_user"];
		$id_qcm = $_SESSION["id_qcm"];


		$req = $linkpdo->query("SELECT COUNT(*) as note from question, reponse, contenir, qcm, a_rempli, `user`
		where `qcm`.`id_qcm_fk` = $id_qcm
		and `user`.`id_user` = $id_user
		
		and `a_rempli`.`id_qcm_fk`= `qcm`.`id_qcm_fk`
		and `contenir`.`id_qcm_fk`= `qcm`.`id_qcm_fk`
		and `contenir`.`id_question_fk`= `reponse`.`id_question_fk`
		and `reponse`.`id_question_fk` = `question`.`id_question`
		
		and `a_rempli`.`id_user_fk`= `user`.`id_user`
		and `a_rempli`.`id_reponse_fk` = `reponse`.`id_reponse`
		and validite = 0");
	
		$data = $req->fetch();
		echo ("votre résultat est le suivant : ".$data['note']." / ".$_SESSION['indice_question']);
		}
	?>
	
	
	
	</body>
	</html>