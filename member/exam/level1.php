<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: ../home.php");
}
	$user=$_SESSION['user'];
	$res=mysql_query("SELECT * FROM `users` WHERE `usn`='$user'");
	$userRow=mysql_fetch_array($res);

	
if(isset($_POST['submitbtn']))
{
	$test_status = $_POST['test_details'];
	if($test_status != 'Not yet completed')
		mysql_query("UPDATE users SET `test_level1` = '$test_status' WHERE `usn`='$user'");
	?><script>window.location = "../my-tests.php";</script><?php
}
if($userRow['test_level1']!="Not yet taken")
{
	header("Location: ../my-tests.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>TEST - GAME ROUND - Level 1</title>
	<link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="stylesheet" type="text/css" href="css/level1-game-home.css">
	
</head>

<body onload="time()">
<script>
document.onkeypress = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
           //alert('No F-12');
            return false;
        }
    }
    document.onmousedown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            //alert('No F-keys');
            return false;
        }
    }
document.onkeydown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            //alert('No F-keys');
            return false;
        }
    }
	//disaling rightclick
	//document.oncontextmenu = function(){return false}
	/*window.onbeforeunload = function()	{
        return "Reloading will erase all the data stored so far";
    };*/
	//disabling backspace button
	/*$(document).on("keydown", function (e) {
    if (e.which === 8 && !$(e.target).is("input, textarea")) {
        e.preventDefault();
    }
	});*/
