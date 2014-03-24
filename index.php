<html>
	<head>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/index.js"></script>
		<script src="js/types.js"></script>
		<title>Welcome to Jeopardy!</title>
	</head>
	<body>
		<div class="wrapper">
			<?php include('common/header.php'); ?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div id="welcome_body">
				<table id="welcome_table">
					<tr>
						<td class="welcome_table_data">
							<p>Play jeopardy online.</p>
						</td>
						<td class="welcome_table_data">
							<button onclick="showCreatePage()">Create question bank</button>
							<button>Play game</button>
						</td>
					</tr>
				</table>
			</div>
			<div id="creategame_body">
				<h3>Create a question bank:</h3>
				<p>&nbsp;</p>
				<form id="name_form">
					<input type="text" name="filename" placeholder="Question bank name" size="25" maxlength="25">
				</form>
				<p>&nbsp;</p>
				<form id="question_form">
					<input type="text" name="category" placeholder="Category">
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
				</form>
				<p>&nbsp;</p>
				<div>
					<form class="create_game_buttons" id="done_button" method="post" action="scripts/getqbank.php" onsubmit="createJSON()">
						<input type="hidden" name="json" value="">
						<input type="hidden" name="filename" value="">
						<input type="submit" value="Done">
					</form>
					<button class="create_game_buttons" onclick="addQuestion()">Add more</button>
					<button class="create_game_buttons" onclick="showWelcomePage()">Go back</button>
				</div>
			</div>
			<div class="push"></div>
		</div>
		<?php include('common/footer.php'); ?>
	</body>
</html>