<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php
include('connexion.php');
$reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>	
<select id="liste" name="liste"><?php
foreach ($reponse as $data)
{
    echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
}
?></select>

</body>
</html>