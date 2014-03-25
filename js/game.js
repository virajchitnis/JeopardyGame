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
	document.getElementById('setup_div').style.display = "none";
	document.getElementById('board_div').style.display = "block";
}

function restartGame () {
	document.getElementById('board_div').style.display = "none";
	document.getElementById('setup_div').style.display = "block";
}