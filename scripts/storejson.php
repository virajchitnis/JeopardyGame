<?php
	if ((isset($_POST['json'])) && (isset($_POST['name'])) && (isset($_POST['author']))) {
		$json = $_POST['json'];
		$name = $_POST['name'];
		$author = $_POST['author'];
		
		$json_hash = hash('md5', $json);
		
		include("../config/config_sample.php");
		$db = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

		if($db->connect_errno > 0){
		    die('Unable to connect to database [' . $db->connect_error . ']');
		}
		
		$sql = $db->prepare("INSERT INTO QBanks VALUES (?, ?, ?, ?);");
		$sql->bind_param("ssss", $name, $author, $json, $json_hash);
		$sql->execute();
		
		$db->close();
		
		header("Location: ../");
	}
	else {
		header('Location: ../');
	}
?>