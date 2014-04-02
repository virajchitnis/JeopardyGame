var questions;		// Array that will contain the parsed JSON
var teams;			// Array that will contain the list of all playing teams
var timer;			// Variable containing the amount of time per team per question
var scores;			// Array for keeping track of the scores of all teams

var currTeam;		// Keeps track of the team thats currently answering
var lastWinTeam;	// Keeps track of the team that won the last round

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
	scores = new Array();
	
	for (var i = 0; i < teamForm.length; i++) {
		var currTeam = teamForm.elements[i].value;
		if (currTeam !== "") {
			var currScore = 0;
			scores.push(currScore);
			teams.push(currTeam);
		}
	}
	
	document.getElementById('setup_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
}

function selectQuestion (category, weight, elementID) {
	document.getElementById('question_text').innerHTML = "You selected: " + weight + " points from category " + category;
	document.getElementById(elementID).style.backgroundColor = "black";
	document.getElementById('board_div').style.display = "none";
	document.getElementById('question_div').style.display = "block";
}

function questionAnswered () {
	document.getElementById('question_text').innerHTML = "";
	document.getElementById('question_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
}

function restartGame () {
	document.getElementById('board_div').style.display = "none";
	document.getElementById('setup_div').style.display = "block";
}