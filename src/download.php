<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Viraj Chitnis">
		<meta name="description" content="Jeopardy! Game">
		<meta name="copyright" content="&copy; 2014 Viraj Chitnis">
		<meta name="apple-mobile-web-app-title" content="Jeopardy!">
		<link rel="apple-touch-icon" href="images/favicon.ico" />
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="viewport" content="user-scalable=no">
		<link rel="icon" type="image/ico" href="images/favicon.ico">
		<title>Download - Jeopardy!</title>
	</head>
	<body>
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
		
				echo "<h2><b>Game:</b> ".$name."</h2>";
				echo "<h2><b>Author:</b> ".$author."</h2>";
				$questions = json_decode(utf8_encode($json), true);
		
				for ($i = 0; $i < count($questions); $i++) {
					if ((($i % 5) == 0) || ($i == 0)) {
						echo "<h3>Category: ".$questions[$i]['category']."</h3>";
					}
			
					echo "<b>Points:</b> ".$questions[$i]['weight']."<br>";
					echo "<b>Question:</b> ".$questions[$i]['question']."<br>";
					echo "<b>Answer:</b> ".$questions[$i]['answer']."<br><br>";
				}
		
				echo "Generated by Jeopardy! by Viraj Chitnis";
			}
		?>
	</body>
</html>