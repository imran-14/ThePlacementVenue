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
	
if(isset($_POST['btn-change']))
{
	$currpass = md5(mysql_real_escape_string($_POST['current_pwd']));
	$newpass = md5(mysql_real_escape_string($_POST['new_pwd']));
	$newpassconfirm = md5(mysql_real_escape_string($_POST['confirm_new_pwd']));
	
	
	if($userRow['password']==$currpass)
	{
		if($newpass == $newpassconfirm){
			mysql_query("UPDATE `users` SET `password` = '$newpass' WHERE `usn` = '$user'");
			?>
			<script>alert('Password changed successfully');</script>
			<?php
		}
		else{
			?>
			<script>alert('New passwords do not match');</script>
			<?php
		}
	}
	else
	{
		?>
        <script>alert('Your current password entered is incorrect');</script>
        <?php
	}
	
}

?>

<html>
<head>
	<title>Dashboard - The Placement Venue</title>
	<link rel="shortcut icon" href="../images/favicon1.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon1.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="member-css/login-main.css">
	<link type="text/css" rel="stylesheet" href="member-css/account-details.css">
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
				<li><a href="account-details.php" id="accountDetails">Account Details</a></li>
				<li><a href="my-resume.php">My Resume</a></li>
				<li><a href="my-tests.php">My Tests</a></li>
				<li><a href="my-placements.php">My Placements</a></li>
				<li><a href="disclaimer.php">Disclaimer</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-head">
				<img src="member-img/details.png" id="content-head-icon" ></a>Account Details
			</div>
			<div id="content-body">
				<div id="user-photo-and-sign">
					<img id="user-photo" src="../includes/users_photo/<?php echo $userRow['photo']; ?>"/>
					<img id="user-sign" src="../includes/users_signature/<?php echo $userRow['sign']; ?>"/>
				</div>
				<table>
					<tr>
						<td class="labels">Name</td>
						<td><?php echo $userRow['first_name']." ".$userRow['last_name']; ?></td>
					</tr>
					<tr>
						<td class="labels">USN</td>
						<td><?php echo $userRow['usn']; ?></td>
					</tr>
					<tr>
						<td class="labels">Email-id</td>
						<td><?php echo $userRow['email']; ?></td>
					</tr>
				</table>
				<div id="chgP" style="display:none">
					<h5 id="chgPassHead">Change Password</h5>
					<form method="post" action="">
					<input type = "password" name = "current_pwd" class="pass" id="currentpwd" placeholder = "Current Password" required>
					<input type = "password" name = "new_pwd" class="pass" placeholder = "New Password" required>
					<input type = "password" name = "confirm_new_pwd" class="pass" placeholder = "Confirm New Password" required>
					<input type = "submit" name = "btn-change" class="chgbutton" value="Change">
					</form>
					<button id="cancel" class="chgbutton" onclick="cancel()">Cancel</button>
				</div>
				<button id="chgPass" class="chgbutton" onclick="changePass()">Change Password</button>
			</div>
		</div>
	</div>
	<script>
		function changePass(){
			document.getElementById("chgP").style.display = "";
			document.getElementById("chgPass").style.display = "none";
		}
		function cancel(){
			document.getElementById("chgP").style.display = "none";
			document.getElementById("chgPass").style.display = "";
		}
	</script>
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
</body>
</html>