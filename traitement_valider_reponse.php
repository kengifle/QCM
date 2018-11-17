<?php session_start()?>
<?php if(isset($_GET['repondre_question'])){include('connexion.php');
		
$nbre_de_question = $_SESSION['indice_question'];
$id_user = $_SESSION["id_user"];
$id_qcm = $_SESSION["id_qcm"];

for ($i = $nbre_de_question; $i >0; $i --){
	echo ('yo   '.$nbre_de_question);
	$reponse = $_GET['liste_de_questions'.$nbre_de_question];
	echo $reponse;
	$nbre_de_question --;

	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";


	$req ="INSERT INTO `a_rempli`(`id_user_fk`, `id_qcm_fk`, `id_reponse_fk`)
	VALUES ($id_user, $id_qcm, $reponse)";
						///Exécution de la requête
						$linkpdo->exec($req);
				//reponse 2



}
		}?>