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

?>


<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/disclaimer.css">
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
				<li><a href="my-tests.php">My Tests</a></li>
				<li><a href="my-placements.php">My Placements</a></li>
				<li><a href="disclaimer.php"  id="disclaimer">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-head">
				<img src="member-img/disclaimer.png" id="content-head-icon" ></a>Disclaimer
			</div>
			<div id="content-body">
				<h3 class="disclaimer_content_head">Disclaimer</h3>
				<p class="disclaimer_content">The Company shall not be liable for any loss of information howsoever caused whether as a result of any interruption, suspension, or termination of the Service or otherwise, or for the contents, accuracy or quality of information available, received or transmitted through the Service.<br><br>The Member shall be solely responsible, and the Company shall not be liable in any manner whatsoever, for ensuring that in using the Service, all applicable laws, rules and regulations for the use of systems, service or equipment shall be at all times complied with.<br><br>The Company makes no representations and warranties of any kind, whether expressed or implied, for the Services and in relation to the accuracy or quality of any information transmitted or obtained through the Services of ThePlacementVenue.<br><br></p>
				<h3 class="disclaimer_content_head">Use of Data</h3>
				<p class="disclaimer_content">The Member hereby agrees and irrevocably authorizes the Company to: <br>Use any data and information supplied by the Member in connection with this Agreement for the Company's own purpose, to the company supplying such data and information to any other associated companies or selected third parties including search engines.<br><br>Use any data furnished by the Member in order to float offers or send mails regarding specific services and such mails may not been proclaimed or deemed to be unsolicited communique. Allow all data and information supplied by the Member in using the Service to remain at PlacementIndia.com for the use of the Company in accordance with service agreement with the Member, notwithstanding the termination or suspension of the Service to the Member herein. Unless the Member informs the Company to delete all such data and information following the termination or suspension of the Service to the Member, such data and information remain in the Company's property, records and databases.</p>
				<h3 class="disclaimer_content_head">Variation</h3>
				<p class="disclaimer_content">The Company reserves the right to amend the terms and conditions contained herein and in the Services Guide at any time upon notice (in such form as may be determined by the Company) to the Member. The Terms and Conditions of this agreement will be updated from time to time and posted at PlacementIndia.com. The Member should visit the site periodically to review the Terms and Conditions. For the avoidance of doubt, the Member's continued use of the Service constitutes an affirmation and acknowledgement of the amended terms and conditions.</p>
				<h3 class="disclaimer_content_head">Privacy</h3>
				<p class="disclaimer_content">Our Privacy Policy governs use of the ThePlacementVenue site and services</p>
			</div>
		</div>
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
</body>
</html>