<?php
	if ((isset($_POST['json'])) && (isset($_POST['name'])) && (isset($_POST['author']))) {
		$json = $_POST['json'];
		$name = $_POST['name'];
		$author = $_POST['author'];
		$qbhash;
		if (isset($_POST['key'])) {
			$qbhash = $_POST['key'];
		}
		else {
			$qbhash = hash('md5', $name.$author.$json);
		}
		
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
		
		$db_count = $db->prepare("SELECT count(json_hash) FROM QBanks WHERE json_hash = ?;");
		$db_count->bind_param('s', $qbhash);
		$db_count->execute();
		$db_count->bind_result($count_key);
		$db_count->fetch();
		$db_count->free_result();
		
		if ($count_key > 0) {
			$db_movies = $db->prepare("UPDATE QBanks SET name = ? , author = ? , json = ? WHERE json_hash = ?;");
			$db_movies->bind_param("ssss", $name, $author, $json, $qbhash);
			$db_movies->execute();
			$db_movies->free_result();
		}
		else {
			$sql = $db->prepare("INSERT INTO QBanks VALUES (?, ?, ?, ?);");
			$sql->bind_param("ssss", $name, $author, $json, $qbhash);
			$sql->execute();
		}
		
		$db->close();
		
		if (file_exists("/vagrant")) {
			if (file_exists("/vagrant/savedata.sql")) {
				exec("sudo rm /vagrant/savedata.sql");
			}
			exec("sudo mysqldump -u jeopardy -p'jeopardy_pass' jeopardy > /vagrant/savedata.sql");
		}
		
		header("Location: ../games");
	}
	else {
		header('Location: ../games');
	}
?>