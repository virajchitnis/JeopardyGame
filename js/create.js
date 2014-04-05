function createJSON () {
	var filename = document.getElementById('name_form').elements[0].value;
	if (filename == null || filename == ""){
		document.getElementById('error_messages').innerHTML = "Question bank name cannot be blank!";
		return false;
	}
	var author = document.getElementById('name_form').elements[1].value;
	if (author == null || author == ""){
		document.getElementById('error_messages').innerHTML = "Author cannot be blank!";
		return false;
	}
	
	var dataForm = document.getElementById('question_form');
	var questions = new Array();
	
	var currCategory = "";
	var i = 0;
	while (i < dataForm.length) {
		if ((i == 0) || (i == 16) || (i == 32) || (i == 48) || (i == 64) || (i == 80)) {
			currCategory = dataForm.elements[i].value;
			if (currCategory == null || currCategory == ""){
				document.getElementById('error_messages').innerHTML = "Category cannot be blank!";
				return false;
			}
			i++;
		}
		else {
			var currQuestion = new Question();
			currQuestion.category = currCategory;
			currQuestion.question = dataForm.elements[i].value;
			if (currQuestion.question == null || currQuestion.question == ""){
				document.getElementById('error_messages').innerHTML = "Question cannot be blank!";
				return false;
			}
			currQuestion.answer = dataForm.elements[i+1].value;
			if (currQuestion.answer == null || currQuestion.answer == ""){
				document.getElementById('error_messages').innerHTML = "Answer cannot be blank!";
				return false;
			}
			currQuestion.weight = dataForm.elements[i+2].value;
			if (currQuestion.weight == null || currQuestion.weight == ""){
				document.getElementById('error_messages').innerHTML = "Points cannot be blank!";
				return false;
			}
			else if (isNaN(currQuestion.weight)) {
				document.getElementById('error_messages').innerHTML = "Points must be a valid number!";
				return false;
			}
			questions.push(currQuestion);
			i += 3;
		}
	}
	
	if (!((parseInt(dataForm.elements[3].value) < parseInt(dataForm.elements[6].value)) && (parseInt(dataForm.elements[6].value) < parseInt(dataForm.elements[9].value)) && (parseInt(dataForm.elements[9].value) < parseInt(dataForm.elements[12].value)) && (parseInt(dataForm.elements[12].value) < parseInt(dataForm.elements[15].value)))) {
		document.getElementById('error_messages').innerHTML = "Points in each category have to be in ascending order.";
		return false;
	}
	
	if (!((dataForm.elements[3].value == dataForm.elements[19].value) && (dataForm.elements[19].value == dataForm.elements[35].value) && (dataForm.elements[35].value == dataForm.elements[51].value) && (dataForm.elements[51].value == dataForm.elements[67].value) && (dataForm.elements[67].value == dataForm.elements[83].value))) {
		document.getElementById('error_messages').innerHTML = "Each category has to have the same point values and they have to be in the same order.";
		return false;
	}
	if (!((dataForm.elements[6].value == dataForm.elements[22].value) && (dataForm.elements[22].value == dataForm.elements[38].value) && (dataForm.elements[38].value == dataForm.elements[54].value) && (dataForm.elements[54].value == dataForm.elements[70].value) && (dataForm.elements[70].value == dataForm.elements[86].value))) {
		document.getElementById('error_messages').innerHTML = "Each category has to have the same point values and they have to be in the same order.";
		return false;
	}
	if (!((dataForm.elements[9].value == dataForm.elements[25].value) && (dataForm.elements[25].value == dataForm.elements[41].value) && (dataForm.elements[41].value == dataForm.elements[57].value) && (dataForm.elements[57].value == dataForm.elements[73].value) && (dataForm.elements[73].value == dataForm.elements[89].value))) {
		document.getElementById('error_messages').innerHTML = "Each category has to have the same point values and they have to be in the same order.";
		return false;
	}
	if (!((dataForm.elements[12].value == dataForm.elements[28].value) && (dataForm.elements[28].value == dataForm.elements[44].value) && (dataForm.elements[44].value == dataForm.elements[60].value) && (dataForm.elements[60].value == dataForm.elements[76].value) && (dataForm.elements[76].value == dataForm.elements[92].value))) {
		document.getElementById('error_messages').innerHTML = "Each category has to have the same point values and they have to be in the same order.";
		return false;
	}
	if (!((dataForm.elements[15].value == dataForm.elements[31].value) && (dataForm.elements[31].value == dataForm.elements[47].value) && (dataForm.elements[47].value == dataForm.elements[63].value) && (dataForm.elements[63].value == dataForm.elements[79].value) && (dataForm.elements[79].value == dataForm.elements[95].value))) {
		document.getElementById('error_messages').innerHTML = "Each category has to have the same point values and they have to be in the same order.";
		return false;
	}
	
	var jsonified = JSON.stringify(questions);
	document.getElementById('done_button').elements[0].value = jsonified;
	document.getElementById('done_button').elements[1].value = filename;
	document.getElementById('done_button').elements[2].value = author;
}