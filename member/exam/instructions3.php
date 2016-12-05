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
	<title>Instructions - Level 3</title>
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
		<p style='margin-bottom:5px;'>1.Total duration of examination is 60 minutes(1 hour).</p>
		<p style='margin-bottom:5px;'>2.Please do hover [place the mouse cursor] on the top right corner image and verify your details before test.</p>
		<p style='margin-bottom:5px;'>3.The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches '00:00', the examination will end by itself. You will not be required to end or submit the examination in that case.</p>
		<p style='margin-bottom:5px;'>4.The candidate can submit the test prior to the end of exam time, if he/she is willing to do so.</p>
		<p style='margin-bottom:25px;'>5.The question pallete displayed on the right side of screen will show the status of each question using one of the following symbols:</p>
		<button class='qPalleteQuesNoButton' style='background-color:#f4f4f4;'>1</button><span> You have not visited the question yet.</span><br><br>
		<button class='qPalleteQuesNoButton' style='background-color:#e03c31; color:white;'>3</button><span> You have not answered the question.</span><br><br>
		<button class='qPalleteQuesNoButton' style='background-color:#008000; color:white;'>5</button><span> You have answered the question.</span><br><br>
		<button class='qPalleteQuesNoButton' style='background-color:#08457e; color:white;'>7</button><span> You have marked the question for review.</span><br><br>
		<p>The Marked For Review status for a question simply indicates that you would like to look at that question again. <i style='color:red'>If a question is answered and Marked For Review, your answer for that question will be considered in the evaluation</i>.</p><br>
		<h2><u>Exam Specific Instructions</u></h2><br>
		<p  style='margin-bottom:5px;'>1.The question paper has been set appropriately by highly professional lecturers and committee.
		<p style='margin-bottom:5px;'>2.There will be 20 questions and 60 minutes to attempt these questions.
		<p style='margin-bottom:5px;'>3.Each question carries 1 mark.
		<p style='margin-bottom:5px;'>4.There is only one correct answer to each question.<p>
		<p style='margin-bottom:5px;'>5.Applicant's qualification to next round and placement results are subject to the performance of the applicant in the test/s.<p><br>
		<h2><u>Navigating to a question</u></h2><br>
		<p style='margin-bottom:5px;'>1.To navigate to a question, do the following:</p><br>
		<p style='margin-bottom:5px;'> a.Click on the question number in the Question Palette to go that numbered question directly.</p><p style='margin-bottom:5px;'> b.Click on the <i>Next</i> button to go to the next question. You can use the keyboard right arrow as well to do so.</p><p style='margin-bottom:5px;'> c.Click on the <i>Previous</i> button to go to the previous question. You can use the keyboard left arrow as well to do so.</p><br>
		<p style='margin-bottom:5px;'>2.You can view all the questions and your selected options, by clicking on the <i style='color:purple;'>Question Paper</i> button.</p><br>
		
		<h2><u>Answering a Question</u></h2><br>
		<p style='margin-bottom:5px;'>1.To answer a question, do the following:</p><br>
		<p style='margin-bottom:5px;'> a.To select and save your answer, click on the button of one of the options.</p><p style='margin-bottom:5px;'> b.To deselect your selected option, select any of the other options.</p><p style='margin-bottom:5px;'> c.To delete your selected option, click on the <i style='color:blue;'>Clear Response</i> button.</p><p style='margin-bottom:5px;'> d.To mark the question for review, click on the <i style='color:orange'>Mark For Review</i> button.</p><p style='margin-bottom:5px;'> e.To unmark the question from review, click on the <i style='color:orange'>Unmark</i> button.</p><br>
		<p style='margin-bottom:5px;'>2.To change your answer to a question that has already been answered, first select that question for answering and then follow the procedure for answering that type of question.</p><br><br>
		<br><br>
		<input type="checkbox" id="agree"><b style="color:red;">  I have read and understood the instructions. All computer hardwares alloted to me are in proper working condition. I agree that I am not carrying any prohibited gadget like mobile phone,etc. / any prohibited material with me into the exam hall. I agree that in case of not adhering to the instructions, I will be disqualified from taking the exam.</b></input><br><br>
		<center><a onclick="return goToTest();" href="level3.php" style='text-decoration:none; color:white;' ><h3 id="confirm-redirect" >I am ready to start the test</h3></a></center>
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