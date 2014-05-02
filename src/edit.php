<html>
	<head>
		<?php
			$json;
			$name;
			$author;
			$json_hash;
			$questions;
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
				
				$questions = json_decode($json, true);
			}
			else {
				header("Location: create");
			}
		?>
		<?php
		if (file_exists('common/googleanalytics.php')) {
			include('common/googleanalytics.php');
		}
		?>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/create.js"></script>
		<script src="js/types.js"></script>
		<script src="js/openlink.js"></script>
		<meta charset="UTF-8">
		<meta name="author" content="Viraj Chitnis">
		<meta name="description" content="Jeopardy! Game">
		<meta name="copyright" content="&copy; 2014 Viraj Chitnis">
		<meta name="apple-mobile-web-app-title" content="Jeopardy!">
		<link rel="apple-touch-icon" href="images/favicon.ico" />
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="viewport" content="user-scalable=no">
		<link rel="icon" type="image/ico" href="images/favicon.ico">
		<title>Edit <?php echo $name ?> - Jeopardy!</title>
	</head>
	<body class="body">
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<div id="creategame_body">
				<h3>Edit <?php echo $name ?>:</h3>
				<p>&nbsp;</p>
				<form id="name_form">
					<input type="text" name="name" placeholder="Question bank name" size="25" maxlength="25" value="<?php echo $name ?>">
					<span>&nbsp;by&nbsp;</span>
					<input type="text" name="author" placeholder="Author name" size="25" maxlength="25" value="<?php echo $author ?>">
				</form>
				<p>&nbsp;</p>
				<form id="question_form">
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[0]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[0]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[0]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[0]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[1]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[1]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[1]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[2]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[2]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[2]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[3]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[3]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[3]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[4]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[4]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[4]["weight"] ?>">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[5]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[5]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[5]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[5]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[6]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[6]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[6]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[7]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[7]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[7]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[8]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[8]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[8]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50"value="<?php echo $questions[9]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[9]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[9]["weight"] ?>">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[10]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[10]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[10]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[10]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[11]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[11]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[11]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[12]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[12]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[12]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[13]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[13]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[13]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[14]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[14]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[14]["weight"] ?>">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[15]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[15]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[15]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[15]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[16]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[16]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[16]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[17]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[17]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[17]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[18]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[18]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[18]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[19]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[19]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[19]["weight"] ?>">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[20]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[20]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[20]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[20]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[21]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[21]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[21]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[22]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[22]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[22]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[23]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[23]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[23]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[24]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[24]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[24]["weight"] ?>">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category" value="<?php echo $questions[25]["category"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[25]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[25]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[25]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[26]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[26]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[26]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[27]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[27]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[27]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[28]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[28]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[28]["weight"] ?>">
					<br>
					<p class="question_form_spaces">&nbsp;</p>
					<input type="text" name="question" placeholder="Question" size="50" value="<?php echo $questions[29]["question"] ?>">
					<input type="text" name="answer" placeholder="Answer" size="25" value="<?php echo $questions[29]["answer"] ?>">
					<input type="text" name="weight" placeholder="Points" size="6" value="<?php echo $questions[29]["weight"] ?>">
					<br>
					<br>
				</form>
				<div>
					<form class="create_game_buttons" id="done_button" method="post" action="scripts/storejson.php" onsubmit=" return createJSON()">
						<input type="hidden" name="json" value="">
						<input type="hidden" name="name" value="">
						<input type="hidden" name="author" value="">
						<input type="hidden" name="key" value="<?php echo $json_hash ?>">
						<input type="submit" value="Done">
					</form>
					<button class="create_game_buttons" onclick="openLink('./')" id="back_button">Go back</button>
					<p class="create_game_buttons">&nbsp;</p>
					<p class="create_game_buttons" id="error_messages">&nbsp;</p>
				</div>
			</div>
			<p>&nbsp;</p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>