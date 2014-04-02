<html>
	<head>
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
		
				$sql = $db->prepare("SELECT json, name FROM QBanks WHERE json_hash = ?;");
				$sql->bind_param('s', $json_hash);
				$sql->execute();
				$sql->bind_result($json, $name);
				$sql->fetch();
				$sql->free_result();
				$db->close();
			}
		?>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/game.js"></script>
		<script src="js/types.js"></script>
		<title><?php echo $name; ?> - Play Jeopardy!</title>
	</head>
	<body id="body_background">
		<div class="wrapper">
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
				<button onclick="startGame()">Start game</button>
			</div>
			<div id="board_div">
				<div id="board_div_header">
					<p>&nbsp;</p>
					<button onclick="restartGame()">Restart game</button>
					<button>End game</button>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<div>
						<table id="board_game_table">
							<tr>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 1</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 2</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 3</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 4</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 5</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">Category 6</h3>
										<p>&nbsp;</p>
									</div>
								</th>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div class="board_game_box">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<p id="hidden_json"><?php echo $json; ?></p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>