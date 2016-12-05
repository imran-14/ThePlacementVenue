
var pos = 0, test, test_status, question, choice, choices, chA, chB, chC, chD, correct = 0, questionNo, testButtons, answers = [], markedForReview = [], answeredQ = [];

var questions = [
    [ "Which of the following languages is more suited to a structured program?", "PL/1", "FORTRAN", "BASIC","PASCAL", "D" ],
    [ "A computer assisted method for the recording and analyzing of existing or hypothetical systems is", "Data transmission", "Data flow", "Data capture","Data processing", "B" ],
    [ "The brain of any computer system is", "ALU", "Memory", "CPU","Control unit", "C" ],
    [ "A systems programming language for microcomputers in the Intel family is", "PL/C", "PL/CT", "PL/M","PLA", "C" ],
	[ "Which of the following is still useful for adding numbers?", "EDSAC", "A scripting language mostly for the web", "When you use Java without compiling","None of the above", "C" ],
	[ "Which is true about an anonymous inner class?", "It can extend exactly one class and implement exactly one interface.", "It can extend exactly one class and can implement multiple interfaces.", "It can extend exactly one class or implement exactly one interface.","It can implement multiple interfaces regardless of whether it also extends a class", "C" ],
	[ "Which is true about a method-local inner class?", "It must be marked final.", "It can be marked abstract.", "It can be marked public.","It can be marked static.", "B" ],
	[ "Which constructs an anonymous inner class instance?", "Runnable r = new Runnable() { };", "Runnable r = new Runnable(public void run() { });", "Runnable r = new Runnable { public void run(){}};","System.out.println(new Runnable() {public void run() { }});", "D" ],
	[ "What command is used to count the total number of lines, words, and characters contained in a file?","countw", "wcount", "wc","count p", "C"],
	[ "What command is used with vi editor to delete a single character?", "x", "y", "a","z", "A" ],
	[ "The SQL command to create a table is:", "MAKE TABLE.", "ALTER TABLE.", "DEFINE TABLE.","CREATE TABLE.","D" ],
	[ "SQL views can be used to hide:", "columns and rows only.", "complicated SQL syntax only.", "both of the above can be hidden by an SQL view.","None of the above is correct.", "C" ],
	[ "A ________ is a program that performs some common action on database data and that is stored in the database.", "trigger", "stored procedure", "pseudofile","None of the above is correct.", "B" ],
	[ "What is an SQL virtual table that is constructed from other tables?", "Just another table", "A view", "A relation","Query results", "B" ],
	[ "Which of the following languages is more suited to a structured program?", "PL/1", "FORTRAN", "BASIC","PASCAL", "D" ],
	[ "A computer assisted method for the recording and analyzing of existing or hypothetical systems is", "Data transmission", "Data flow", "Data capture","Data processing", "B" ],
	[ "The brain of any computer system is", "ALU", "Memory", "CPU","Control unit", "C" ],
    [ "A systems programming language for microcomputers in the Intel family is", "PL/C", "PL/CT", "PL/M","PLA", "C" ],
	[ "Which of the following is still useful for adding numbers?", "EDSAC", "A scripting language mostly for the web", "When you use Java without compiling","None of the above", "C" ],
	[ "Which constructs an anonymous inner class instance?", "Runnable r = new Runnable() { };", "Runnable r = new Runnable(public void run() { });", "Runnable r = new Runnable { public void run(){}};","System.out.println(new Runnable() {public void run() { }});", "D" ],
];
var correctAnswers = ["D","B","C","C","C","C","B","D","C","A","D","C","B","B","D","B","C","C","C","D"];

for(var i=0; i<questions.length; i++)
{
	markedForReview[i] = false;
	answeredQ[i] = false;
}

function _(x)
{
    return document.getElementById(x);
}

//using arrow keys for rendering questions

document.onkeydown = checkKey;

function checkKey(e)
{
	e = e || window.event;

    if (e.keyCode == '38') {
        if(e.target.id == "spaceForSolving")
			return;
		return false;
    }
    else if (e.keyCode == '40') {
        if(e.target.id == "spaceForSolving")
			return;
		return false;
	}
    if (e.keyCode == '37') {
		if(e.target.id == "spaceForSolving")
			return;
		if(pos == 0)
			return false;
			prevQ();
    }
    else if (e.keyCode == '39') {
		if(e.target.id == "spaceForSolving")
			return;
		if(pos >= 19)
			return false;
			nextQ();
    }

}

