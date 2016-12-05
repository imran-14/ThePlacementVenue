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
	
	$u10thstd_details = explode("-",$userRow['10std_details']);
	$u12thstd_details = explode("-",$userRow['12std_details']);
	$uug_details = explode("-",$userRow['ug_details']);
?>

<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/my-resume.css">
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
				<li><a href="my-resume.php" id="myResume">My Resume</a></li>
				<li><a href="my-tests.php">My Tests</a></li>
				<li><a href="my-placements.php">My Placements</a></li>
				<li><a href="disclaimer.php">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content" name="content">
			<div id="content-head">
				<img src="member-img/resume.png" id="content-head-icon" ></a>My Resume
			</div>
			<div id="content-body">
				<h3 class="info-head">Personal Information</h3>
				<div id="user-photo-and-sign">
					<img id="user-photo" src="../includes/users_photo/<?php echo $userRow['photo']; ?>"/>
					<img id="user-sign" src="../includes/users_signature/<?php echo $userRow['sign']; ?>"/>
				</div>
				<table>
					<tr>
						<td class="labels">Name :</td>
						<td><?php echo $userRow['first_name']." ".$userRow['last_name']; ?></td>
					</tr>
					<tr>
						<td class="labels">USN :</td>
						<td><?php echo $userRow['usn']; ?></td>
					</tr>
					<tr>
						<td class="labels">Date Of Birth :</td>
						<td><?php echo $userRow['dob']; ?></td>
					</tr>
					<tr>
						<td class="labels">Gender :</td>
						<td><?php echo $userRow['gender']; ?></td>
					</tr>
					<tr>
						<td class="labels">Address :</td>
						<td><?php echo $userRow['address']; ?></td>
					</tr>
					<tr>
						<td class="labels">Phone :</td>
						<td><?php echo $userRow['phone_no']; ?></td>
					</tr>
					<tr>
						<td class="labels">Email :</td>
						<td><?php echo $userRow['email']; ?></td>
					</tr>
				</table>
				
				<h3 class="info-head">Educational Information</h3>
				<table id="edu-info">
					<thead>
						<td class="labels">Course</td>
						<td class="labels">Institution</td>
						<td class="labels">Passing Year</td>
						<td class="labels">Result</td>
					</thead>
					<tr>
						<td class="labels">SSLC/SSC/Class 10th</td>
						<td><?php echo $u10thstd_details[0]; ?></td>
						<td><?php echo $u10thstd_details[1]; ?></td>
						<td><?php echo $u10thstd_details[2]; ?></td>
					</tr>
					<tr>
						<td class="labels">PUC/HSC/Class 12th</td>
						<td><?php echo $u12thstd_details[0]; ?></td>
						<td><?php echo $u12thstd_details[1]; ?></td>
						<td><?php echo $u12thstd_details[2]; ?></td>
					</tr>
					<tr>
						<td class="labels">Under Graduation (<?php echo $uug_details[0] ?>)</td>
						<td><?php echo $uug_details[1]; ?></td>
						<td><?php echo $uug_details[2]; ?></td>
						<td><?php echo $uug_details[3]; ?></td>
					</tr>
				</table>
				
				<h3 class="info-head">Personal Profile</h3>
				<table>
					<tr>
						<td class="labels">Career Interests :</td>
						<td>
							<ul type="circle">
								<li><?php echo $userRow['careerinterest_1']; ?></li>
								<li><?php echo $userRow['careerinterest_2']; ?></li>
								<li><?php echo $userRow['careerinterest_3']; ?></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td class="labels">Skills & Training :</td>
						<td><?php echo $userRow['skillsNtraining']; ?></td>
					</tr>
					<tr>
						<td class="labels">Achievements :</td>
						<td><?php echo $userRow['achievements']; ?></td>
					</tr>
					<tr>
						<td class="labels">Personal Interests :</td>
						<td><?php echo $userRow['personal_interests']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
</body>
</html>