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
		
		$sql = "INSERT INTO \'QBanks\' VALUES (\'".$db->escape_string($name)."\',\'".$db->escape_string($author)."\',\'".$db->escape_string($json)."\')";

		if(!$result = $db->query($sql)){
		    die('There was an error running the query [' . $db->error . ']');
		}
		
		$db->close();
	}
	else {
		header('Location: ../');
	}
?>