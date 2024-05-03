<!DOCTYPE html>
<title>Admin</title>
<script src="https://kit.fontawesome.com/43f3a2a0ed.js" crossorigin="anonymous"></script>

<head>
	<link rel="stylesheet" type="text/css" href="alt_prod.css">
	<title>Admin</title>
</head>
<body>
<div class="side">
    <h2>Welcome Bookkeeper!</h2><br><br><br>
    <div class="navbar">
        <a href="adminprofile.html">Admin Profile</a><br><br>
        <a href="accman.php">Account Management</a><br><br>
        <a href="prodman.php">Product Management</a><br><br>
        <a href="index.html">Logout</a><br><br>
    </div>
</div>


    <div class="content">
        <div class="details">
            
            <h4>List of Products for Sale</h4>
            <br>
            <div class= "add">
        <a href ="addproduct.php"><button name= "add" id="add"><i class="fa-solid fa-plus"></i>Add Product</button></a>
    </div>
<form method = "POST" enctype= "multipart/form-data">
<?php 

     $host = 'localhost';
     $username = "root";
     $password = "";
     $database = "book_products";
     
     $con = new mysqli($host, $username, $password, $database);
     
     if($con->connect_error){
         echo $con->connect_error;
     }

     $result = mysqli_query($con, "SELECT * FROM `books4sale`");
     
     

     echo"<table  width='100%'>";
                    echo"<tr align = 'center'>
                            
                            
                            <td><b> Book Name </td</b>
                            <td><b> Book Price </td</b>
                            <td><b> Image </td</b>
                            <td><b> Action </td</b></tr><hr>";

                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<form method='post'>";
                        echo "<td><input type = hidden name='book_id' value='".$row['bookID']."'>";
                        echo "<tr>";
                        echo "<td><input type = text name='bookname' value='".$row['book_name']."'>";
                        echo "<td><input type = text name='bookprice' value='".$row['price']."'>";
                        
                        ?>
                        <td align="center">
                            <img src="uploads/<?php echo $row['book_image'];?>"
                            class="img" width ="70px" height="120px" name='Image' alt="image corrupted"/></td>
                            <?php
                        echo "
                        <td><input type = submit name= 'upd' value='Edit'>
                        <input type = submit name= 'del' value='Delete'>";
                        echo "</form>"; 
                        
                    }

                    

            if(isset($_POST['upd'])){
                $b_id = mysqli_escape_string($con, $_POST['book_id']);
                $b_name = mysqli_escape_string($con, $_POST['bookname']);
                    $b_price = mysqli_escape_string($con, $_POST['bookprice']);
                    
                        
                $update = ("UPDATE `books4sale` SET `book_name` = '$b_name',
                            `price` = '$b_price' WHERE `bookID` = '$b_id'");
                
                if(mysqli_query($con, $update))
                {
                    move_uploaded_file($tmpdir, $upload_dir.$mybook);
                    echo '<script>alert("Update Successful");</script>';
                    echo '<script>window.location.assign("prodman.php");</script>';
                }else{
                    echo '<script>alert("Error in Update");</script>';
                }
                }

if(isset($_POST['del'])){
    $b_id = mysqli_escape_string($con, $_POST['book_id']);
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
                }
            }

                        
$delete = "DELETE FROM  `books4sale` WHERE `bookID` = '$b_id'";

if(mysqli_query($con, $delete))
{
    echo '<script>alert("Delete Successful");</script>';
    echo '<script>window.location.assign("prodman.php");</script>';
}else{
    echo '<script>alert("Error in Deletion");</script>';
}
}

?>
</div>
        
        </div>
        
                    </form>
                    </body> 