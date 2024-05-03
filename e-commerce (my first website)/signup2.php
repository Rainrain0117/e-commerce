<?php

$host = 'localhost';
$username = "id19316999_main_database";
$password = "Q7(N>0f3u_7LW/a1";
$database = "id19316999_main_db";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){
    echo $con->connect_error;
}


if(isset($_POST['submit'])){

    $uname = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['cpass'];
    $email = $_POST['email'];

    if ($_POST['password'] !== $_POST['cpass']) {
     echo '<script>alert("Password and Confirm Password must match!!")</script>';
     }else{
             $insert = "INSERT INTO `tblregistered_users`(`Username`, `Password`, `Confirm Password`, `Email`) VALUES
            ('$uname', '$password', '$confirm', '$email')";
                echo '<script>alert("Registered!")</script>';
                $con->query($insert) or die ($con->error);
    }

}
?>
<!DOCTYPE html>
<title>Signup Form</title>
<link rel="stylesheet" type="text/css" href="signup2.css">
<script src="https://kit.fontawesome.com/43f3a2a0ed.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

<main>
	<header>
	<head> 
		<h1>Books R' Us</h1>
	</head>
	<body>
	<ul class="navbar">
		<li><a href="index.html">Home     <i class="fa-solid fa-book"></i></a><br></li>
		<li><a href="contactus.php">Contact Us     <i class="fa-light fa-address-book"></i></a><br></li>
		<li><a href="AboutUS.html">About     <i class="fa-solid fa-globe"></i></i></a><br></li>
		<div class="dropdown">
  				Account
  					<div class="dropdown-content">
  					<a href="Login.php">Log In</a>
  					<a href="signup2.html">Register</a>
  					<a href="adminlogin.php">Admin</a>
  			</div>    <i class="fa-solid fa-user"></i></a><br></i>
	
  		</li>
</ul></div>
	</header>
</body>
<div class="whole">
<div class="reghere">
			<h2>REGISTRATION!</h2>
		</div>
<form action = "" method ="POST">
		<div class="name">
				<label>Username:</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="username" id="name"placeholder="Insert Username" required>
			<br><br>
				<label>Password: </label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="password" name="password" id="name"placeholder="Insert Password" required>
			<br><br>
				<label>Confirm Password:</label>
				<input type="password" name="cpass" id="name"placeholder="Re-enter Password" required>
			<br><br>
				<label>Email:</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;
				<input type="email" name="email" id="name"placeholder="Insert E-mail" required>
			<br><br>
		</div>
		
				<input type="checkbox" name="agreement" id="agreement" required><label> I agree to the following terms and conditions</label>
			<br><br>
			<div class="redirect">
				<a href="Login.php"><label>Already have an account?</label></a>
			</div><br>
			<div class="redirect2">
				<a href="Login.php"><input type="submit" name="submit" id="submit" value="Register"></a>
				
				<input type="reset" name="clear" id="submit" value="Clear">
			<h5>
				By clicking "Submit" you agree to the company's
			<a href="ppolicy.html"> Privacy policy</a> and
			<a href="tandc.html">Terms and Condition</a>
			</h5>
		</div>
</div>
</form>

<footer>
		<div class="foot">
			<h3>All rights reserved©</h3>
			<br>
			<hr>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="leftfooter">
			<h5>Social links</h5>
			<hr width="45%">
			<ul class="socmed">
				<li><i class="fa-brands fa-facebook"></i>    <a href="https://www.facebook.com/jmshahata17/">Facebook</a></li>
				<li><i class="fa-brands fa-twitter"></i>    <a href="https://twitter.com/majeeeeeed_">Twitter</a></li>
				<li><i class="fa-solid fa-envelope"></i>    <a href="https://ph.yahoo.com/?p=us">Email</a></li>
		</div>
		<div class="midfooter">
			<h5>Location</h5>
			<hr width="40%">
			<ul class="loc">
				<p>6650 Franklin Ave Los Angeles, California, United States</p><br>
				<p>© Books R' Us 1986. All rights Reserved. All trademarks are property of their respective owners in the US and other countries.
				VAT included in all prices where applicable.</p>
		</div>
		<div class="rightfooter">
			<h5>Support</h5>
			<hr width="35%">
			<ul class="supp">
				<p>Contact Support:(+63) 912-345-6789</p>
				<p>Designed by: Books R' Us Development Team</p>
		</div>
	</footer>

