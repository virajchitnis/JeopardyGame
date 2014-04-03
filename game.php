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
				<p>&nbsp;</p>
				<p id="setup_alert_text">&nbsp;</p>
			</div>
			<div id="board_div">
				<div id="board_div_header">
					<p>&nbsp;</p>
					<table id="board_div_header_table">
						<tr>
							<td id="board_div_header_left">
								<button onclick="restartGame()">Restart game</button>
								<button>End game</button>
							</td>
							<td id="board_div_header_right">
								<p id="game_score_display">Scores</p>
							</td>
						</tr>
					</table>
					<div>
						<p>&nbsp;</p>
						<div id="board_game_div">
							<h3 id="board_div_current_team">Current team</h3>
						</div>
						<p>&nbsp;</p>
						<table id="board_game_table">
							<tr>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat1" class="board_game_box_text">Category 1</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat2" class="board_game_box_text">Category 2</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat3" class="board_game_box_text">Category 3</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat4" class="board_game_box_text">Category 4</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat5" class="board_game_box_text">Category 5</h3>
										<p>&nbsp;</p>
									</div>
								</th>
								<th class="board_game_table_box">
									<div class="board_game_header_box">
										<p>&nbsp;</p>
										<h3 id="board_game_cat6" class="board_game_box_text">Category 6</h3>
										<p>&nbsp;</p>
									</div>
								</th>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div id="board_game_box11" class="board_game_box" onclick="selectQuestion(1,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box21" class="board_game_box" onclick="selectQuestion(2,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box31" class="board_game_box" onclick="selectQuestion(3,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box41" class="board_game_box" onclick="selectQuestion(4,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box51" class="board_game_box" onclick="selectQuestion(5,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box61" class="board_game_box" onclick="selectQuestion(6,1,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">1</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div id="board_game_box15" class="board_game_box" onclick="selectQuestion(1,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box25" class="board_game_box" onclick="selectQuestion(2,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box35" class="board_game_box" onclick="selectQuestion(3,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box45" class="board_game_box" onclick="selectQuestion(4,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box55" class="board_game_box" onclick="selectQuestion(5,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box65" class="board_game_box" onclick="selectQuestion(6,5,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">5</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div id="board_game_box110" class="board_game_box" onclick="selectQuestion(1,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box210" class="board_game_box" onclick="selectQuestion(2,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box310" class="board_game_box" onclick="selectQuestion(3,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box410" class="board_game_box" onclick="selectQuestion(4,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box510" class="board_game_box" onclick="selectQuestion(5,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box610" class="board_game_box" onclick="selectQuestion(6,10,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">10</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div id="board_game_box115" class="board_game_box" onclick="selectQuestion(1,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box215" class="board_game_box" onclick="selectQuestion(2,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box315" class="board_game_box" onclick="selectQuestion(3,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box415" class="board_game_box" onclick="selectQuestion(4,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box515" class="board_game_box" onclick="selectQuestion(5,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box615" class="board_game_box" onclick="selectQuestion(6,15,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">15</h3>
										<p>&nbsp;</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="board_game_table_box">
									<div id="board_game_box120" class="board_game_box" onclick="selectQuestion(1,20,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box220" class="board_game_box" onclick="selectQuestion(2,20,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box320" class="board_game_box" onclick="selectQuestion(3,20,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box420" class="board_game_box" onclick="selectQuestion(4,20,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box520" class="board_game_box" onclick="selectQuestion(5,20,this.id); this.onclick=null;">
										<p>&nbsp;</p>
										<h3 class="board_game_box_text">20</h3>
										<p>&nbsp;</p>
									</div>
								</td>
								<td class="board_game_table_box">
									<div id="board_game_box620" class="board_game_box" onclick="selectQuestion(6,20,this.id); this.onclick=null;">
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
			<div id="question_div">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h2 id="question_team_text">The question</h2>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h2 id="question_text">The question</h2>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 id="timer_display">30</h3>
				<p>&nbsp;</p>
				<button onclick="questionAnswered()">Answered</button>
			</div>
			<p id="hidden_json"><?php echo $json; ?></p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>