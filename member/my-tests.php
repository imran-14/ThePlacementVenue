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
	
	if($userRow['test_level1']=="Not yet taken"){	
		$level1 = "true";
	}
	else{
		$level1 = "false";
		$score1 = explode('-',$userRow['test_level1']);
		$level1_qualified = $score1[1];
	}
	
	
	if($userRow['test_level2']=="Not yet taken"){	
		$level2 = "true";
	}
	else{
		$level2 = "false";
		$score2 = explode('-',$userRow['test_level2']);
		$level2_qualified = $score2[1];
	}
	
	
	if($userRow['test_level3']=="Not yet taken"){	
		$level3 = "true";
	}
	else{
		$level3 = "false";
		$score3 = explode('-',$userRow['test_level3']);
		$level3_qualified = $score3[1];
	}
?>

<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/my-tests.css">
	<link type="text/css" rel="stylesheet" href="member-css/box-flip.css">
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
				<li><a href="login-home.php">Dashboard</a></li>
				<li><a href="account-details.php">Account Details</a></li>
				<li><a href="my-resume.php">My Resume</a></li>
				<li><a href="my-tests.php" id="myTests">My Tests</a></li>
				<li><a href="my-placements.php">My Placements</a></li>
				<li><a href="disclaimer.php">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-head">
				<img src="member-img/tests.png" id="content-head-icon" ></a>My Tests
			</div>
			<div id="content-body">
				<div class="game-box" id="item-1">
					<div class = "game-icon" id="game-icon-1">
						<h1>Level 1</h1>
						<h3>IQ and Logical Reasoning Test</h3><br><br>
						<img src="member-img/iq.png"><br><br>
						<h3>Test summary</h3>
						<p><?php echo $userRow['test_level1']; ?></p>
					</div>
					<div class = "game-instructions">
						<div class="game-instructions-box" id="game-instructions-1">
							<p>Instructions</p>
							<ul type="square" class="instructions-ul">
								<li><b>This round is basically logic and IQ testing round.</b></li>
								<li>This round contains a few games and logic questions which are to be attempted.</li>
								<li>Each game is graded out of 4 marks and each logic question weighs 1 mark.</li>
								<li>Time alloted for the test is 30 mins.</li>
								<li>The exam can be taken only once and no reasons will be entertained later.</li>
								<li>Qualification to the next round solely depends on this round.</li>
								<li>More detailed instructions will be given when you begin the test.</li>
							</ul>
							<a href="exam/instructions1.php" class="start-game-button" id="level-1">Start Test</a>
						</div>
					</div>
				</div>
				<div class="game-box" id="item-2" >
					<div class = "game-icon" id="game-icon-2">
						<h1>Level 2</h1>
						<h3>Technical Skills Test - 1</h3><br><br>
						<img src="member-img/technical_skills1.png"><br><br>
						<h3>Test summary</h3>
						<p><?php echo $userRow['test_level2']; ?></p>
					</div>
					<div class = "game-instructions" id="game-instructions-2">
						<div class="game-instructions-box" >
							<p>Instructions</p>
							<ul type="square" class="instructions-ul">
								<li><b>This round is the technical skills test.</b></li>
								<li>This test contains 20 technical questions which are to be attempted.</li>
								<li>Each question weighs 1 mark.</li>
								<li>Time alloted for the test is 1 hour(60 minutes).</li>
								<li>The exam can be taken only once and no reasons will be entertained later.</li>
								<li>Qualification to the next round depends on this round and the previous round.</li>
								<li>More detailed instructions will be given when you begin the test.</li>
							</ul>
							<a href="exam/instructions2.php" class="start-game-button" id="level-2">Start Test</a>
						</div>
					</div>
				</div>
				<div class="game-box" id="item-3" >
					<div class = "game-icon" id="game-icon-3">
						<h1>Level 3</h1>
						<h3>Technical Skills Test - 2</h3><br><br>
						<img src="member-img/technical_skills2.png"><br><br>
						<h3>Test summary</h3>
						<p><?php echo $userRow['test_level3']; ?></p>
						
					</div>
					<div class = "game-instructions" id="game-instructions-3">
						<div class="game-instructions-box" >
							<p>Instructions</p>
							<ul type="square" class="instructions-ul">
								<li><b>This round is the technical skills test.</b></li>
								<li>This test contains 20 technical questions which are to be attempted.</li>
								<li>Each question weighs 1 mark.</li>
								<li>Time alloted for the test is 1 hour(60 minutes).</li>
								<li>The exam can be taken only once and no reasons will be entertained later.</li>
								<li>More detailed instructions will be given when you begin the test.</li>
							</ul>
							<a href="exam/instructions3.php" class="start-game-button" id="level-3">Start Test</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
				<p style="display:none" id="1"><?php echo $level1_qualified; ?></p>
				<p style="display:none" id="2"><?php echo $level2_qualified; ?></p>
				<p style="display:none" id="3"><?php echo $level3_qualified; ?></p>
				<script>
					var level1 = "<?php echo $level1; ?>";
					var level2 = "<?php echo $level2; ?>";
					var level3 = "<?php echo $level3; ?>";

					var level1_qualified = document.getElementById("1").innerHTML;
					var level2_qualified = document.getElementById("2").innerHTML;
					var level3_qualified = document.getElementById("3").innerHTML;
					
					if(level1 == "true"){
						document.getElementsByClassName("game-box")[0].id = "game-box";
						document.getElementsByClassName("game-box")[1].style.cssText = "opacity:0.6;";
						document.getElementsByClassName("game-box")[2].style.cssText = "opacity:0.6;";
					}else if(level2 == "true"){
							if( level1_qualified=="Qualified"){
								document.getElementsByClassName("game-box")[1].id = "game-box";
								document.getElementsByClassName("game-box")[0].style.cssText = "opacity:0.6;";
								document.getElementsByClassName("game-box")[2].style.cssText = "opacity:0.6;";
							}else{
								document.getElementsByClassName("game-box")[0].style.cssText = "opacity:0.6;";
								document.getElementsByClassName("game-box")[1].style.cssText = "opacity:0.6;";
								document.getElementsByClassName("game-box")[2].style.cssText = "opacity:0.6;";
							}
					}else if(level3 == "true"){
						if(level2_qualified=="Qualified"){
							document.getElementsByClassName("game-box")[2].id = "game-box";
							document.getElementsByClassName("game-box")[0].style.cssText = "opacity:0.6;";
							document.getElementsByClassName("game-box")[1].style.cssText = "opacity:0.6;";
						}
						else{
								document.getElementsByClassName("game-box")[0].style.cssText = "opacity:0.6;";
								document.getElementsByClassName("game-box")[1].style.cssText = "opacity:0.6;";
								document.getElementsByClassName("game-box")[2].style.cssText = "opacity:0.6;";
						}
					}else{
						document.getElementsByClassName("game-box")[0].style.cssText = "opacity:0.6;";
						document.getElementsByClassName("game-box")[1].style.cssText = "opacity:0.6;";
						document.getElementsByClassName("game-box")[2].style.cssText = "opacity:0.6;";
					}
				</script>
</body>
</html>