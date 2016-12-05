<!DOCTYPE html>
<html>

<head>
	<title>The Placement Venue - Home</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/companies.css">
	<link rel="shortcut icon" href="images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon1.ico" type="image/x-icon">
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic|Tangerine:400,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/companies.js"></script>
</head>

<body id="companies">
	
	<header>
		<nav>
			<ul>
				<li><img src="images/logo.png" id="logo" value="logo"></li>
				<li><a href="home.php" id="homenav">Home</a></li>
				<li><a href="services.php" id="servicesnav">Services</a></li>
				<li><a href="companies.php" id="companiesnav" class="activeNav">Companies</a></li>
				<li><a href="client.php" id="clientnav">Client</a></li>
				<li><a href="wtd.php" id="wtdnav">What to do</a></li>
				<li><a href="contact.php" id="contactnav">Contact Us</a></li>	
			</ul>
		</nav>
	</header>
	
	<div id="container">
		<h1>Companies</h1>
		<table>
			<tr>
				<td><a href="#" onclick='more_info("microsoft");' id="microsoft"><img src="images/company/microsoft.png" class="compImg"></a></td>		
				<td><a href="#" onclick='more_info("google");' id='google'><img src="images/company/google.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("facebook");' id="facebook"><img src="images/company/facebook.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("oracle");' id="oracle"><img src="images/company/oracle.jpg" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("twitter");' id="twitter"><img src="images/company/twitter.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("accenture");' id="accenture"><img src="images/company/accenture.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("intel");' id="intel"><img src="images/company/intel.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("infosys");' id="infosys"><img src="images/company/infosys.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("flipkart");' id="flipkart"><img src="images/company/flipkart.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("codenation");' id="codenation"><img src="images/company/codenation.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("redhat");' id="redhat"><img src="images/company/redhat.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("wipro");' id="wipro"><img src="images/company/wipro.jpg" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("ibm");' id="ibm"><img src="images/company/ibm.jpg" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("mindtree");' id="mindtree"><img src="images/company/mindtree.jpg" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("adobe");' id="adobe"><img src="images/company/adobe.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("dell");' id="dell"><img src="images/company/dell.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("sap");' id="sap"><img src="images/company/sap.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("emc2");' id="emc2"><img src="images/company/emc2.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("lenovo");' id="lenovo"><img src="images/company/lenovo.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("netapp");' id="netapp"><img src="images/company/netapp.png" class="compImg"></a></td>
				<td><a href="#" onclick='more_info("siemens");' id="siemens"><img src="images/company/siemens.png" class="compImg"></a></td>
			</tr>
			<tr>
				<td><a href="#" onclick='more_info("symantec");' id="symantec"><img src="images/company/symantec.png" class="compImg"></a></td>
			</tr>
		</table>
	</div>
	<div id="more" style="display:none;">
	</div>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
	
</body>
</html>