function renderQuestion(qNo)
{
    test = _("question");
	pos = parseInt(qNo);

    _("questionNo").innerHTML = "Question "+(pos+1);
	
    question = questions[pos][0];
    chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
	chD = questions[pos][4];
    
	test.innerHTML = "<p class='Qp'>"+question+"</p>";
	if(answers[pos] == undefined)
	{
		notAnswered(pos);
		test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='A' onclick='answered(pos)' class='qOp'> "+chA+"</p>";
		test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='B' onclick='answered(pos)' class='qOp'> "+chB+"</p>";
		test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='C' onclick='answered(pos)' class='qOp'> "+chC+"</p>";
		test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='D' onclick='answered(pos)' class='qOp'> "+chD+"</p>";
	}
	else
	{
		if(answers[pos] == 'A')
		{
			test.innerHTML += "<p class='qOpLabel'><input type='radio'  checked='checked' name='choices' value='A' onclick='answered(pos)' class='qOp'> "+chA+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='B' onclick='answered(pos)' class='qOp'> "+chB+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='C' onclick='answered(pos)' class='qOp'> "+chC+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='D' onclick='answered(pos)' class='qOp'> "+chD+"</p>";
		}
		else if(answers[pos] == 'B')
		{
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='A' onclick='answered(pos)' class='qOp'> "+chA+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' checked='checked' name='choices' value='B' onclick='answered(pos)' class='qOp'> "+chB+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='C' onclick='answered(pos)' class='qOp'> "+chC+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='D' onclick='answered(pos)' class='qOp'> "+chD+"</p>";
		}
		else if(answers[pos] == 'C')
		{
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='A' onclick='answered(pos)' class='qOp'> "+chA+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='B' onclick='answered(pos)' class='qOp'> "+chB+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' checked='checked' name='choices' value='C' onclick='answered(pos)' class='qOp'> "+chC+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='D' onclick='answered(pos)' class='qOp'> "+chD+"</p>";
		}
		else if(answers[pos] == 'D')
		{
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='A' onclick='answered(pos)' class='qOp'> "+chA+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='B' onclick='answered(pos)' class='qOp'> "+chB+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' name='choices' value='C' onclick='answered(pos)' class='qOp'> "+chC+"</p>";
			test.innerHTML += "<p class='qOpLabel'><input type='radio' checked='checked' name='choices' value='D' onclick='answered(pos)' class='qOp'> "+chD+"</p>";
		}
	}
	test.innerHTML += "<div id='saved' style='position: absolute; right: 0; bottom: 0; width: 80px; height: 80px;'></div>";
	
	testButtons = _("questionBottom");
	testButtons.innerHTML = "<button type='button' class='qButton' id='prevButton' onclick='prevQ()'><img src='img/prev.png' class='buttIcon'> Previous</button>"
	//testButtons.innerHTML += "<button type='button' class='qButton' id='saveButton' onclick='saveAns()'><img src='img/save.png' class='buttIcon'> Save</button><span> </span>"
	if(markedForReview[pos] == false)
		testButtons.innerHTML += "<button type='button' class='qButton' id='mfrButton' onclick='markForReview(pos)'><img src='img/mfr.png' class='buttIcon'> Mark For Review</button><span> </span>"
	else
		testButtons.innerHTML += "<button type='button' class='qButton' id='mfrButton' onclick='markForReview(pos)'><img src='img/unmark.png' class='buttIcon'> Unmark</button><span> </span>"
	testButtons.innerHTML += "<button type='button' class='qButton' id='clearButton' onclick='clearResponse(pos)'><img src='img/clear.png' class='buttIcon'> Clear Response</button><span> </span>"
	testButtons.innerHTML += "<button type='button' class='qButton' id='quesButton' onclick='ques_disp()'><img src='img/quesPaper.png' class='buttIcon'> Question Paper</button>"
	testButtons.innerHTML += "<button type='button' class='qButton' id='nextButton' onclick='nextQ()'>Next <img src='img/next.png' class='buttIcon'></button>"
}

function saveAnswer(p)
{
	if(answeredQ[p] == true)
	{	
		var choices = document.getElementsByName("choices");
		for(var i=0; i<choices.length; i++)
		{
			if(choices[i].checked)
			{	
				answers[p] = choices[i].value;
			}
		}
	}
}

function saveAns()
{
	var saveText = _("saved");
	saveText.innerHTML = "<marquee direction='down' loop='1' height='100%' scrollamount='25'><img id='saveImg' src='img/saved.png'></marquee>";
}

