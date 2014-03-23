<html>
	<head>
		<link rel="stylesheet" href="css/design.css">
		<script src="js/index.js"></script>
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
							<button onclick="showCreatePage()">Create new game</button>
							<button>Play game</button>
						</td>
					</tr>
				</table>
			</div>
			<div id="creategame_body">
				<h3>Create a new game:</h3>
				<form>
					<input type="text" name="category" placeholder="Category">
					<input type="text" name="category" placeholder="Question" size="50">
					<input type="text" name="category" placeholder="Answer" size="25">
					<input type="text" name="category" placeholder="Weight" size="6">
				</form>
				<button>Add more</button>
				<button onclick="showWelcomePage()">Go back</button>
			</div>
			<div class="push"></div>
		</div>
		<div class="footer">
			<p class="footer_text">&copy; 2014 Viraj Chitnis</p>
		</div>
	</body>
</html>