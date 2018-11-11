<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

<?php if(isset($_POST['ok'])){include('connexion.php');
$nbre_questions = $_POST["quantity"];

for ($indice = 1; $i <= $nbre_questions; $i++) {
    echo $i;
    
}





$req = $linkpdo->prepare('INSERT INTO qcm (label_qcm, id_user_fk ) VALUES(:label_qcm, :id_user_fk)');
			///Exécution de la requête
		$req->execute(array('label_qcm' => $nom_qcm,'id_user_fk' => $_SESSION['id_user']));

}?>
<?php
//req ajout question INSERT INTO `contenir`( `id_qcm_fk`, `id_question_fk`) VALUES (2,58)
	?>




</body>
</html>