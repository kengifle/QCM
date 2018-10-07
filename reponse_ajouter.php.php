$linkpdo->lastInsertId();
		$id_question_fk=
		$label_reponse = $_POST['label_reponse'];
		$validite=$_POST['bonne_reponse'];

		$req2 = $linkpdo->prepare('INSERT INTO reponse (id_question_fk_, label_reponse, validite) VALUES(:id_question_fk, :label_reponse, :validite)');
		///Exécution de la requête
		$req2->execute(array(
			'id_question_fk' => $id_question_fk,
			'label_reponse' => $label_reponse,
			'validite' => $validite));