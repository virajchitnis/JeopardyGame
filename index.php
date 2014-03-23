<html>
	<head>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/index.js"></script>
		<script src="js/types.js"></script>
		<title>Welcome to Jeopardy!</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<p>&nbsp;</p>
				<h1>Jeopardy!</h1>
			</div>
			<p>&nbsp;</p>
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
				<form id="question_form">
					<input type="text" name="category" placeholder="Category">
					<input type="text" name="question" placeholder="Question" size="50">
					<input type="text" name="answer" placeholder="Answer" size="25">
					<input type="text" name="weight" placeholder="Weight" size="6">
				</form>
				<form>
					<input type="hidden" name="json" value="">
					<input type="submit" value="Done">
					<button onclick="addQuestion()">Add more</button>
					<button onclick="showWelcomePage()">Go back</button>
				</form>
				<button onclick="createJSON()">Test</button>
				<p id="test_para"></p>
			</div>
			<div class="push"></div>
		</div>
		<div class="footer">
			<p class="footer_text">&copy; 2014 Viraj Chitnis</p>
		</div>
	</body>
</html>