</script>
<header>
	<span id="Date"></span>
	<script>
	function time()
	{
			var objToday = new Date(),
                weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
                dayOfWeek = weekday[objToday.getDay()],
                domEnder = new Array( 'th', 'th', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th' ),
                dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder[objToday.getDate()] : objToday.getDate() + domEnder[parseFloat(("" + objToday.getDate()).substr(("" + objToday.getDate()).length - 1))],
                months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                curMonth = months[objToday.getMonth()],
                curYear = objToday.getFullYear(),
                curHour = objToday.getHours() > 12 ? objToday.getHours() - 12 : (objToday.getHours() < 10 ? "0" + objToday.getHours() : objToday.getHours()),
                curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
                curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
                curMeridiem = objToday.getHours() > 12 ? "PM" : "AM";
				if(curHour == "00") curHour = 12;
		var today = curHour + ":" + curMinute + " " + curMeridiem + " " + dayOfWeek + ", " + dayOfMonth + " " + curMonth + ", " + curYear;
		document.getElementById("Date").innerHTML=today;
		var t = setTimeout("time", 1000);
	}
	</script>
	<img src="img/appPhoto.png" id="applicantPhoto">
	<div id="details">
		<img src="../../includes/users_photo/<?php echo $userRow['photo']; ?>" id="appProfImg">
		<div class="detailsApp"><span class="name"><?php echo $userRow['first_name']." ".$userRow['last_name']; ?></span></div>
		<div class="detailsApp"><span class="name"><?php echo $userRow['usn']; ?></span></div>
	</div>
	<script>
		document.getElementById("applicantPhoto").onmouseover=function(){
			document.getElementById("details").style.visibility="visible";
			document.getElementById("details").style.opacity="1";
		};
		document.getElementById("applicantPhoto").onmouseout=function(){
			document.getElementById("details").style.visibility="hidden";
			document.getElementById("details").style.opacity="0";
		};
	</script>
</header>

<div id="container">
	<div id="headLabel">
		Level 1 - IQ and Logical Reasoning Test
		<span id="timer">
		<form method="post">
			<input type="text" name="test_details" id="test-detail" value="Not yet taken" style="display:none">
			<button class="submitTestButton" id="submitButton" name="submitbtn" onclick="submitTest()">End Test</button>Time left :<span id="time">30 : 00</span></span>
		</form>
	</div>
	<script>
				//timer
		var seconds=60;
		var minutes=29;
		var stop=null;
		window.onload=startcountdownTimer;
		function startcountdownTimer()
		{
			stop = window.setInterval("countdownTime()",1000);
		}
		function countdownTime()
		{
			seconds--;
			if(seconds<0)
			{
				seconds=59;
				minutes--;
			}
			if(minutes<0)
			{
				minutes=29;
			}
			minutes = checkTime(minutes);
			seconds = checkTime(seconds);
			document.getElementById("time").innerHTML = minutes+" : "+seconds;
			if(minutes=="00"&&seconds=="00")
			{
				clearInterval(stop);
				window.alert("Time's up");
			}
		}
		function checkTime(i)
		{
			var istring = i+"";
			if(istring.length<2) return "0"+istring;
			else return istring;
		}
	</script>
	<div id="content" >
		<div class="game-box" id="item-1">
			<div id="item-1-game-name">
				<img src="img/colorgame.jpg" id="color_game_bg">
				<div id="c1" class="color_game">C</div><div class="color_game" id="o2">O</div><div class="color_game" id="l3">L</div><div class="color_game" id="o4">O</div><div class="color_game" id="u5">U</div><div class="color_game" id="r6">R</div>
				<div id="g7" class="color_game">G</div><div class="color_game" id="a8">A</div><div class="color_game" id="m9">M</div><div class="color_game" id="e10">E</div>
			</div>
			<div class="instructions-box">
				<h3 class="instructions-name">Instructions</h3>
				<ul type="square" style="color:white; margin-left:20px;">
					<li>This is a 120 secs game.</li>
					<li>It is basically a color matching game.</li>
					<li>Color names get generated in different <span style="font-weight:500">Font Colors</span>.</li>
					<li>If the name of the color string generated, matches with it's actual font color Click the Right Button.</li>
					<li>If the name of the color string generated, does not match with it's actual font color Click the Wrong Button.</li>
					<li>Every correct guess increments the game score and vice versa.</li>
				</ul>
				<p id="finalizedscore1"  style="display:none"></p>
				<p style="color:white;display:none" >Total Score : <span id="totalScore"></span></p>
			</div>
			<button class="start-game-button" id="game-1-startbutton" onclick="startGame1()">Start</button>
		</div>
		<div class="game-box" id="item-2" >
			<div id="item-1-game-name">
				<h3 id="unscramble_it_head">Unscramble it</h3>
				<img src="img/unscramble.jpg" id="unscramble_me">
				<!--<h1 class="game-2-heading">Unscramble it!</h1>-->
			</div>
			<div class="instructions-box" style="margin-top:1%;">
				<h3 class="instructions-name">Instructions<p id="finalizedscore2" style="color:white;display:none"></p></h3>
				<ul type="square" style="color:white; margin-left:20px;">
					<li>This is a 120 secs game.</li>
					<li>It is basically a visual processing skills game.</li>
					<li>Choose the scrambled word that has the same letters as the unscrambled word.</li>
					<li>Every correct guess increments the game score.</li>
					<li>Every incorrect guess decrements the game score.</li>
				</ul>
			</div>
			<button class="start-game-button" id="game-2-startbutton" onclick="startGame2()">Start</button>
		</div>
		<div class="game-box" id="item-3" >
				<h3 id="lrt_head">Logical Reasoning Test</h3>
				<img src="img/aptitude.jpg" id="aptitude_bg">
				<div style="margin-left:20px;width:80%;overflow:wrap;margin-top:20px">
				<h3 class="instructions-name" >Instructions</p></h3>
				<ul type="square" style="color:white; margin-left:20px;">
					<li>The test consists of 12 logical reasoning questions.</li>
					<li>Each question has 4 choices with only one correct answer.</li>
					<li>Each question carries 1 mark.</li>
					<li>There is no time limit fo this test.</li>
					<li>once you start the test you cannot stop or switch to other tests/games.</li>
				</ul>
				</div>
			<p id="aptitude_Score" style="display:none"></p>
			<button class="start-game-button" id="game-3-startbutton" onclick="startAptitude()">Start</button>
		</div>
	</div>
</div>
<div class="main-game-overlay" id="game-1-overlay" style="display:none">
	<div id="game-1">
		<p id="time-box-game-1">Time left : <span id="time-left-game-1">120 sec</span></p>
		<div id="main-game-box-1">
			<div id="color-string-box"><h1 id="color-string"></h1></div>
			<div id="validate-game-1">
				<input id="correct" type="image" src="img/right1.png"/>
				<input id="wrong" type="image" src="img/wrong1.png"/>
			</div>
		</div>
			<h1 style="color:white;">Score : <span id="score1"></span></h1>
	</div>
	
	<script>
	
	
	var score1 = 0;
	var once1 = false;
	var color = ["red","blue","yellow","black","green","violet","orange"];
	var colorFont = ["red","blue","yellow","black","green","violet","orange"];
	var coloredString = "";
	var finalized_score1 = 0;
	
	
	
	document.getElementById("score1").innerHTML = 0;
	
	function startGame1()
	{
		if(once1)	return;
		once1 = true;
		document.getElementById("game-1-overlay").style.display="block";
		startcountdownTimerGame1();
		stringGenerator();
	}
	
	function stringGenerator()
	{
		//validate();
		if(seconds1!=00){var z = Math.floor((Math.random()*7));
		var j = Math.floor((Math.random()*7));
		var k = Math.floor((Math.random()*7));
		if(z<3)j=k;
		coloredString = color[j].fontcolor(colorFont[k]);
		document.getElementById("color-string").innerHTML = coloredString;
		if(j==k){
			document.getElementById("correct").onclick = function(){
				document.getElementById("score1").innerHTML = ++score1;
				stringGenerator();
			};
			document.getElementById("wrong").onclick = function(){
				document.getElementById("score1").innerHTML = --score1;
				stringGenerator();
			};
		}
		else {
			document.getElementById("correct").onclick = function(){
					document.getElementById("score1").innerHTML = --score1;
				stringGenerator();
			};
			document.getElementById("wrong").onclick = function(){
			document.getElementById("score1").innerHTML = ++score1;
				stringGenerator();
			};
			}
		}
	}

		var seconds1=120;
	//var minutes1=0;
	var stop1=null;
	
	function startcountdownTimerGame1()
	{
		stop1 = window.setInterval("countdownTimeGame1()",1000);
	}
	function countdownTimeGame1()
	{
		seconds1--;
		if(seconds1<0)
		{
			seconds1=119;
		}
		/*if(minutes<0)
		{
			minutes=59;
		}*/
		//minutes1 = checkTimeGame1(minutes1);
		seconds1 = checkTimeGame1(seconds1);
		document.getElementById("time-left-game-1").innerHTML = seconds1+"sec";
		if(seconds1=="00")
		{
			clearInterval(stop1);
			window.alert("Time's up");
			if(score1  >= 90) finalized_score1 = 4;
			else if(score1 >= 75) finalized_score1 = 3;
			else if(score1 >= 60) finalized_score1 = 2;
			else if(score1 >= 50) finalized_score1 = 1;
			document.getElementById("finalizedscore1").innerHTML = finalized_score1;
			document.getElementById("game-1-overlay").style.display="none";
			TotalScore();
			gameOver1("game-1-startbutton");
		}
	}
	function checkTimeGame1(i)
	{
		var istring = i+"";
		if(istring.length<2) return "0"+istring;
		else return istring;
	}
	function gameOver1(id){
		var startBtn=document.getElementById(id);
		startBtn.innerHTML="Completed";
	}
	
	</script>
</div>
<div class="main-game-overlay" id="game-2-overlay" style="display:none">
	<div id="game-2">
		<p id="time-box-game-2">Time left : <span id="time-left-game-2">120 sec</span></p>
		<div id="main-game-box-2">
				<div id="game-content">
				<div id="quesDescription">
					Choose the scrambled word for :
				</div>
				<div id="question">

				</div>
				<div id="options">
					
				</div>
			</div>
		</div>
		<h1 style="color:white;">Score : <span id="score2"></span></h1>
	</div>
	<script>
		var once2=false;
		var finalized_score2=0;
		function startGame2()
		{
			if(once2)	return;
			once2 = true;
			document.getElementById("game-2-overlay").style.display="block";
			startcountdownTimerGame2();
			questionGenerator();
		}
		
		
		//timer Unscramble
		var seconds2=120;
		//var minutes=0;
		var stop2=null;
		
		function startcountdownTimerGame2()
		{
			stop2 = window.setInterval("countdownTimeGame2()",1000);
		}
		function countdownTimeGame2()
		{
			seconds2--;
			/*if(seconds<0)
			{
				seconds=59;
			}*/
			/*if(minutes<0)
			{
				minutes=59;
			}*/
			//minutes = checkTime(minutes);
			seconds2 = checkTimeGame2(seconds2);
			document.getElementById("time-left-game-2").innerHTML = seconds2+" secs";
			if(seconds2=="00")
			{
				clearInterval(stop2);
				window.alert("Time's up");
				if(score2  >= 44) finalized_score2 = 4;
				else if(score2 >= 38) finalized_score2 = 3;
				else if(score2 >= 30) finalized_score2 = 2;
				else if(score2 >= 25) finalized_score2 = 1;
				document.getElementById("finalizedscore2").innerHTML = finalized_score2;
				document.getElementById("game-2-overlay").style.display="none";
				TotalScore();
				gameOver1("game-2-startbutton");
			}
		}
		function checkTimeGame2(i)
		{
			var istring = i+"";
			if(istring.length<2) return "0"+istring;
			else return istring;
		}
		
		var score2 = 0;
		//var once = false;
		var question;
		var pos = 0;
		var choices,choice;
		var chA, chB, chC, chD;
			
		var questions = 
				[
					[ "be", "ib", "eb", "de","db", "B" ],
					[ "said", "ised", "sdio", "aisd","sgde", "C" ],
					[ "welcome", "elocmew", "welobf", "sfbjdb","sfjgjhf", "A" ],
					[ "get", "fedg", "fdg", "sfd","teg", "D" ],
					[ "in", "en", "nu", "en", "ni", "D"],
					[ "may", "ama", "uam", "ime", "yma", "D"],
					[ "sale", "ylse", "blea", "seal", "ilsa", "C"],
					[ "rare", "arre", "eqqa", "ryra", "apep", "A"],
					[ "wound", "wocod", "druno", "nuwdo", "uolnd", "C"],
					[ "equity", "yzeuiq", "tqiuyi", "euqcyi", "eiyqtu", "D"],
					[ "abuse", "buaeb", "zabeu", "seuba", "raube", "C"],
					[ "fall", "afff", "arrf", "flla", "sasf", "C"],
					[ "upset", "epsto", "teuvp", "epsut", "espot", "C"],
					[ "norm", "remn", "mrme", "mrom", "mjro", "C"],
					[ "store", "rosej", "orsty", "urtso", "rstoe", "D"],
					[ "mirror", "rimrra", "oirmrr", "zrrio", "offmfi", "B"],
					[ "total", "lnnoa", "tltoa", "lnaon", "ilott", "B"],
					[ "repair", "priaer", "eiiprr", "erpyar", "eidapd", "A"],
					[ "cooking", "cigunku", "sgconio", "ingkcoo", "hoockng", "C"],
					[ "flood", "xooe", "dlofo", "loofg", "fdcoo", "B"],
					[ "little", "twewit", "lytitl", "elltit", "tultli", "C"],
					[ "be", "ib", "eb", "de","db", "B" ],
					[ "said", "ised", "sdio", "aisd","sgde", "C" ],
					[ "welcome", "elocmew", "welobf", "sfbjdb","sfjgjhf", "A" ],
					[ "get", "fedg", "fdg", "sfd","teg", "D" ],
					[ "in", "en", "nu", "en", "ni", "D"],
					[ "may", "ama", "uam", "ime", "yma", "D"],
					[ "sale", "ylse", "blea", "seal", "ilsa", "C"],
					[ "rare", "arre", "eqqa", "ryra", "apep", "A"],
					[ "wound", "wocod", "druno", "nuwdo", "uolnd", "C"],
					[ "equity", "yzeuiq", "tqiuyi", "euqcyi", "eiyqtu", "D"],
					[ "abuse", "buaeb", "zabeu", "seuba", "raube", "C"],
					[ "fall", "afff", "arrf", "flla", "sasf", "C"],
					[ "upset", "epsto", "teuvp", "epsut", "espot", "C"],
					[ "norm", "remn", "mrme", "mrom", "mjro", "C"],
					[ "store", "rosej", "orsty", "urtso", "rstoe", "D"],
					[ "mirror", "rimrra", "oirmrr", "zrrio", "offmfi", "B"],
					[ "total", "lnnoa", "tltoa", "lnaon", "ilott", "B"],
					[ "repair", "priaer", "eiiprr", "erpyar", "eidapd", "A"],
					[ "cooking", "cigunku", "sgconio", "ingkcoo", "hoockng", "C"],
					[ "flood", "xooe", "dlofo", "loofg", "fdcoo", "B"],
					[ "little", "twewit", "lytitl", "elltit", "tultli", "C"],
					[ "rare", "arre", "eqqa", "ryra", "apep", "A"],
					[ "wound", "wocod", "druno", "nuwdo", "uolnd", "C"],
					[ "equity", "yzeuiq", "tqiuyi", "euqcyi", "eiyqtu", "D"],
					[ "abuse", "buaeb", "zabeu", "seuba", "raube", "C"],
					[ "fall", "afff", "arrf", "flla", "sasf", "C"],
					[ "upset", "epsto", "teuvp", "epsut", "espot", "C"],
				];
				
		function _(x){
			return document.getElementById(x);
		}

		
		function questionGenerator(){
			
			if(pos >= questions.length){
				window.alert("Game over");
				if(score2  >= 44) finalized_score2 = 4;
				else if(score2 >= 38) finalized_score2 = 3;
				else if(score2 >= 30) finalized_score2 = 2;
				else if(score2 >= 25) finalized_score2 = 1;
				document.getElementById("finalizedscore2").innerHTML = finalized_score2;
				document.getElementById("game-2-overlay").style.display="none";
				TotalScore();
				gameOver1("game-2-startbutton");
				return;
			}
			
			var quesBox = _("question");
			var optBox = _("options");
			
			question = questions[pos][0];
			chA = questions[pos][1];
			chB = questions[pos][2];
			chC = questions[pos][3];
			chD = questions[pos][4];
			
			quesBox.innerHTML=question;
			optBox.innerHTML="<button class='optbutton' onclick = 'ansVerify(1)' >"+chA+"</button>";
			optBox.innerHTML+="<button class='optbutton' onclick = 'ansVerify(2)' >"+chB+"</button>";
			optBox.innerHTML+="<button class='optbutton' onclick = 'ansVerify(3)' >"+chC+"</button>";
			optBox.innerHTML+="<button class='optbutton' onclick = 'ansVerify(4)' >"+chD+"</button>";
			
			_("score2").innerHTML=score2;
		}

		function ansVerify(ch){
			choice = ch;
			if(choice == 1) choice = "A";
			else if(choice == 2) choice = "B";
			else if(choice == 3) choice = "C";
			else if(choice == 4) choice = "D";
			
			if(choice == questions[pos][5])
				_("score2").innerHTML = ++score2;
			else
				_("score2").innerHTML = --score2;
			pos++;
			questionGenerator();
		}
	</script>
</div>
<div class="main-game-overlay" id="game-3-overlay" style="display:none">
	<div id="aptitude-test">
		<h1 id="logical_reasoning_title">Logical Reasoning Test</h1>
			
			
			<div id="q1_div" class="q_div">
				<p class="Question" id="q1"><span style="font-weight:500">1.</span> The words in the bottom row are related in the same way as the words in the top row. For each item, find the word that completes the bottom row of words.<br><span style="font-weight:500">Candle &emsp; lamp &emsp; floodlight </span>&emsp; //Place a horizontal line between the two lines……<br><span style="font-weight:500">Hut &emsp; cottage </span>&emsp; ?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q1" onclick="answered('0')" class="radioBtn"/></td>
						<td>Tent</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q1" onclick="answered('0')" class="radioBtn"/></td>
						<td>City</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q1" onclick="answered('0')" class="radioBtn"/></td>
						<td>Dwelling</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q1" onclick="answered('0')" class="radioBtn"/></td>
						<td>House</td>
					</tr>
				</table>
			</div>
			
			
			<div id="q2_div" class="q_div">
				<p class="Question" id="q2"><span style="font-weight:500">2.</span> Read the paragraph carefully and determine the main point the author is trying to make. What conclusion can be drawn from the argument? Each paragraph is followed by five statements.One statement supports the author's argument better than the others do.<br><br>A few states in this country are considering legislation that would prohibit schools from using calculators before thesixth grade. Other states take a different position. Some states are insisting on the purchase of graphing calculators for every student in middle school.<br>This paragraph best supports the statement that in this country</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q2" onclick="answered('1')" class="radioBtn"/></td>
						<td>there are at least two opinions about the use of calculators in schools.</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q2" onclick="answered('1')" class="radioBtn"/></td>
						<td>calculators are frequently a detriment to learning math.</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q2" onclick="answered('1')" class="radioBtn"/></td>
						<td>state legislators are more involved in education than ever before.</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q2" onclick="answered('1')" class="radioBtn"/></td>
						<td>the price of graphing calculators is less when schools buy in bulk.</td>
					</tr>
				</table>
			</div>
			
			<div id="q3_div" class="q_div">
				<p class="Question" id="q3"><span style="font-weight:500">3.</span> Pointing to a man in a photograph, a woman said, "His brother's father is the only son of my grandfather." How is the woman related to the man in the photograph?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q3" onclick="answered('2')" class="radioBtn"/></td>
						<td>Sister</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q3" onclick="answered('2')" class="radioBtn"/></td>
						<td>Aunt</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q3" onclick="answered('2')" class="radioBtn"/></td>
						<td>Grandmother</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q3" onclick="answered('2')" class="radioBtn"/></td>
						<td>Daughter</td>
					</tr>
				</table>
			</div>
			
			<div id="q4_div" class="q_div">
				<p class="Question" id="q4"><span style="font-weight:500">4.</span> If FRAGRANCE is written as SBHSBODFG, how can IMPOSING be written?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q4" onclick="answered('3')" class="radioBtn"/></td>
						<td>NQPTJHOJ</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q4" onclick="answered('3')" class="radioBtn"/></td>
						<td>NQPTJOHJ</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q4" onclick="answered('3')" class="radioBtn"/></td>
						<td>NQTPJOHJ</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q4" onclick="answered('3')" class="radioBtn"/></td>
						<td>NQPTJOHI</td>
					</tr>
				</table>
			</div>
			
			<div id="q5_div" class="q_div">
				<p class="Question" id="q5"><span style="font-weight:500">5.</span> In the following question, various terms of an alphabet series are given with one or more terms missing as shown by (?). Choose the missing term out of the given alternatives.<br><br>AZ, GT, MN, ?, YB</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q5" onclick="answered('4')" class="radioBtn"/></td>
						<td>KF</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q5" onclick="answered('4')" class="radioBtn"/></td>
						<td>RX</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q5" onclick="answered('4')" class="radioBtn"/></td>
						<td>SH</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q5" onclick="answered('4')" class="radioBtn"/></td>
						<td>TS</td>
					</tr>
				</table>
			</div>
			
			<div id="q6_div" class="q_div">
				<p class="Question" id="q6"><span style="font-weight:500">6.</span> Which word best suits the ‘?’ place in the analogy<br><br>Peace : Chaos :: Creation : ?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q6" onclick="answered('5')" class="radioBtn"/></td>
						<td>Manufacture</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q6" onclick="answered('5')" class="radioBtn"/></td>
						<td>Destruction</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q6" onclick="answered('5')" class="radioBtn"/></td>
						<td>Build</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q6" onclick="answered('5')" class="radioBtn"/></td>
						<td>Construction</td>
					</tr>
				</table>
			</div>
			
			<div id="q7_div" class="q_div">
				<p class="Question" id="q7"><span style="font-weight:500">7.</span> Which word best suits the ‘?’ place in the relation<br><br>Man : Biography : : Nation : ?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q7" onclick="answered('6')" class="radioBtn"/></td>
						<td>History</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q7" onclick="answered('6')" class="radioBtn"/></td>
						<td>Geography</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q7" onclick="answered('6')" class="radioBtn"/></td>
						<td>People</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q7" onclick="answered('6')" class="radioBtn"/></td>
						<td>Leader</td>
					</tr>
				</table>
			</div>
			
			<div id="q8_div" class="q_div">
				<p class="Question" id="q8"><span style="font-weight:500">8.</span> There is some relationship between diagrams A & B. The same relationship persists between C & D. Find the right diagrams for D from the alternatives.<br><img src="img/q7_img.png" style="width:auto;height:180px; margin-top:10px;"></p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q8" onclick="answered('7')" class="radioBtn"/></td>
						<td>1</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q8" onclick="answered('7')" class="radioBtn"/></td>
						<td>2</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q8" onclick="answered('7')" class="radioBtn"/></td>
						<td>3</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q8" onclick="answered('7')" class="radioBtn"/></td>
						<td>4</td>
					</tr>
				</table>
			</div>
			
			<div id="q9_div" class="q_div">
				<p class="Question" id="q9"><span style="font-weight:500">9.</span>Each question presents a situation and asks you to make a judgment regarding that particular circumstance. Choose an answer based on given information.<br><br>Eileen is planning a special birthday dinner for her husband's 35th birthday. She wants the evening to be memorable, but her husband is a simple man who would rather be in jeans at a baseball game than in a suit at a fancy restaurant. Which restaurant below should Eileen choose?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q9" onclick="answered('8')" class="radioBtn"/></td>
						<td>Alfredo's offers fine Italian cuisine and an elegant Tuscan decor. Patrons will feel as though they've spent the evening in a luxurious Italian villa.</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q9" onclick="answered('8')" class="radioBtn"/></td>
						<td>Pancho's Mexican Buffet is an all-you-can-eat family style smorgasbord with the best tacos in town.</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q9" onclick="answered('8')" class="radioBtn"/></td>
						<td>The Parisian Bistro is a four-star French restaurant where guests are treated like royalty. Chef Dilbert Olay is famous for his beef bourguignon.</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q9" onclick="answered('8')" class="radioBtn"/></td>
						<td>Marty's serves delicious, hearty meals in a charming setting reminiscent of a baseball clubhouse in honor of the owner,Marty Lester, a former major league baseball all-star.</td>
					</tr>
				</table>
			</div>
			
			<div id="q10_div" class="q_div">
				<p class="Question" id="q10"><span style="font-weight:500">10.</span> First, you will be given a list of three "nonsense" words and their English word meanings. The question that follow will ask you to reverse the process and translate an English word into the artificial language.<br><br>Here are some words translated from an artificial language.<br><br>gorblflur means fan belt<br>pixngorbl means ceiling fan<br>arthtusl means tile roof<br><br>Which word could mean "ceiling tile"?</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q10" onclick="answered('9')" class="radioBtn"/></td>
						<td>gorbltusl</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q10" onclick="answered('9')" class="radioBtn"/></td>
						<td>flurgorbl</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q10" onclick="answered('9')" class="radioBtn"/></td>
						<td>arthflur</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q10" onclick="answered('9')" class="radioBtn"/></td>
						<td>pixnarth</td>
					</tr>
				</table>
			</div>
			
			<div id="q11_div" class="q_div">
				<p class="Question" id="q11"><span style="font-weight:500">11.</span> In these series, you will be looking at both the letter pattern and the number pattern. Fill the blank in the middle of the series or end of the series.<br><br>SCD, TEF, UGH, ____, WKL</p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q11" onclick="answered('10')"class="radioBtn"/></td>
						<td>CMN</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q11" onclick="answered('10')"class="radioBtn"/></td>
						<td>UJI</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q11" onclick="answered('10')"class="radioBtn"/></td>
						<td>VIJ</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q11" onclick="answered('10')" class="radioBtn"/></td>
						<td>IJT</td>
					</tr>
				</table>
			</div>
			
			<div id="q12_div" class="q_div">
				<p class="Question" id="q12"><span style="font-weight:500">12.</span> Choose the figure which is different :<br><img src="img/q12_img.png" style="width:auto;height:180px; margin-top:10px;"></p>
				<table>
					<tr>
						<td><input type="radio" value="A" name="q12" onclick="answered('11')" class="radioBtn"/></td>
						<td>1</td>
					</tr>
					<tr>
						<td><input type="radio" value="B" name="q12" onclick="answered('11')" class="radioBtn"/></td>
						<td>2</td>
					</tr>
					<tr>
						<td><input type="radio" value="C" name="q12" onclick="answered('11')" class="radioBtn"/></td>
						<td>3</td>
					</tr>
					<tr>
						<td><input type="radio" value="D" name="q12" onclick="answered('11')" class="radioBtn"/></td>
						<td>4</td>
					</tr>
				</table>
			</div>
			
			<button id="aptitude_submit" name="submit_aptitue" onclick="verifyAptitude()"><img src="img/done.png" id="done_aptitude">Done!</button>
	</div>
	<script>
		var once3=false;
		function startAptitude()
		{
			if(once3)	return;
			once3 = true;
			document.getElementById("game-3-overlay").style.display="block";
		}
		
		var aptitudeScore=0;
		var correctAnswers=["D","A","A","B","C","B","A","D","D","D","C","C"];
		var markedAnswers=new Array(12);
		
		function answered(pos){
			var p = parseInt(pos);
			var choice = document.getElementsByName("q"+(p+1));
			var x;
			for(var i=0; i<choice.length; i++){
				if(choice[i].checked){
					markedAnswers[p]=choice[i].value;
				}
			}
		}
		
		function verifyAptitude(){
			var x=window.confirm("Do u want to proceed?");
			if(x){
				verifyAppscore();
				gameOver1("game-3-startbutton");
				document.getElementById("game-3-overlay").style.display="none";
				document.getElementById("aptitude_Score").innerHTML=aptitudeScore;
				TotalScore();
			}
			else return false;
		}
		function verifyAppscore(){
			for(var i=0; i<markedAnswers.length; i++){
				if(markedAnswers[i]!=null && markedAnswers[i]==correctAnswers[i]){
					aptitudeScore++;
				}
			}
		}
		var totalScore =0;
		function TotalScore(){
			totalScore = finalized_score1+finalized_score2+aptitudeScore;
			document.getElementById("totalScore").innerHTML=totalScore;
		}
		function submitTest()
		{
				if(totalScore>=14){
					window.alert("Congratulations, You qualified to the next round");
					document.getElementById('test-detail').value = 'Completed-Qualified-'+totalScore;
					window.location = "../my-tests.php";
				}
				else{
					window.alert("Sorry, You did not qualify to the next round");
					document.getElementById('test-detail').value = 'Completed-NotQualified-'+totalScore;
					window.location = "../my-tests.php";
				}
				//window.location = "../my-tests.php";
			
		}

	</script>
</div>


<footer>
	<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
</footer>
</body>
</html> 