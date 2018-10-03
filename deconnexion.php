<!--cette page detruit la session et renvoie à l'index-->
<?php
session_start();
$_SESSION=array();
session_unset();
session_destroy();
header("location: index.php");
?>
