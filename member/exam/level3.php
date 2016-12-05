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
		mysql_query("UPDATE users SET `test_level3` = '$test_status' WHERE `usn`='$user'");
	?><script>window.location = "../my-tests.php";</script><?php
}
if($userRow['test_level3']!="Not yet taken")
{
	header("Location: ../my-tests.php");
}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title>TEST - Level 3</title>
	<link rel="stylesheet" type="text/css" href="css/test.css">
	<script type="text/javascript" src="js/timer.js"></script>
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
		var t = setTimeout("time()", 1000);
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
		Level 3 - Technical and Skills Test 2<span id="timer">Time left :
		<span id="time">01 : 00 : 00</span></span>
	</div>
	<div id="content" >
		
		<div id="questionBox">
			<div id="questionNo">
			Question 1
			</div>
			<div id="question">
			</div>
			<div id="questionBottom">
			</div>
			<div id="workSpaceBox">
				<button type="button" class="qButton" id="wsButton"><img src="img/workspace.png" class="buttIcon"><span id="wsText"> Work Space</span></button>
			</div>
			<script>
				var onlyOnce=false;
				var workSpace;
				document.getElementById("wsButton").onclick=function(){
					if(onlyOnce == false)
					{
						document.getElementById("wsText").innerHTML = " Remove Work Space";
						workSpace = document.createElement("textarea");
						document.getElementById("workSpaceBox").appendChild(workSpace);
						workSpace.id = "spaceForSolving";
						workSpace.placeholder = "Work Space";
						onlyOnce = true;
					}else{
						document.getElementById("wsText").innerHTML = " Work Space";
						document.getElementById("workSpaceBox").removeChild(workSpace);
						onlyOnce = false;
					}
				}
			</script>
		</div>
		
		<div id="sideBar">
			<div id="qpHead">
				Question Palette
			</div>
			<div id="qPallete">
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="0" onclick="renderQuestion(0)">1</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="1"  onclick="renderQuestion(1)">2</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="2"  onclick="renderQuestion(2)">3</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="3"  onclick="renderQuestion(3)">4</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="4"  onclick="renderQuestion(4)">5</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="5"  onclick="renderQuestion(5)">6</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="6"  onclick="renderQuestion(6)">7</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="7"  onclick="renderQuestion(7)">8</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="8"  onclick="renderQuestion(8)">9</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="9"  onclick="renderQuestion(9)">10</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="10"  onclick="renderQuestion(10)">11</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="11"  onclick="renderQuestion(11)">12</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="12"  onclick="renderQuestion(12)">13</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="13"  onclick="renderQuestion(13)">14</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="14"  onclick="renderQuestion(14)">15</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="15"  onclick="renderQuestion(15)">16</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="16"  onclick="renderQuestion(16)">17</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="17"  onclick="renderQuestion(17)">18</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="18"  onclick="renderQuestion(18)">19</button></div>
				<div class="qPalleteQuesNo"><button class="qPalleteQuesNoButton" id="19"  onclick="renderQuestion(19)">20</button></div>
			</div>
			<div id="qpColors">
				<div class="qpColorBox"><div class="qpColor" id="ans"></div>Answered</div>
				<div class="qpColorBox"><div class="qpColor" id="notAns"></div>Not Answered</div>
				<div class="qpColorBox"><div class="qpColor" id="mfr"></div>Marked For Review</div>
				<div class="qpColorBox"><div class="qpColor" id="notVis"></div>Not Visited</div>
			</div>
		</div>
		
		<div id="insSub">
			<div id="containerdiv"><button class="qButton" id="summaryButton" onclick="summary()"><img src='img/summary.png' class='buttIcon'> Test Summary</button>
			<button class="qButton" id="instrucButton" onclick="instructions()"><img src='img/instructions.png' class='buttIcon'> Instructions</button></div>
			<form method="post">
				<input type="text" name="test_details" id="test-detail" value="Not yet taken" style="display:none">
			<div id="containerdiv"><button class="qButton" id="submitButton" name="submitbtn" onclick="submitTest()"><img src='img/submit.png' class='buttIcon'> Submit Test</button></div>
			</form>
		</div>
		
		<div id="footer">
		</div>
	</div>
</div>
<div id="summaryParent" style="display:none"><div id="moreSumm" style="display:none;"></div></div>
<div id="moreParent" style="display:none"><div id="more" style="display:none;"></div></div>
<div id="instrucParent" style="display:none"><div id="instructions" style="display:none;"></div></div>

<script src="js/test3.js"></script>

<footer>
	<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
</footer>
</body>
</html>