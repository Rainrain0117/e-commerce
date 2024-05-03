<?php

$host = 'localhost';
$username = "root";
$password = "";
$database = "contacts";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){
    echo $con->connect_error;
}


if(isset($_POST['send'])){

    $name = $_POST['user'];
    $email = $_POST['email'];
    $prod = $_POST['product'];
    $feedback = $_POST['editorial'];

      $insert = "INSERT INTO `feedback`(`Name`, `Email`, `Product`, `Feedback`) 
			 VALUES ('$name', '$email' , '$prod' , '$feedback')";
                echo '<script>alert("Feedback successfully sent!")</script>';
                $con->query($insert) or die ($con->error);
    

}

?>
<!DOCTYPE html>
<main>
<head>
	<link rel="stylesheet" type="text/css" href="contactus.css">
	<title>Contact Us</title>
</head>
<body>
	<form method="POST">
		<div class="about">
			<h4>CONTACT US</h4>
			<hr>
            <div class="content">
                <div class="details">
                    <h2>Name:</h2><br>
                    <input type="text" name="user" placeholder="Name"><br>
                    <h2>Email:</h2><br>
                    <input type="text" name="email" placeholder="Email Address"><br>
                    <h2>Product/ISBN:</h2><br>
                    <input type="text" name="product" placeholder="Product Description"><br>
                    <h2>Concern/Reviews:<h2>
                    <input type="text" name="editorial" id="details" placeholder="Message..."><br>
                    
        </div>  
        </div>
			
		
		</div>
		<div class = "ok">
		<a href="#"><button type= "submit" name="send" id="send">SEND</button></a>
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
			
</body>
</main>