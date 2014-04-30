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
		
		if (file_exists("/vagrant")) {
			if (file_exists("/vagrant/savedata.sql")) {
				exec("sudo rm /vagrant/savedata.sql");
			}
			exec("sudo mysqldump -u jeopardy -p'jeopardy_pass' jeopardy > /vagrant/savedata.sql");
		}
		
		header('Location: ../games');
	}
	else {
		header('Location: ../games');
	}
?>