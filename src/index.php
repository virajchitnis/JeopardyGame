<html>
	<head>
		<?php
		if (file_exists("/vagrant/savedata.sql")) {
			exec("sudo mysql -u jeopardy -p'jeopardy_pass' jeopardy < /vagrant/savedata.sql");
		}
		else {
			exec("sudo mysql -u jeopardy -p'jeopardy_pass' jeopardy < scripts/database.sql");
		}
		?>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/openlink.js"></script>
		<title>Jeopardy! by Viraj Chitnis</title>
	</head>
	<body class="body">
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<div id="welcome_body">
				<div id="welcome_choice_div">
					<table id="welcome_choice_table">
						<tr>
							<td class="welcome_choice_table_sides"></td>
							<td class="welcome_choice_table_center">
								<div class="welcome_choice_buttons" onclick="openLink('create')">
									<p>&nbsp;</p>
									<p><b>Create</b></p>
									<p>&nbsp;</p>
								</div>
							</td>
							<td class="welcome_choice_table_center">
								<div class="welcome_choice_buttons" onclick="openLink('games')">
									<p>&nbsp;</p>
									<p><b>Play</b></p>
									<p>&nbsp;</p>
								</div>
							</td>
							<td class="welcome_choice_table_sides"></td>
						</tr>
					</table>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<table id="welcome_info_table">
					<tr>
						<td class="welcome_info_table_sides"></td>
						<td id="welcome_info_table_center">
							<p><b>Create</b></p>
							<p class="welcome_info_text">Create a new question bank. This must be done before a game can be played.</p>
							<p><b>Play</b></p>
							<p class="welcome_info_text">Play a game. Choose a question bank from the list of question banks already created by you or someone else and start the game.</p>
						</td>
						<td class="welcome_info_table_sides"></td>
					</tr>
				</table>
			</div>
			<p>&nbsp;</p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>