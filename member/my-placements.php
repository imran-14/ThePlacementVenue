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
	
	if($userRow['test_level1']=="Not yet taken"){	
		$level1_score = $userRow['test_level1'];
		$level1_qualified = "NotQualified";
	}
	else{
		$score1 = explode('-',$userRow['test_level1']);
		$level1_score = $score1[2];
		$level1_qualified = $score1[1];
	}
	
	if($userRow['test_level2']=="Not yet taken"){	
		$level2_score = $userRow['test_level2'];
		$level2_qualified = "NotQualified";
	}
	else{
		$score2 = explode('-',$userRow['test_level2']);
		$level2_score = $score2[2];
		$level2_qualified = $score2[1];
	}
	
	if($userRow['test_level3']=="Not yet taken"){	
		$level3_score = $userRow['test_level3'];
		$level3_qualified = "NotQualified";
	}
	else{
		$score3 = explode('-',$userRow['test_level3']);
		$level3_score = $score3[2];
		$level3_qualified = $score3[1];
	}
?>


<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/my-placements.css">
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
				<li><a href="my-placements.php" id="myPlacements">My Placements</a></li>
				<li><a href="disclaimer.php">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-head">
				<img src="member-img/placement.png" id="content-head-icon" ></a>My Placements
			</div>
			<div id="content-body">
				<p id="placement-status" style="width:100%; padding:20px;font-size:25px;text-align:left;"></p>
				<div class="Tier_2_companies" style="display:none" id="tier2">
					<img src="../images/company/wipro.jpg" class="images_companies">
					<img src="../images/company/redhat.png"  class="images_companies">
					<img src="../images/company/accenture.png"  class="images_companies">
					<img src="../images/company/codenation.png"  class="images_companies">
					<img src="../images/company/emc2.png"  class="images_companies">
					<img src="../images/company/infosys.png"  class="images_companies">
					<img src="../images/company/mindtree.jpg"  class="images_companies">
					<img src="../images/company/pinterest.png"  class="images_companies">
					<img src="../images/company/symantec.png"  class="images_companies">
					<img src="../images/company/sap.png"  class="images_companies">
					<img src="../images/company/siemens.png"  class="images_companies">
					<img src="../images/company/netapp.png"  class="images_companies">
				</div>
				<div class="Tier_1_companies" id="tier1" style="display:none">
					<br><br>
					<h1 style="text-align:left;margin-left:30px;">Tier 1 Companies</h1>
					<img src="../images/company/google.png"  class="images_companies">
					<img src="../images/company/flipkart.png"  class="images_companies">
					<img src="../images/company/facebook.png"  class="images_companies">
					<img src="../images/company/intel.png"  class="images_companies">
					<img src="../images/company/lenovo.png"  class="images_companies">
					<img src="../images/company/hp.png"  class="images_companies">
					<img src="../images/company/dell.png"  class="images_companies">
					<img src="../images/company/microsoft.png"  class="images_companies">
					<img src="../images/company/twitter.png"  class="images_companies">
					<img src="../images/company/oracle.jpg"  class="images_companies">
					<img src="../images/company/adobe.png"  class="images_companies">
					<br><br><br>
					<h1 style="text-align:left; margin-left:30px;">Tier 2 Compaies</h1>
					<img src="../images/company/wipro.jpg" class="images_companies">
					<img src="../images/company/redhat.png"  class="images_companies">
					<img src="../images/company/accenture.png"  class="images_companies">
					<img src="../images/company/codenation.png"  class="images_companies">
					<img src="../images/company/emc2.png"  class="images_companies">
					<img src="../images/company/infosys.png"  class="images_companies">
					<img src="../images/company/mindtree.jpg"  class="images_companies">
					<img src="../images/company/pinterest.png"  class="images_companies">
					<img src="../images/company/symantec.png"  class="images_companies">
					<img src="../images/company/sap.png"  class="images_companies">
					<img src="../images/company/siemens.png"  class="images_companies">
					<img src="../images/company/netapp.png"  class="images_companies">
				</div>
				<script>
					var SSLCmarks = parseInt("<?php echo $u10thstd_details[2]; ?>");
					var PUmarks = parseInt("<?php echo $u12thstd_details[2]; ?>");
					var degreemarks = parseInt("<?php echo $uug_details[3]; ?>");
					
					var level1 = "<?php echo $level1_score; ?>";
					var level1_q = "<?php echo $level1_qualified;?>";
					var level2 = "<?php echo $level2_score; ?>";
					var level2_q = "<?php echo $level2_qualified; ?>";
					var level3 = "<?php echo $level3_score; ?>";
					var level3_q = "<?php echo $level3_qualified; ?>";
					
					
					
					if(level1 == "Not yet taken"){
						document.getElementById("placement-status").innerHTML = "You need to attempt tests";
					}
					else if(level1_q == "NotQualified"){
						document.getElementById("placement-status").innerHTML = "Sorry! You are not qualified for placements";
					}
					else if(level1_q == "Qualified"){
						document.getElementById("placement-status").innerHTML = "You haven't attempted Level2 & 3";
						
					}
					
					if(level2 == "Not yet taken" && level1_q == "Qualified"){
						document.getElementById("placement-status").innerHTML = "You need to attempt test LEVEL 2";
					}
					else if(level2_q == "NotQualified"){
						document.getElementById("placement-status").innerHTML = "Sorry! You are not qualified for placements";
					}
					else if(level2_q == "Qualified"){
						document.getElementById("placement-status").innerHTML = "Congratulations! You have qualified for Tier-2 Companies.";
						document.getElementById("tier2").style.display="block";
						
					}
					
					if(level3 == "Not yet taken" && level2_q == "Qualified"){
						document.getElementById("placement-status").innerHTML = "Congratulations! You have qualified for Tier-2 Companies. You can also attempt Level 3 for Tier-1 Companies.";
						document.getElementById("tier2").style.display="block";
					}
					else if(level3_q == "NotQualified"){
						document.getElementById("placement-status").innerHTML = "Congratulations! You have qualified for Tier-2 Companies. You will be Sheduled an interview by the recruiters of the following companies.";
						document.getElementById("tier2").style.display="block";
					}
					else if(level3_q == "Qualified"){
						document.getElementById("placement-status").innerHTML = "Congratulations! You have qualified for Tier-1 Companies. You will be Sheduled an interview by the recruiters of the following companies.";
						document.getElementById("tier1").style.display="block";
					}
					
					
					
				</script>
			</div>
		</div>
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
</body>
</html>