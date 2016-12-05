<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: ../member/login-home.php");
}
include_once '../dbconnect.php';


if(isset($_POST['btn-signup']))
{
	//$uname = mysql_real_escape_string($_POST['username']);
	$usn = mysql_real_escape_string($_POST['usn']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pwd1']));
	$upassconfirm = md5(mysql_real_escape_string($_POST['pwd2']));
	$ufname = mysql_real_escape_string($_POST['fname']);
	$ulname = mysql_real_escape_string($_POST['lname']);
	
	$ugender= $_POST['gender_select'];
	$umonth=date('n',strtotime($_POST['month']));
	$udob = $_POST['year'].'-'.$umonth.'-'.$_POST['day'];
	
	$uaddress = $_POST['door_no'].', '.$_POST['street'].', '.$_POST['locality'].', '.$_POST['city'].' - '.$_POST['pincode'].', '.$_POST['state'].', '.$_POST['country'].'.';
	$uphone_no = $_POST['ph-code'].$_POST['number'];
	
	$u10th_institution = mysql_real_escape_string($_POST['10th_institution']);
	$u10th_passyear = mysql_real_escape_string($_POST['10th_passyear']);
	$u10th_result = mysql_real_escape_string($_POST['10th_result']);
	
	$u12th_institution = mysql_real_escape_string($_POST['12th_institution']);
	$u12th_passyear = mysql_real_escape_string($_POST['12th_passyear']);
	$u12th_result = mysql_real_escape_string($_POST['12th_result']);
	
	$uug_degree = mysql_real_escape_string($_POST['ug_degree']);
	$uug_institution = mysql_real_escape_string($_POST['ug_institution']);
	$uug_passyear = mysql_real_escape_string($_POST['ug_passyear']);
	$uug_result = mysql_real_escape_string($_POST['ug_result']);
	
	$u10th_details = $u10th_institution .'-'. $u10th_passyear .'-'. $u10th_result;
	$u12th_details = $u12th_institution .'-'. $u12th_passyear .'-'. $u12th_result;
	$uug_details = $uug_degree .'-'. $uug_institution .'-'. $uug_passyear .'-'. $uug_result;
	
	$ucareer_interest1 = $_POST['career_pref1'];
	$ucareer_interest2 = $_POST['career_pref2'];
	$ucareer_interest3 = $_POST['career_pref3'];
	
	$uachievements = $_POST['achievements'];
	$uskills = $_POST['skills'];
	$upersinterests = $_POST['persinterests'];
	
	$folder1="users_photo/";
	$file_loc1 = $_FILES['photo']['tmp_name'];
	$file1 = explode(".", $_FILES['photo']['name']);
	$newfilename1 = $usn . '.' . end($file1);
	
	$folder2="users_signature/";
	$file_loc2 = $_FILES['sign']['tmp_name'];
	$file2 = explode(".", $_FILES['sign']['name']);
	$newfilename2 = $usn . '.' . end($file2);
	
	if($upass !== $upassconfirm)
	{
		?>
		<script>alert('passwords do not match');</script>
		<?php
	}
	
	else
	{
		
		if(move_uploaded_file($file_loc1,$folder1.$newfilename1) && move_uploaded_file($file_loc2,$folder2.$newfilename2))
		{
			if(mysql_query("INSERT INTO candidate('usn','f_name','l_name','email','password','dob','gender','phoneno','photo','sign') VALUES('$usn','$ufname','$ulname','$email','$upass','$udob','$ugender','$uphone_no','$newfilename1','$newfilename2')"))
			{
				?>
				<script>alert('successfully registered ');</script>
				<?php $_SESSION['user'] = $usn; ?>
				<script>window.location = "../member/login-home.php";</script>
				<?php
			}
			else
			{
				?>
				<script>alert('error while registering you...');</script>
				<?php
			}
			
		}
		else
		{
			?>
			<script>
			alert('error while uploading file');
			</script>
			<?php
		}
		
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>The Placement Venue - Home</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/register.css">
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
	<div class="formBox">
	<h1>Applicant Registration</h1><a href="login.php"><h4>Already Registered?? Sign In Here</h4></a><br>
	<marquee scrolldelay="0" scrollamount="10"><h2 style="color:red">Note : The details provided by you will be used by us to create your resume and store your details for future use.</h2></marquee>
	<form method="post" name="registerForm" id="form" class="form" enctype="multipart/form-data">
		<h3>Account Information</h3>
		<table>
			<tr>
				<td class="Aname">USN/SRN<span>*</span></td>
				<td><input type="text" name="usn" class="textField" id="usn" placeholder="USN/SRN" required></td>
			</tr>
			<tr>
				<td class="Aname">E-mail ID<span>*</span></td>
				<td><input type="email" name="email" class="textField" id="email" placeholder="Email ID" required></td>
			</tr>
			<tr>
				<td class="Aname">Password<span>*</span></td>
				<td><input type="password" name="pwd1" class="textField" id="password" placeholder="Password" required></td>
			</tr>
			<tr>
				<td class="Aname">Confirm Password<span>*</span></td>
				<td><input type="password" name="pwd2" class="textField" id="confirmPassword" placeholder="Confirm Password" required></td>
			</tr>
		</table>
		<h3>Personal Information</h3>
		<table>
			<tr>
				<td class="Aname">Applicant Photo<span>*</span></td>
				<td>
					<div id="appphoto"><canvas id="imageCanvas" style="width:150px;height:170px"></canvas>
						<input type="file" id="imageLoader" name="photo" accept="image/*" required/>
						<script>
						var imageLoader = document.getElementById('imageLoader');
							imageLoader.addEventListener('change', handleImage, false);
						var canvas = document.getElementById('imageCanvas');
						var ctx = canvas.getContext('2d');
						if(canvas.innerHTML == ""){
							ctx.font = "20px Segoe UI";
							ctx.fillStyle = "#a9a9a9";
							ctx.textAlign = "center";
							ctx.fillText("Upload your",150,40);
							ctx.fillText("recent",150,65); 
							ctx.fillText("passport size",150,90); 
							ctx.fillText("photograph",150,115); 
						}
						function handleImage(e){
							var reader = new FileReader();
							reader.onload = function(event){
								var img = new Image();
								img.onload = function(){
									canvas.width = img.width;
								   canvas.height = img.height;
								   ctx.drawImage(img,0,0);
							   }
								img.src = event.target.result;
							}
							reader.readAsDataURL(e.target.files[0]);     
						}
						</script>
					</div><br>
				</td>
			</tr>
			<tr>
				<td class="Aname">Name<span>*</span></td>
				<td><input name="fname" type="text" class="textField" id="name" placeholder="First Name" required><input name="lname" type="text" class="textField" id="name" placeholder="Last Name" required></td>
			</tr>
			<tr>
				<td class="Aname" >Gender<span>*</span></td>
				<td><input type="radio" name="gender_select" class="gender" value="Male" required> Male 
				<input type="radio" name="gender_select" class="gender" value="Female" required> Female</td>
			</tr>
			<tr>
				<td class="Aname">Date Of Birth<span>*</span></td>
				<td>
					<select name="day" required>
						<option>Day</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
					<select name="month" required>
						<option>Month</option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>
					<select name="year" required>
						<option>Year</option>
						<option>1990</option>
						<option>1991</option>
						<option>1992</option>
						<option>1993</option>
						<option>1994</option>
						<option>1995</option>
						<option>1996</option>
						<option>1997</option>
						<option>1998</option>
						<option>1999</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="Aname">Address<span>*</span></td>
				<td>
					<input type="text" class="textField" name="door_no" id="door" placeholder="Door No." required>
					<input type="text" class="textField" name="street" id="street" placeholder="Street" required>
					<input type="text" class="textField" name="locality" id="locality" placeholder="Locality" required><br>
					<input type="text" class="textField" name="city" id="city" placeholder="City" required>
					<input type="text" class="textField" name="state" id="state" placeholder="State" required>
					<input type="text" class="textField" name="country" id="country" placeholder="Country" required>
					<input type="text" class="textField" name="pincode" id="pincode" placeholder="Pincode" required>
				</td>
			</tr>
			<tr>
				<td class="Aname">Phone<span>*</span></td>
				<td>
					<input type="text" class="textField" name="ph-code" id="countrycode" placeholder="Code" required>
					<input type="text" class="textField" name="number" id="number" placeholder="Number" required>
				</td>
			</tr>
		</table>
		<h3>Educational Information</h3>
		<table>
			<tr colspan='2'>
				<td class="Aname">SSLC/SSC/Class 10th<span>*</span></td>
				<td>
					<input type="text" class="textField" name="10th_institution" id="institution" placeholder="Institution" required>
					<input type="text" class="textField" name="10th_passyear" id="passing" placeholder="Passing Year" required>
					<input type="text" class="textField" name="10th_result" id="result" placeholder="Result" required>
				</td>
			</tr>
			<tr colspan='2'>
				<td class="Aname">PUC/HSC/Class 12th<span>*</span></td>
				<td>
					<input type="text" class="textField" name="12th_institution" id="institution" placeholder="Institution" required>
					<input type="text" class="textField" name="12th_passyear" id="passing" placeholder="Passing Year" required>
					<input type="text" class="textField" name="12th_result" id="result" placeholder="Result" required>
				</td>
			</tr>
			<tr>
				<td class="Aname">Under Graduation<span>*</span></td>
				<td>
					<input type="text" class="textField" name="ug_degree" id="degree" placeholder="Degree" required>
					<input type="text" class="textField" name="ug_institution" id="institution" placeholder="Institution" required>
					<input type="text" class="textField" name="ug_passyear" id="passing" placeholder="Passing Year" required>
					<input type="text" class="textField" name="ug_result" id="result" placeholder="Result" required>
				</td>
			</tr>
		</table>
		<h3>Personal Profile</h3>
		<h5>Career Interests :</h5>
		<table>
			<tr>
				<td class="Aname">Please specify your career interests with their preference.<span>*</span></td>
				<td>
					<p>Preference 1 
					<select class="pref" name="career_pref1" required>
						<option>Web Developer</option>
						<option>Programmer</option>
						<option>Programming Analyst</option>
						<option>Software Architect</option>
						<option>Game Developer</option>
						<option>Animation</option>
						<option>Professional Hacker</option>
						<option>Project Manager</option>
						<option>Data Scientist</option>
					</select>
					</p>
					<p>Preference 2
					<select class="pref"  name="career_pref2" required>
						<option>Web Developer</option>
						<option>Programmer</option>
						<option>Programming Analyst</option>
						<option>Software Architect</option>
						<option>Game Developer</option>
						<option>Animation</option>
						<option>Professional Hacker</option>
						<option>Project Manager</option>
						<option>Data Scientist</option>
					</select>
					</p>
					<p>Preference 3 
					<select class="pref" name="career_pref3" required>
						<option>Web Developer</option>
						<option>Programmer</option>
						<option>Programming Analyst</option>
						<option>Software Architect</option>
						<option>Game Developer</option>
						<option>Animation</option>
						<option>Professional Hacker</option>
						<option>Project Manager</option>
						<option>Data Scientist</option>
					</select>
					</p>
				</td>
			</tr>
		</table>
		
		<!--<h5>Achievements :</h5>
		<table>
			<tr>
				<td class="Aname">Please provide details of any personal, educational, work, related acheivements.<span>*</span></td>
				<td>
					<textarea class="textField" id="intacheive" name="achievements" placeholder="Specify your acheivements" required></textarea>
				</td>
			</tr>
		</table>-->
		
		<h5>Skills:</h5>
		<table>
			<tr>
				<td class="Aname">Please select your skills.<span>*</span></td>
				<td>
					<input type="checkbox" id="diclaimer" name="1" class="disclaimer"> Java
					<input type="checkbox" id="diclaimer" name="2" class="disclaimer"> C
					<input type="checkbox" id="diclaimer" name="3" class="disclaimer"> CPP
					<input type="checkbox" id="diclaimer" name="4" class="disclaimer"> Python
					<input type="checkbox" id="diclaimer" name="5" class="disclaimer"> HTML
					<input type="checkbox" id="diclaimer" name="6" class="disclaimer"> CSS
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="checkbox" id="diclaimer" name="7" class="disclaimer"> Javascript
					<input type="checkbox" id="diclaimer" name="8" class="disclaimer"> PHP
					<input type="checkbox" id="diclaimer" name="9" class="disclaimer"> C#
					<input type="checkbox" id="diclaimer" name="10" class="disclaimer"> Ruby
					<input type="checkbox" id="diclaimer" name="11" class="disclaimer"> Objective-c
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="checkbox" id="diclaimer" name="12" class="disclaimer"> Perl
					<input type="checkbox" id="diclaimer" name="13" class="disclaimer"> Shell
					<input type="checkbox" id="diclaimer" name="14" class="disclaimer"> C#
					<input type="checkbox" id="diclaimer" name="15" class="disclaimer"> Ruby
					<input type="checkbox" id="diclaimer" name="16" class="disclaimer"> Objective-c
				</td>
			</tr>
		</table>
		
		<!--<h5>Personal Interests :</h5>
		<table>
			<tr>
				<td class="Aname">Please provide details of your sports, hobbies, cultural or other interests.<span>*</span></td>
				<td>
					<textarea class="textField" id="intpers" name="persinterests" placeholder="Specify your Personal Interests" required></textarea>
				</td>
			</tr>
		</table>-->
		
		<h3>Disclaimer & Signature</h3>
		<table>
			<tr>
				<td class="disc">
					<input type="checkbox" id="diclaimer1" class="disclaimer" required> I agree to all the terms and conditions of THE PLACEMENT VENUE.
				</td>
			</tr>
			<tr>
				<td class="disc">
					<input type="checkbox" id="diclaimer1" class="disclaimer" required> I Certify that all the above information provided by me is true and complete to the best of my knowledge.
				</td>
			</tr>
			<tr>
				<td class="disc">
					<input type="checkbox" id="diclaimer2" class="disclaimer" required> If I get placed through THE PLACEMENT VENUE, I understand that false  or misleading information in my aplication or interveiw may result in a release.
				</td>
			</tr>
			<tr>
				<td class="Aname">Signature<span>*</span>
				<div id="appsign"><canvas id="imageCanvas2" width="350px" height="50px" style="width:350px;height:50px"></canvas>
						<input type="file" id="imageLoader2" name="sign" accept="image/*" required/>
						<script>
						var imageLoader2 = document.getElementById('imageLoader2');
							imageLoader2.addEventListener('change', handleImage2, false);
						var canvas2 = document.getElementById('imageCanvas2');
						var ctx2 = canvas2.getContext('2d');
						if(canvas2.innerHTML == ""){
							ctx2.font = "15px Segoe UI";
							ctx2.fillStyle = "#a9a9a9";
							ctx2.fillText("Upload your signature here",35,25);
							}
						function handleImage2(e){
							var reader2 = new FileReader();
							reader2.onload = function(event){
								var img2 = new Image();
								img2.onload = function(){
									canvas2.width = img2.width;
								   canvas2.height = img2.height;
								   ctx2.drawImage(img2,0,0);
							   }
								img2.src = event.target.result;
							}
							reader2.readAsDataURL(e.target.files[0]);     
						}
						</script>
				</div><br>
			</td>
			</tr>
			<tr>
				<td class="Aname">Date<span>*</span><input type="date" class="textField" id="date" placeholder="Enter Date"></td>
			</tr>
		</table>
		
		<label><button type="submit" name="btn-signup" class="registerButton" id="registerButton">Register</button></label>
	</form>
	</div>
	</div>
	
	<footer>
		<p>&copy Copyright 2015 - The Placement Venue. All Rights Reserved | Developed by Ahmed Fouzan, Mohammed Imran & Manoj Koneri</p>
	</footer>
	
</body>
</html>