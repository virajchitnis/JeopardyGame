var questions;		// Array that will contain the parsed JSON
var teams;			// Array that will contain the list of all playing teams
var timer;			// Variable containing the amount of time per team per question

var currTeam;		// Keeps track of the team thats currently answering
var lastWinTeam;	// Keeps track of the team that won the last round

var questionTimer;	// Timer object that will keep time for questions
var runningTime;	// Time remaining for question

function addTeam () {
	var parent = document.getElementById('team_form');
	var previous = parseInt(parent.elements[parent.length - 1].name);
	var current = previous + 1;
	
	var breakLine = document.createElement('br');
	var breakLine1 = document.createElement('br');
	var space = document.createElement('span');
	space.innerHTML = " ";
	
	var teamText = document.createElement('input');
	teamText.setAttribute('type', 'text');
	teamText.setAttribute('name', current);
	teamText.setAttribute('placeholder', 'Team ' + current);
	teamText.setAttribute('size', '25');
	teamText.setAttribute('maxlength', '25');
	
	if ((previous % 2) == 0) {
		parent.appendChild(breakLine);
		parent.appendChild(breakLine1);
	}
	else {
		parent.appendChild(space);
	}
	parent.appendChild(teamText);
}

function startGame () {
	questions = JSON.parse(document.getElementById('hidden_json').innerHTML);
	timer = parseInt(document.getElementById('timer_form').elements[0].value);
	teamForm = document.getElementById('team_form');
	teams = new Array();
	
	if (isNaN(timer) == true) {
		document.getElementById('setup_alert_text').innerHTML = "Please enter the time in seconds.";
		return false;
	}
	
	var teamCounter = 0;
	for (var i = 0; i < teamForm.length; i++) {
		var currTeam = new Team();
		currTeam.name = teamForm.elements[i].value;
		if (currTeam.name !== "") {
			currTeam.score = 0;
			teams.push(currTeam);
			teamCounter++;
		}
	}
	
	if (teamCounter <= 0) {
		document.getElementById('setup_alert_text').innerHTML = "At least one team is required.";
		return false;
	}
	
	for (var i = 1; i <= 6; i++) {
		document.getElementById("board_game_box" + i + "" + 1).innerHTML = "<p>&nbsp;</p><h3 class=\"board_game_box_text\">" + questions[0].weight + "</h3><p>&nbsp;</p>";
		document.getElementById("board_game_box" + i + "" + 5).innerHTML = "<p>&nbsp;</p><h3 class=\"board_game_box_text\">" + questions[1].weight + "</h3><p>&nbsp;</p>";
		document.getElementById("board_game_box" + i + "" + 10).innerHTML = "<p>&nbsp;</p><h3 class=\"board_game_box_text\">" + questions[2].weight + "</h3><p>&nbsp;</p>";
		document.getElementById("board_game_box" + i + "" + 15).innerHTML = "<p>&nbsp;</p><h3 class=\"board_game_box_text\">" + questions[3].weight + "</h3><p>&nbsp;</p>";
		document.getElementById("board_game_box" + i + "" + 20).innerHTML = "<p>&nbsp;</p><h3 class=\"board_game_box_text\">" + questions[4].weight + "</h3><p>&nbsp;</p>";
	}
	
	document.getElementById('setup_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
	updateScoreBoard();
	
	currTeam = teams[0];
	document.getElementById("board_div_current_team").innerHTML = "Team " + currTeam.name + " choose a question";
	
	var i2 = 0;
	for (var i = 1; i <= 6; i++) {
		document.getElementById('board_game_cat' + i).innerHTML = questions[i2].category;
		i2 += 5;
	}
}

function selectQuestion (category, weight, elementID) {
	var currCategory = document.getElementById("board_game_cat" + category).innerHTML;
	
	var tempElement = document.createElement('div');
	tempElement.innerHTML = document.getElementById("board_game_box" + category + "" + weight).innerHTML;
	var currWeight = tempElement.childNodes[1].innerHTML;
	
	for (var i = 0; i < questions.length; i++) {
		if ((questions[i].category == currCategory) && (questions[i].weight == currWeight)) {
			document.getElementById('question_text').innerHTML = questions[i].question;
			break;
		}
	}
	
	document.getElementById(elementID).className = "board_game_box_selected";
	document.getElementById(elementID).innerHTML = "<p>&nbsp;</p><h3>&nbsp;</h3><p>&nbsp;</p>";
	document.getElementById('board_div').style.display = "none";
	document.getElementById('question_div').style.display = "block";
	document.getElementById('timer_display').innerHTML = timer;
	
	runningTime = timer;
	questionTimer = setInterval(timeTracker, 1000);
}

function questionAnswered () {
	document.getElementById('question_text').innerHTML = "";
	document.getElementById('question_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
	clearInterval(questionTimer);
	updateScoreBoard();
}

function questionFailed() {
	document.getElementById('question_text').innerHTML = "";
	document.getElementById('question_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
	clearInterval(questionTimer);
	updateScoreBoard();
}

function restartGame () {
	document.getElementById('board_div').style.display = "none";
	document.getElementById('setup_div').style.display = "block";
}

function timeTracker () {
	runningTime--;
	
	if (runningTime > 0) {
		document.getElementById('timer_display').innerHTML = runningTime.toString();
	}
	else {
		clearInterval(questionTimer);
		switchTeam();
	}
}

function switchTeam () {
	for (var i = 0; i < teams.length; i++) {
		alert(currTeam === teams[i]);
		if ((currTeam === teams[i]) && ((i+1) < teams.length)) {
			currTeam = teams[i+1];
			runningTime = timer;
			questionTimer = setInterval(timeTracker, 1000);
			document.getElementById('timer_display').innerHTML = timer;
			break;
		}
		else {
			questionFailed();
		}
	}
}

function updateScoreBoard () {
	var scoreText = "";
	
	for (var i = 0; i < teams.length; i++) {
		if (i > 0) {
			scoreText = scoreText + " | " + teams[i].name + ": " + teams[i].score.toString();
		}
		else {
			scoreText = scoreText + teams[i].name + ": " + teams[i].score.toString();
		}
	}
	document.getElementById('game_score_display').innerHTML = scoreText;
}