function prevQ()
{
	if(pos == 0)
		return;
	renderQuestion(--pos);
}

function nextQ()
{
	if(pos >= questions.length-1)
		return;
	renderQuestion(++pos);
}

function markForReview(p)
{
	if(markedForReview[p] == false)
	{
		markedForReview[p] = true;
		_("mfrButton").innerHTML = "<img src='img/unmark.png' class='buttIcon'> Unmark";
		_(pos).style.backgroundColor = "#08457e";//blue
	}
	else
	{
		markedForReview[p] = false;
		_("mfrButton").innerHTML = "<img src='img/mfr.png' class='buttIcon'> Mark For Review";
		if(answeredQ[p]){
			_(pos).style.backgroundColor = "#008000";//green
			_(pos).style.color = "white";
		}
		else{
			_(pos).style.backgroundColor = "#e03c31";//red
			_(pos).style.color = "white";
		}
	}

}

function notAnswered(p)
{
	if(markedForReview[p])
		return;
	_(p).style.backgroundColor = "#e03c31";//red
	_(p).style.color = "white";
}

function answered(p)
{
	answeredQ[p] = true;
	saveAns();
	if(markedForReview[p])
	{
		_(p).style.backgroundColor = "#08457e";//blue
		_(p).style.color = "white";
	}
	else
	{
		_(p).style.backgroundColor = "#008000";//green
		_(p).style.color = "white";
	}
	saveAnswer(p);
}

function clearResponse(p)
{
	if(answers[p] == undefined)
		return false;
	answeredQ[p] = false;
	saveAns();
	answers[p] = undefined;
	var choices = document.getElementsByName("choices");
    for(var i=0; i<choices.length; i++)
	{
        if(choices[i].checked)
		{
			choices[i].checked = false;
			notAnswered(pos);
		}
	}
}

function checkAnswers()
{
	for(var i=0; i<answers.length; i++)
	{
		if(answers[i] == correctAnswers[i])
			correct++;
	}
}
function submitTest()
{
		
		checkAnswers();
		if(correct<=1)
			window.alert("You got "+correct+" answer correct");
		else
			window.alert("You got "+correct+" answers correct");
		if(correct>=14){
			window.alert("Congratulations, You qualified to the next round");
			document.getElementById('test-detail').value = 'Completed-Qualified-'+correct;
			window.location = "../my-tests.php";
		}
		else{
			window.alert("Sorry, You did not qualify to the next round");
			document.getElementById('test-detail').value = 'Completed-NotQualified-'+correct;
			window.location = "../my-tests.php";
		}
		//window.location = "../my-tests.php";
	
}

function noOfAnswered()
{
	var count = 0;
	for(var i = 0; i<questions.length; i++)
	{
		if(answers[i] == undefined)
			break;
		count++;
	}
	return count;
}
		
function abc()
{
	renderQuestion(pos);
}

function NotAnsCount(){ 
	var count = 0;
	for(var i = 0; i<answeredQ.length; i++)
		if(answeredQ[i] == false) count++;
	return count;
}
function mfrCount(){ 
	var count = 0;
	for(var i = 0; i<markedForReview.length; i++)
		if(markedForReview[i] == true) count++;
	return count;
}

