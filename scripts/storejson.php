<?php
	if ((isset($_POST['json'])) && (isset($_POST['name'])) && (isset($_POST['author']))) {
		$json = $_POST['json'];
		$name = $_POST['name'];
		$author = $_POST['author'];
		
		include("../config/config_sample.php");
		$db = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

		if($db->connect_errno > 0){
		    die('Unable to connect to database [' . $db->connect_error . ']');
		}
		
		$sql = $db->prepare("INSERT INTO QBanks VALUES (?, ?, ?);");
		$sql->bind_param("sss", $name, $author, $json);
		$sql->execute();
		
		$db->close();
		
		header("Location: ../");
	}
	else {
		header('Location: ../');
	}
?>