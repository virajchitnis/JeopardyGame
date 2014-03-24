<html>
	<head>
		<?php
			$file = "test.qbk";
			$open_file = "test_open.qbk";
			$deflated_file = "test_open";
			$location = "/tmp/";
			
			exec("cp ".$location.$file." ".$location.$open_file);
			exec("gunzip -S .qbk ".$location.$open_file);
			$json = file_get_contents($location.$deflated_file);
			exec("rm ".$location.$deflated_file);
		?>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/game.js"></script>
		<title><?php echo $open_file; ?> - Play Jeopardy!</title>
	</head>
	<body id="body_background">
		<div id="setup_div">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<h3>Time per team per question:</h3>
			<form id="timer_form">
				<input type="text" name="timer" placeholder="Time" size="4">
			</form>
			<p>&nbsp;</p>
			<h3>Teams:</h3>
			<form id="team_form">
				<input type="text" name="1" placeholder="Team 1" size="25" maxlength="25">
				<input type="text" name="2" placeholder="Team 2" size="25" maxlength="25">
			</form>
			<p>&nbsp;</p>
			<button onclick="addTeam()">Add more</button>
			<button>Start game</button>
		</div>
		<p id="hidden_json"><?php echo $json; ?></p>
	</body>
</html>