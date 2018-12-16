<?php session_start()?>
</html>
<!--PHP TRAITEMENT DU FORMULAIRE-->
<?php
				//initialisation des variables
				$id_theme=0;
				$label_question="";
				$id_user=$_SESSION["id_user"];
				if(isset($_POST['validation_modification_question'])){
                    include('connexion.php');
                    echo ("operation en cours");
			//QUESTION
						//initialisation des variables avec le contenu des input du formulaire
					//$id_theme=$_POST["id_theme"];
					$label_question = $_POST["texte_question"];
					$req = $linkpdo->prepare('UPDATE question SET label_question = value :label_question, id_user_fk = value :id_user_fk)');
						///Exécution de la requête
					$req->execute(array('label_question' => $label_question,'id_user_fk' => $_SESSION['id_user']));
						//recuperation de l'id_question dans une variable de session
					//$_SESSION['id_question'] = $linkpdo->lastInsertId();
						//echo($_SESSION['id_question']);
			//REPONSES
				//reponse 1
					$label_reponse1="";
					$validite1=0;
					$label_reponse1 = $_POST['label_reponse1'];
					$validite1=$_POST['bonne_reponse1'];
					$req_reponse1 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse1, :validite1, :id_question_fk)');
						///Exécution de la requête
					$req_reponse1->execute(array('label_reponse1' => $label_reponse1,'validite1' => $validite1,'id_question_fk' => $_SESSION['id_question']));
				//reponse 2
					$label_reponse2="";
					$validite2=0;
					$label_reponse2 = $_POST['label_reponse2'];
					$validite2=$_POST['bonne_reponse2'];
					$req_reponse2 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse2, :validite2, :id_question_fk)');
						///Exécution de la requête
							$req_reponse2->execute(array('label_reponse2' => $label_reponse2,'validite2' => $validite2,'id_question_fk' => $_SESSION['id_question']));
				//reponse 3
					$label_reponse3="";
					$validite3=0;
					$label_reponse3 = $_POST['label_reponse3'];
					$validite3=$_POST['bonne_reponse3'];
					$req_reponse3 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse3, :validite3, :id_question_fk)');
						///Exécution de la requête
					$req_reponse3->execute(array('label_reponse3' => $label_reponse3,'validite3' => $validite3,'id_question_fk' => $_SESSION['id_question']));
				//reponse 4
					$label_reponse4="";
					$validite4=0;
					$label_reponse4 = $_POST['label_reponse4'];
					$validite4=$_POST['bonne_reponse4'];
					$req_reponse4 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse4, :validite4, :id_question_fk)');
						///Exécution de la requête
                $req_reponse4->execute(array('label_reponse4' => $label_reponse4,'validite4' => $validite4,'id_question_fk' => $_SESSION['id_question']));}
                