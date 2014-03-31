function showCreatePage () {
	document.getElementById('welcome_body').style.display = 'none';
	document.getElementById('creategame_body').style.display = 'block';
}

function showWelcomePage () {
	document.getElementById('creategame_body').style.display = 'none';
	document.getElementById('welcome_body').style.display = 'block';
}

function addQuestion () {
	var parent = document.getElementById('question_form');
	
	var breakLine = document.createElement('br');
	var breakLine1 = document.createElement('br');
	var space1 = document.createElement('span');
	var space2 = document.createElement('span');
	var space3 = document.createElement('span');
	space1.innerHTML = " ";
	space2.innerHTML = " ";
	space3.innerHTML = " ";
	
	var categoryText = document.createElement('input');
	categoryText.setAttribute('type', 'text');
	categoryText.setAttribute('name', 'category');
	categoryText.setAttribute('placeholder', 'Category');
	
	var questionText = document.createElement('input');
	questionText.setAttribute('type', 'text');
	questionText.setAttribute('name', 'question');
	questionText.setAttribute('placeholder', 'Question');
	questionText.setAttribute('size', '50');
	
	var answerText = document.createElement('input');
	answerText.setAttribute('type', 'text');
	answerText.setAttribute('name', 'answer');
	answerText.setAttribute('placeholder', 'Answer');
	answerText.setAttribute('size', '25');
	
	var weightText = document.createElement('input');
	weightText.setAttribute('type', 'text');
	weightText.setAttribute('name', 'weight');
	weightText.setAttribute('placeholder', 'Weight');
	weightText.setAttribute('size', '6');
	
	parent.appendChild(breakLine);
	parent.appendChild(breakLine1);
	parent.appendChild(categoryText);
	parent.appendChild(space1);
	parent.appendChild(questionText);
	parent.appendChild(space2);
	parent.appendChild(answerText);
	parent.appendChild(space3);
	parent.appendChild(weightText);
}

function createJSON () {
	var dataForm = document.getElementById('question_form');
	var questions = new Array();
	
	var currCategory = "";
	var i = 0;
	while (i < dataForm.length) {
		if ((i == 0) || (i == 16) || (i == 32) || (i == 48) || (i == 64) || (i == 80)) {
			currCategory = dataForm.elements[i].value;
			i++;
		}
		else {
			var currQuestion = new Question();
			currQuestion.category = currCategory;
			currQuestion.question = dataForm.elements[i].value;
			currQuestion.answer = dataForm.elements[i+1].value;
			currQuestion.weight = dataForm.elements[i+2].value;
			questions.push(currQuestion);
			i += 3;
		}
	}
	
	var jsonified = JSON.stringify(questions);
	var filename = document.getElementById('name_form').elements[0].value;
	var author = document.getElementById('name_form').elements[1].value;
	document.getElementById('done_button').elements[0].value = jsonified;
	document.getElementById('done_button').elements[1].value = filename;
	document.getElementById('done_button').elements[2].value = author;
}