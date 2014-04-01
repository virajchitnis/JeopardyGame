<html>
	<head>
		<?php
			include("config/config_sample.php");
			$db = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

			if($db->connect_errno > 0){
			    die('Unable to connect to database [' . $db->connect_error . ']');
			}
		
			$sql = $db->prepare("SELECT name, author, json_hash FROM QBanks ORDER BY name;");
			$sql->execute();
			$sql->bind_result($name, $author, $json_hash);
		?>
		<link rel="stylesheet" href="css/design.css">
		<title>All Games</title>
	</head>
	<body>
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<div id="games_body">
				<h3>Games</h3>
				<table id="games_table">
					<tr>
						<th>Name</th>
						<th>Author</th>
						<th>Link</th>
					</tr>
					<?php
						while($sql->fetch()){
					?>
							<tr>
								<td><?php echo $name; ?></td>
								<td><?php echo $author; ?></td>
								<td><a href="game.php?key=<?php echo $json_hash; ?>">Play</a></td>
							</tr>
					<?php
						}
						
						$sql->free_result();
						$db->close();
					?>
				</table>
			</div>
			<p id="hidden_json"><?php echo $json; ?></p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>