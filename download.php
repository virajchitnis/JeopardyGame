<?php
	if (isset($_GET['key'])) {
		$json_hash = $_GET['key'];
		
		if (file_exists('config/config.php')) {
			include("config/config.php");
		}
		else {
			include("config/config_sample.php");
		}
		$db = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

		if($db->connect_errno > 0){
		    die('Unable to connect to database [' . $db->connect_error . ']');
		}

		$sql = $db->prepare("SELECT json, name, author FROM QBanks WHERE json_hash = ?;");
		$sql->bind_param('s', $json_hash);
		$sql->execute();
		$sql->bind_result($json, $name, $author);
		$sql->fetch();
		$sql->free_result();
		$db->close();
		
		echo "<b>Game:</b> ".$name."<br>";
		echo "<b>Author:</b> ".$author."<br>";
		echo " <br>";
		$questions = json_decode(utf8_encode($json), true);
		
		for ($i = 0; $i < count($questions); $i++) {
			echo "<b>Points:</b> ".$questions[$i]['weight']."<br>";
			echo "<b>Question:</b> ".$questions[$i]['question']."<br>";
			echo "<b>Answer:</b> ".$questions[$i]['answer'];
			
			if ($i == (count($questions) - 1)) {
				echo "<br>";
			}
			else {
				echo "<br><br>";
			}
		}
	}
?>