function ques_disp() {
	var moreDivParent = document.getElementById("moreParent");
	moreDivParent.style.display="";
	var moreDiv = document.getElementById("more");
	moreDiv.innerHTML="";
	
	moreDiv.innerHTML += "<h1>Level 1</h1><br><hr/><br>";
	moreDiv.innerHTML += "<p style='color:green;'><i>* Answered Question is/are displayed in green color</i></p>";
	moreDiv.innerHTML += "<p style='color:red;'><i>* Not Answered Question is/are displayed in red color</i></p>";
	moreDiv.innerHTML += "<p style='color:blue;'><i>* Marked For Review Question is/are displayed in blue color</i></p><br><hr style='border-style:dashed;'><br>";
	
	for(var i = 0; i < questions.length; i++){
		var moreInfoDiv = document.createElement("div");
		moreInfoDiv.id="moreInfoDiv";
		
		var moreInfoQP = document.createElement("p");
		moreInfoDiv.appendChild(moreInfoQP);
	
		var moreAns = document.createElement("p");
		for(var j=0; j<4; j++){
			if(j==0)
				moreAns.innerHTML+=" A) "+questions[i][j+1]+"<br> ";
			if(j==1)
				moreAns.innerHTML+=" B) "+questions[i][j+1]+"<br> ";
			if(j==2)
				moreAns.innerHTML+=" C) "+questions[i][j+1]+"<br> ";
			if(j==3)
				moreAns.innerHTML+=" D) "+questions[i][j+1]+"<br> ";
			moreInfoDiv.appendChild(moreAns);
		}
		
		var yourAns = document.createElement("p");
		var ans = answers[i];
		if(answers[i] == "" || answers[i] == null)
			ans = "Not Answered"
		
		moreInfoQP.innerHTML+=(i+1)+") "+questions[i][0];
		
		if(answeredQ[i]){
			moreInfoQP.style.color = "green";
			moreAns.style.color = "green";
			yourAns.style.color = "green";
		}
		else{
			moreInfoQP.style.color = "red";
			moreAns.style.color = "red";
			yourAns.style.color = "red";
		}
		if(markedForReview[i]){
			moreInfoQP.style.color = "blue";
			moreAns.style.color = "blue";
			yourAns.style.color = "blue";
		}
		
		yourAns.innerHTML+=" <span style='color:black;'>Your Answer : </span>"+ans;
		moreInfoDiv.appendChild(yourAns);	
		moreDiv.appendChild(moreInfoDiv);
	}

	var closeLink = document.createElement("a");
	var close = document.createElement("img");
	close.id="close";
	close.src="img/close.png";
	closeLink.appendChild(close);
	closeLink.href="#";
	closeLink.onclick=function() {
		moreDiv.style.display="none";
		moreDiv.removeChild(moreInfoQP);	
	};
	moreDiv.appendChild(closeLink);
	moreDiv.style.height="0px";
	moreInfoQP.style.display="none";
	moreDiv.style.display="";
	
	var count=0;
	var interval = window.setInterval(function() {
		count++;
		if(count>50) {
			moreInfoQP.style.display="";
			window.clearInterval(interval);
			interval=null;
		}
		moreDiv.style.height=10*count+"px";
	}, 5);
	moreDivParent.onclick=function() {
		moreDivParent.style.display="none";
		moreDiv.style.display="none";
		moreDiv.removeChild(moreInfoQP);	
	};
}

function summary() {
	
	var summaryDivParent = document.getElementById("summaryParent");
	summaryDivParent.style.display="";
	var summaryDiv = document.getElementById("moreSumm");
	summaryDiv.innerHTML="";
	
	summaryDiv.innerHTML += "<h3>Level 1</h3><br><hr/><br>";
	summaryDiv.innerHTML += "<div style='color:white; background-color:green; padding:5px; margin:10px;' id='a0'>Answered : "+(20-NotAnsCount())+"</div>";
	summaryDiv.innerHTML += "<div style='color:white; background-color:red; padding:5px; margin:10px;' id='a1'>Not Answered : "+NotAnsCount()+"</div>";  
	summaryDiv.innerHTML += "<div style='color:white; background-color:blue; padding:5px; margin:10px;' id='a2'>Marked For Review : "+mfrCount()+"</div>"; 
	_("a0").style.display = "none";
	_("a1").style.display = "none";
	_("a2").style.display = "none";
	
	var closeLink = document.createElement("a");
	var close = document.createElement("img");
	close.id="close";
	close.src="img/close.png";
	closeLink.appendChild(close);
	closeLink.href="#";
	closeLink.onclick=function() {
		summaryDiv.style.display="none";	
	};
	summaryDiv.appendChild(closeLink);
	summaryDiv.style.height="0px";
	summaryDiv.style.display="";
	
	var count=0;
	var interval = window.setInterval(function() {
		count++;
		if(count>50) {
			summaryDiv.style.display="";
			window.clearInterval(interval);
			interval=null;
		}
		summaryDiv.style.height=4.3*count+"px";
		if(count==50){
			_("a0").style.display = "";
			_("a1").style.display = "";
			_("a2").style.display = "";
		}
		}, 5);
	summaryDivParent.onclick=function() {
		summaryDivParent.style.display="none";
		summaryDiv.style.display="none";	
	};
}

