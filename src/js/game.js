var questions;		// Array that will contain the parsed JSON
var teams;			// Array that will contain the list of all playing teams
var timer;			// Variable containing the amount of time per team per question

var currTeam;		// Keeps track of the team thats currently answering
var lastWinTeam;	// Keeps track of the team that won the last round

var questionTimer;	// Timer object that will keep time for questions
var runningTime;	// Time remaining for question

var questionStartTeam;	// Team that chose the question
var currTeamIndex;		// Index in array of the current team
var currQuestionWeight;	// Points for the chosen question
var currAnswer;			// Answer for the current question

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
		var tempTeam = new Team();
		tempTeam.name = teamForm.elements[i].value;
		if (tempTeam.name !== "") {
			tempTeam.score = 0;
			teams.push(tempTeam);
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
	updateCurrentTeamOnBoard();
	
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
			currAnswer = questions[i].answer;
			break;
		}
	}
	
	document.getElementById(elementID).className = "board_game_box_selected";
	document.getElementById(elementID).innerHTML = "<p>&nbsp;</p><h3>&nbsp;</h3><p>&nbsp;</p>";
	document.getElementById('board_div').style.display = "none";
	document.getElementById('question_div').style.display = "block";
	document.getElementById('timer_display').innerHTML = timer;
	
	currTeamIndex = 0;
	questionStartTeam = currTeam;
	updateCurrentTeamQuestion();
	currQuestionWeight = currWeight;
	
	runningTime = timer;
	questionTimer = setInterval(timeTracker, 1000);
}

function questionAnswered () {
	currTeam.score += parseInt(currQuestionWeight);
	showAnswer();
	clearInterval(questionTimer);
	updateScoreBoard();
}

function questionFailed() {
	for (var i = 0; i < teams.length; i++) {
		if (questionStartTeam === teams[i]) {
			if ((i+1) < teams.length) {
				currTeam = teams[i+1];
			}
			else {
				currTeam = teams[0];
			}
			break;
		}
	}
	showAnswer();
	clearInterval(questionTimer);
	updateScoreBoard();
}

function showAnswer () {
	document.getElementById('question_text').innerHTML = "";
	document.getElementById('question_team_text').innerHTML = "";
	document.getElementById('answer_text').innerHTML = currAnswer;
	document.getElementById('question_div').style.display = "none";
	document.getElementById('answer_div').style.display = "block";
}

function showGameBoard () {
	document.getElementById('answer_text').innerHTML = "";
	updateCurrentTeamOnBoard();
	document.getElementById('answer_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
}

function showEndGame () {
	var winners = getWinners();
	
	if (winners.length > 1) {
		var endgame_text = "Its a tie between ";
		
		for (var i = 0; i < winners.length; i++) {
			if (i == 0) {
				endgame_text += winners[i].name;
			}
			else if (i == (winners.length - 1)) {
				endgame_text += " and " + winners[i].name + "!";
			}
			else {
				endgame_text += ", " + winners[i].name;
			}
		}
		
		endgame_text += "<br>" + "You scored " + winners[0].score.toString() + " points";
		document.getElementById('endgame_text').innerHTML = endgame_text;
		document.getElementById('board_div').style.display = "none";
		document.getElementById('end_game_div').style.display = "block";
	}
	else {
		document.getElementById('endgame_text').innerHTML = winners[0].name + " has won! Congratulations!" + "<br>" + "You scored " + winners[0].score.toString() + " points";
		document.getElementById('board_div').style.display = "none";
		document.getElementById('end_game_div').style.display = "block";
	}
}

function restartGame () {
	location.reload();
}

function getWinners () {
	var winners = new Array();
	winners.push(teams[0]);
	var winner_index = 0;
	for (var i = 0; i < teams.length; i++) {
		if (teams[i].score > winners[0].score) {
			winners[0] = teams[i];
			winner_index = i;
		}
	}
	
	for (var i = 0; i < teams.length; i++) {
		if ((teams[i].score == winners[0].score) && (i != winner_index)) {
			winners.push(teams[i]);
		}
	}
	
	return winners;
}

function timeTracker () {
	runningTime--;
	
	if (runningTime > 0) {
		document.getElementById('timer_display').innerHTML = runningTime.toString();
	}
	else {
		clearInterval(questionTimer);
		setNextTeam();
	}
}

function setNextTeam () {
	for (var i = 0; i < teams.length; i++) {
		if (currTeam === teams[i]) {
			if ((i+1) < teams.length) {
				if ((teams[i+1]) !== questionStartTeam) {
					currTeam = teams[i+1];
					startNextTeam();
				}
				else {
					questionFailed();
				}
			}
			else {
				if ((teams[0]) !== questionStartTeam) {
					currTeam = teams[0];
					startNextTeam();
				}
				else {
					questionFailed();
				}
			}
			break;
		}
	}
}

function startNextTeam () {
	updateCurrentTeamQuestion();
	runningTime = timer;
	questionTimer = setInterval(timeTracker, 1000);
	document.getElementById('timer_display').innerHTML = timer;
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

function updateCurrentTeamOnBoard () {
	document.getElementById("board_div_current_team").innerHTML = currTeam.name + " choose a question";
}

function updateCurrentTeamQuestion () {
	document.getElementById('question_team_text').innerHTML = "Team " + currTeam.name + "'s turn";
}