<?php
	if(isset($_GET["key"])){
		$key = $_GET["key"];
		
		if (file_exists('../config/config.php')) {
			include("../config/config.php");
		}
		else {
			include("../config/config_sample.php");
		}
		$db = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
		
		if($db->connect_errno > 0){
		    die('Unable to connect to database [' . $db->connect_error . ']');
		}
		
		$db_games = $db->prepare("DELETE FROM QBanks WHERE json_hash = ?;");
		$db_games->bind_param('s', $key);
		$db_games->execute();
		$db_games->free_result();
		
		$db->close();
		
		header('Location: ../games');
	}
	else {
		header('Location: ../games');
	}
?>