function instructions() {
	var moreDivParent = document.getElementById("instrucParent");
	moreDivParent.style.display="";
	var moreDiv = document.getElementById("instructions");
	moreDiv.innerHTML="";
	
	moreDiv.innerHTML += "<center><h1>Instructions</h1></center><br><hr/><br>";
	moreDiv.innerHTML += "<h2><u>General Instructions</u></h2><br>";
	moreDiv.innerHTML += "<p>1.Total duration of examination is 60 minutes(1 hour).</p>";
	moreDiv.innerHTML += "<p>2.The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches '00:00', the examination will end by itself. You will not be required to end or submit the examination in that case.</p>";
	moreDiv.innerHTML += "<p>3.The candidate can submit the test prior to the end of exam time, if he/she is willing to do so.</p>";
	moreDiv.innerHTML += "<p>4.The question pallete displayed on the right side of screen will show the status of each question using one of the following symbols:</p>";
	moreDiv.innerHTML += "<button class='qPalleteQuesNoButton' style='background-color:#f4f4f4;'>1</button><span> You have not visited the question yet.</span><br><br>";
	moreDiv.innerHTML += "<button class='qPalleteQuesNoButton' style='background-color:#e03c31; color:white;'>3</button><span> You have not answered the question.</span><br><br>";
	moreDiv.innerHTML += "<button class='qPalleteQuesNoButton' style='background-color:#008000; color:white;'>5</button><span> You have answered the question.</span><br><br>";
	moreDiv.innerHTML += "<button class='qPalleteQuesNoButton' style='background-color:#08457e; color:white;'>7</button><span> You have marked the question for review.</span><br><br>";
	moreDiv.innerHTML += "<p>The Marked For Review status for a question simply indicates that you would like to look at that question again. <i style='color:red'>If a question is answered and Marked For Review, your answer for that question will be considered in the evaluation</i>.</p><br>";
	moreDiv.innerHTML += "<h2><u>Exam Specific Instructions</u></h2><br>";
	moreDiv.innerHTML += "<p>1.The question paper has been set appropriately by highly professional lecturers and committee.";
	moreDiv.innerHTML += "<p>2.There will be 20 questions and 60 minutes to attempt these questions.";
	moreDiv.innerHTML += "<p>3.Each question carries 1 mark.";
	moreDiv.innerHTML += "<p>4.There is only one correct answer to each question.<p>";
	moreDiv.innerHTML += "<p>5.Applicant's qualification to next round and placement results are subject to the performance of the applicant in the test/s.<p><br>";
	moreDiv.innerHTML += "<h2><u>Navigating to a question</u></h2><br>";
	moreDiv.innerHTML += "<p>1.To navigate to a question, do the following:</p><br>";
	moreDiv.innerHTML += "<p> a.Click on the question number in the Question Palette to go that numbered question directly.</p><p> b.Click on the <i>Next</i> button to go to the next question. You can use the keyboard right arrow as well to do so.</p><p> c.Click on the <i>Previous</i> button to go to the previous question. You can use the keyboard left arrow as well to do so.</p><br>";
	moreDiv.innerHTML += "<p>2.You can view all the questions and your selected options, by clicking on the <i style='color:purple;'>Question Paper</i> button.</p><br>";
	moreDiv.innerHTML += "<h2><u>Answering a Question</h2><br>";
	moreDiv.innerHTML += "<p>1.To answer a question, do the following:</p><br>";
	moreDiv.innerHTML += "<p> a.To select and save your answer, click on the button of one of the options.</p><p> b.To deselect your selected option, select any of the other options.</p><p> c.To delete your selected option, click on the <i style='color:blue;'>Clear Response</i> button.</p><p> d.To mark the question for review, click on the <i style='color:orange'>Mark For Review</i> button.</p><p> e.To unmark the question from review, click on the <i style='color:orange'>Unmark</i> button.</p><br>";
	moreDiv.innerHTML += "<p>2.To change your answer to a question that has already been answered, first select that question for answering and then follow the procedure for answering that type of question.</p><br><br>";
	moreDiv.innerHTML += "<hr style='border-style:dashed;'>";
	
	var closeLink = document.createElement("a");
	var close = document.createElement("img");
	close.id="close";
	close.src="img/close.png";
	closeLink.appendChild(close);
	closeLink.href="#";
	closeLink.onclick=function() {
		moreDiv.style.display="none";	
	};
	moreDiv.appendChild(closeLink);
	moreDiv.style.height="0px";
	moreDiv.style.display="";
	
	var count=0;
	var interval = window.setInterval(function() {
		count++;
		if(count>50) {
			window.clearInterval(interval);
			interval=null;
		}
		moreDiv.style.height=10*count+"px";
	}, 5);
	moreDivParent.onclick=function() {
		moreDivParent.style.display="none";
		moreDiv.style.display="none";	
	};
}

window.addEventListener("load", abc(), false);