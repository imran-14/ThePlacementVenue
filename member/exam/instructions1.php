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

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Instructions - Level 1</title>
	<link rel="stylesheet" type="text/css" href="css/instructions.css">
</head>

<body onload="time()">
<script>
 /*document.onkeypress = function (event) {
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
    }*/
	//disaling rightclick
	//document.oncontextmenu = function(){return false}
	/*window.onbeforeunload = function()	{
        return "Reloading will erase all the data stored so far
    };*/
	
	/*For full screen mode
	    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }*/
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
		<div id="headLabel">Instructions</div>
		<div id="content">
		<h2><u>General Instructions</u></h2><br>
		<p style='margin-bottom:5px;'>1.Total duration of examination is 30 minutes.</p>
		<p style='margin-bottom:5px;'>2.Please do hover [place the mouse cursor] on the top right corner image and verify your details before test.</p>
		<p style='margin-bottom:5px;'>3.The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches '00:00', the examination will end by itself. You will not be required to end or submit the examination in that case.</p>
		<p style='margin-bottom:5px;'>4.The candidate can submit the test prior to the end of exam time, if he/she is willing to do so.</p>
		
		<h2><u>Exam Specific Instructions</u></h2><br>
		<p  style='margin-bottom:5px;'>1.The question paper has been set appropriately by highly professional lecturers and committee.
		<p style='margin-bottom:5px;'>2.There will be 3 'Logical Reasoning & IQ' games and 8 'Logical Reasoning' questions.
		<p style='margin-bottom:5px;'>3.Each game carries 4 marks.
		<p style='margin-bottom:5px;'>4.Instructions specific to each game have been specified before you start the game.
		<p style='margin-bottom:5px;'>3.Each question carries 1 mark.
		<p style='margin-bottom:5px;'>4.There is only one correct answer to each question.<p>
		<p style='margin-bottom:5px;'>5.Applicant's qualification to next round and placement results are subject to the performance of the applicant in the test/s.<p><br>
		<br><br>
		<input type="checkbox" id="agree"><b style="color:red;">  I have read and understood the instructions. All computer hardwares alloted to me are in proper working condition. I agree that I am not carrying any prohibited gadget like mobile phone,etc. / any prohibited material with me into the exam hall. I agree that in case of not adhering to the instructions, I will be disqualified from taking the exam.</b></input><br><br>
		<center><a onclick="return goToTest();" href="level1.php" style='text-decoration:none; color:white;' ><h3 id="confirm-redirect" >I am ready to start the test</h3></a></center>
		</div>
	</div>
	<script>
		function goToTest()
		{
			var confirmInstructions = document.getElementById("agree");
			if(confirmInstructions.checked == true)
				return true;
			else
			{
				window.alert("You need to agree to the terms and conditions first");
				return false;
			}
		}
	</script>

<footer>
	<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
</footer>
</body>
</html>