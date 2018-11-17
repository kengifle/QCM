<?php session_start()?>



<?php if(isset($_POST['repondre_question'])){include('connexion.php');
		//req ajout question INSERT INTO `contenir`( `id_qcm_fk`, `id_question_fk`) VALUES (2,58)
		$id_question_a_ajouter =$_POST["liste_de_reponses"];
		$id_user_fk =$_SESSION["id_user"];
		$id_id_qcm_fk =$_SESSION["id_qcm"];

				$repondre_question = 'INSERT INTO a_rempli (id_user_fk, id_qcm_fk, id_reponse_fk)
				VALUES(?,?,?)';
				$req = $linkpdo->prepare($repondre_question);
				$req->execute([$id_user_fk, $id_id_qcm_fk, $id_question_a_ajouter]);
				
					echo ($_SESSION["id_user"].$_SESSION["id_qcm"].$_POST["liste_de_reponses"]);
					echo("vous venez de répondre à la question".$_SESSION['id_question']);
///Exécution de la requête
					
				//$req->execute(array('id_question' => $id_question_a_ajouter,'id_qcm_fk' => $id_qcm_a_modifier));
				//recuperation de l'id_question dans une variable de session
				//$_SESSION['id_question'] = $linkpdo->lastInsertId();
		}?>