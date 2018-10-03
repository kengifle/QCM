	<?php
	///Connexion au serveur MySQL / creation de l'objet PDO $linkpdo qui sera utilisé dans les requêtes
	try {
		$linkpdo = new PDO('mysql:host=localhost;dbname=qcm;charset=utf8', 'root', '');
	} catch (Exception $e) {
		die('Oups, problème de connexion : ' . $e->getMessage());
	}
	?>