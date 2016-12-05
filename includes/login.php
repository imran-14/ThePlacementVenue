<?php
session_start();
include_once '../dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: ../member/login-home.php");
}
if(isset($_POST['btn-login']))
{
	$usn = mysql_real_escape_string($_POST['usn']);
	$upass = mysql_real_escape_string($_POST['pwd']);
	
	$res=mysql_query("SELECT * FROM users WHERE usn='$usn'");
	$row=mysql_fetch_array($res);
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['usn'];
		header("Location: ../member/login-home.php");
	}
	else
	{
		?>
        <script>alert('Incorrect details');</script>
        <?php
	}
	
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>The Placement Venue - Home</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic|Tangerine:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
	
	<header>
		<nav>
			<ul>
			<li><img src="../images/logo.png" id="logo" value="logo"></li>
			<li><a href="../home.php" id="homenav">Home</a></li>
			<li><a href="../services.php" id="servicesnav">Services</a></li>
			<li><a href="../companies.php" id="companiesnav">Companies</a></li>
			<li><a href="../client.php" id="clientnav">Client</a></li>
			<li><a href="../wtd.php" id="wtdnav">What to do</a></li>
			<li><a href="../contact.php" id="contactnav">Contact Us</a></li>	
		</ul>
		</nav>
	</header>
	<div id="container">
	
		<h1>Applicant Login</h1>
		<div id="loginBox">
			<form method="post" name="loginForm" action="" onsubmit="" id="form" class="form">
				USN/SRN
				<input type="text" name="usn" class="textField" id="username" placeholder="USN/SRN">
				Password
				<input type="password" name="pwd" class="textField" id="password" placeholder="Password">
				<input type="submit" Value="Login" class="loginButton" id="loginButton" name="btn-login">
			</form>
			<a href="register.php" id="not_yet_registered"><h4>Not yet registered?? Sign up</h4></a>
		</div>
	</div>
	
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
	
</body>
</html>