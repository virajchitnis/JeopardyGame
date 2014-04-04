<html>
	<head>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/index.js"></script>
		<script src="js/types.js"></script>
		<script src="js/openlink.js"></script>
		<title>Welcome to Jeopardy!</title>
	</head>
	<body>
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div id="welcome_body">
				<div id="welcome_choice_div">
					<table id="welcome_choice_table">
						<tr>
							<td class="welcome_choice_table_sides"></td>
							<td class="welcome_choice_table_center">
								<div class="welcome_choice_buttons" onclick="showCreatePage()">
									<p>&nbsp;</p>
									<p><b>Create</b></p>
									<p>&nbsp;</p>
								</div>
							</td>
							<td class="welcome_choice_table_center">
								<div class="welcome_choice_buttons" onclick="openLink('games.php')">
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
							<p><b>Play</b></p>
						</td>
						<td class="welcome_info_table_sides"></td>
					</tr>
				</table>
			</div>
			<div id="creategame_body">
				<h3>Create a question bank:</h3>
				<p>&nbsp;</p>
				<form id="name_form">
					<input type="text" name="name" placeholder="Question bank name" size="25" maxlength="25">
					<input type="text" name="author" placeholder="Author name" size="25" maxlength="25">
				</form>
				<p>&nbsp;</p>
				<form id="question_form">
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<br>
					<input type="text" name="category" placeholder="Category">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
					<br>
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
				</form>
				<p>&nbsp;</p>
				<div>
					<form class="create_game_buttons" id="done_button" method="post" action="scripts/storejson.php" onsubmit=" return createJSON()">
						<input type="hidden" name="json" value="">
						<input type="hidden" name="name" value="">
						<input type="hidden" name="author" value="">
						<input type="submit" value="Done">
					</form>
					<button class="create_game_buttons" onclick="showWelcomePage()">Go back</button>
				</div>
			</div>
			<p>&nbsp;</p>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>