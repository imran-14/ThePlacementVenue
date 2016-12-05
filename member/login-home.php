<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: ../home.php");
}
	$user=$_SESSION['user'];
	$res=mysql_query("SELECT * FROM `users` WHERE `usn`='$user'");
	$userRow=mysql_fetch_array($res);
	
	if($userRow['test_level1']=="Not yet taken")	
		$level1_score = $userRow['test_level1'];
	else{
		$score1 = explode('-',$userRow['test_level1']);
		$level1_score = $score1[2];
	}
	
	if($userRow['test_level2']=="Not yet taken")	
		$level2_score = $userRow['test_level2'];
	else{
		$score2 = explode('-',$userRow['test_level2']);
		$level2_score = $score2[2];
	}
	
	if($userRow['test_level3']=="Not yet taken")	
		$level3_score = $userRow['test_level3'];
	else{
		$score3 = explode('-',$userRow['test_level3']);
		$level3_score = $score3[2];
	}
?>

<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/login-home.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"></head>
<body>
	<header>
		<div id="logotext">
			<span>THE PLACEMENT VENUE</span> - User Account
		</div>
		<div id="hey-user">
			Hey <span><?php echo $userRow['first_name']." ".$userRow['last_name']; ?></span> !!</p>
		</div>
		<div id="logout">
			<a href="../logout.php?logout"><img src="../images/logout.png"><p>Logout</p></a>
		</div>
	</header>
	<div id="container">
		<div id="sidebar">
			<ul id="nav">
				<li><a href="login-home.php" id="dashboard">Dashboard</a></li>
				<li><a href="account-details.php">Account Details</a></li>
				<li><a href="my-resume.php">My Resume</a></li>
				<li><a href="my-tests.php">My Tests</a></li>
				<li><a href="my-placements.php">My Placements</a></li>
				<li><a href="disclaimer.php">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-head">
				<img src="member-img/dashboard.png" id="content-head-icon" ></a>Dashboard
			</div>
			<div id="content-body">
				<div class="content-body-item">
					<div class="content-body-item-head">User</div>
					<img id="user-photo" src="../includes/users_photo/<?php echo $userRow['photo']; ?>"/>
					<div class=""><?php echo $userRow['first_name']." ".$userRow['last_name']; ?></div>
					<div class=""><?php echo $userRow['usn']; ?></div>
					
					<div class="career-interest">
						<p class="career-interest">Career Interests :</p>
						<ul class="career-interest-list" type="circle">
							<li class="career-interest-info"><?php echo $userRow['careerinterest_1']; ?></li>
							<li class="career-interest-info"><?php echo $userRow['careerinterest_2']; ?></li>
							<li class="career-interest-info"><?php echo $userRow['careerinterest_3']; ?></li>
						</ul>
					</div>
				</div>
				<div class="content-body-item">
					<div class="content-body-item-head">Test Statistics</div>
					<p style="display:none" id="level1"><?php echo $level1_score ?></p>
					<p style="display:none" id="level2"><?php echo $level2_score ?></p>
					<p style="display:none" id="level3"><?php echo $level3_score ?></p>
					<canvas id="test-statistics"></canvas>
					<script type="text/javascript">
						var canvas = document.getElementById('test-statistics');
						var ctx = canvas.getContext('2d');
						
						ctx.moveTo(30,10);
						ctx.lineTo(30,120);
						ctx.stroke();
						
						ctx.moveTo(30,120);
						ctx.lineTo(270,120);
						ctx.stroke();
						
						var level1 = document.getElementById('level1').innerHTML;
						var level2 = document.getElementById('level2').innerHTML;
						var level3 = document.getElementById('level3').innerHTML;
						
						if(level1 == "Not yet taken"){
							ctx.fillStyle="red";
							ctx.fillText("Not",60,85);
							ctx.fillText("yet",62,97);
							ctx.fillText("taken",58,110);
						}
						else{
							ctx.fillStyle="#3eb489";
							ctx.fillRect(50,119,45,-(level1 * 5));//level 1
						}
						
						if(level2 == "Not yet taken"){
							ctx.fillStyle="red";
							ctx.fillText("Not",134,85);
							ctx.fillText("yet",135,97);
							ctx.fillText("taken",130,110);
						}
						else{
							ctx.fillStyle="#3eb489";
							ctx.fillRect(120,119,45,-(level2 * 5));//level 2
						}
						
						if(level3 == "Not yet taken"){
							ctx.fillStyle="red";
							ctx.fillText("Not",203,85);
							ctx.fillText("yet",203,97);
							ctx.fillText("taken",198,110);
						}
						else{
							ctx.fillStyle="#3eb489";
							ctx.fillRect(190,119,45,-(level3 * 5));//level 3
						}
						ctx.font = "bold 8px Arial";
						
						ctx.fillStyle="#36454f";
						ctx.fillText("Score",18,8);
						
						var y = 125;
						for(var i=0; i<5; i++){
							ctx.fillText(i*5,18,y);
							y-=25;
						}
						
						ctx.fillText("Level 1",60,130);
						ctx.fillText("Level 2",130,130);
						ctx.fillText("Level 3",200,130);
					</script>
					<a id="more-details" href="my-tests.php">More Details</a>
				</div>
				<div class="content-body-item">
					<div class="content-body-item-head">Contact Us</div>
					<p class="contact-us">If you have any queries regarding the placements:<div class="contact-email">info@theplacementvenue.com</div>or if you face any problem to login, in the tests send a mail to  <br><div class="contact-email">support@theplacementvenue.com</div>To speak with our executives, dial our toll-free no. :<div class="contact-email">1800-4365-4201</div></p>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
</body>
</html>