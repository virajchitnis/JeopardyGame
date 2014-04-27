<html>
	<head>
		<?php
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
		
			$sql = $db->prepare("SELECT name, author, json_hash FROM QBanks ORDER BY name;");
			$sql->execute();
			$sql->bind_result($name, $author, $json_hash);
		?>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/openlink.js"></script>
		<title>All Games - Jeopardy!</title>
	</head>
	<body class="body">
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<div id="games_body">
				<h3>Games</h3>
				<table id="games_table">
					<tr>
						<th>Name</th>
						<th>Author</th>
						<th>Link</th>
						<th>Download as Text</th>
					</tr>
					<?php
						while($sql->fetch()){
					?>
							<tr>
								<td><?php echo $name; ?></td>
								<td><?php echo $author; ?></td>
								<td><a href="game?key=<?php echo $json_hash; ?>"><button class="game_buttons">Play</button></a></td>
								<td><a href="download?key=<?php echo $json_hash; ?>"><button class="game_buttons">Download</button></a></td>
							</tr>
					<?php
						}
						
						$sql->free_result();
						$db->close();
					?>
				</table>
				<p>&nbsp;</p>
				<p><b>Play</b></p>
				<p class="games_info_text">Click the play button to play the respective game. You can also right click (two finger click on Mac) the play button and copy the link address. This address is the direct link to that particular game and can be shared with students so that they can play the game themselves if they wish to.</p>
				<p><b>Download</b></p>
				<p class="games_info_text">The download button outputs the respective question bank in human readable plain text format. This can then be copied into a Word document to share with students or the link for the plain text document can be copied and shared, similar to the play button.</p>
			</div>
			<p id="hidden_json"><?php echo $json; ?></p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>