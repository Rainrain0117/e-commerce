<?php
    session_start();
     $host = 'localhost';
     $username = "id19316999_main_database";
     $password = "Q7(N>0f3u_7LW/a1";
     $database = "id19316999_main_db";
     
     $con = new mysqli($host, $username, $password, $database);
     
     if($con->connect_error){
         echo $con->connect_error;
     }

     if(isset($_POST['addproduct']))
     {
            $b_name = mysqli_escape_string($con, $_POST['bookname']);
            $b_price = mysqli_escape_string($con, $_POST['bookprice']);
            
            $imgFile = $_FILES['Image']['name'];
            $tmpdir = $_FILES['Image']['tmp_name'];
            $imgSize = $_FILES['Image']['size'];
            $bool = true;

            if($bool)
            {
                $upload_dir = 'uploads/';
                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

                $validext = array('jpeg', 'jpg', 'png');

                $mybook = rand(1000, 1000000).".".$imgExt;

                if(in_array($imgExt, $validext))
                {
                    if($imgSize < 5000000)
                    {
                        move_uploaded_file($tmpdir, $upload_dir.$mybook);
                    }
                    else if($imgSize > 5000000){
                        echo '<script>alert("File too large!");</script>';
                    }
                    else{
                        echo '<script>alert("Invalid File Extension!");</script>';
                    }

                    $insert = "INSERT INTO `books4sale`(`book_name`, `price`, `book_image`) VALUES
                                ('$b_name', '$b_price', '$mybook')";

                    try{
                        $insert_result = mysqli_query($con, $insert);

                        if($insert_result)
                        {
                            if (mysqli_affected_rows($con) > 0)
                            {
                                Print '<script>alert("Product added successfully!");</script>';
                                Print '<script>window.location.assign("prodman.php");</script>';
                            }
                            else{
                                echo '<script>alert("Data not inserted!");</script>';
                            }
                        }
                    }
                    catch (Exception $ex)
                    {
                        echo 'Error Insert'.$ex -> getMessage();
                    }
                    }
                }
            }


?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="addproduct.css">
	<title>Admin</title>
</head>
<div class="side">
    <h2>Welcome Bookkeeper!</h2><br><br><br>
    <div class="navbar">
        <a href="adminprofile.html">Admin Profile</a><br><br>
        <a href="accman.php">Account Management</a><br><br>
        <a href="prodman.php">Product Management</a><br><br>
        <a href="index.html">Logout</a><br><br>
    </div>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="content">
        <div class="details">
            <h2>Book Name:</h2><br>
            <input type="text" name="bookname" placeholder="Book Name or ISBN"><br>
            <h2>Price:</h2><br>
            <input type="text" name="bookprice" placeholder="Book Selling Price"><br>
            <h2>Product Details:</h2><br>
            <input type="text" name="bookdetails" id="details" placeholder="Short Description"><br>
            <h2>Image/Cover:<h2>
            <input type="file" name="Image" accept = "image/*"><br>
            By pressing "Add Product", I agree and comply to the rules of the company before proceeding.<br>
            <div class= "add">
            <button type= "submit" name="addproduct" id="add">Add Product</button>
</div>
        
</div>
</div>
</form>
		

		
			
</body>

