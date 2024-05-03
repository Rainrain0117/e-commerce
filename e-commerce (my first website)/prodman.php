<!DOCTYPE html>
<title>Admin</title>
<script src="https://kit.fontawesome.com/43f3a2a0ed.js" crossorigin="anonymous"></script>

<head>
	<link rel="stylesheet" type="text/css" href="prodman.css">
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
        <a href ="alt_prod.php"><button name= "update" id="upd">Manage</button></a>
        <form method = "POST">
    </div>
                               
                    <?php
                    $host = 'localhost';
                    $username = "root";
                    $password = "";
                    $database = "book_products";
                    
                    $con = new mysqli($host, $username, $password, $database);
                    
                    if($con->connect_error){
                        echo $con->connect_error;
                    }
                    
                    $select="SELECT * FROM books4sale";
                    $result= $con->query($select);
                    
                    
                    echo"<table border = 1px width='100%'>";
                    echo"<tr align = 'center'>
                            
                            
                            <td><b> Book Name </td</b>
                            <td><b> Book Price </td</b>
                            <td><b> Image </td</b></tr><hr>";

                    while ($row = mysqli_fetch_array($result))
                    {
                        
                        echo "<tr>";
                        
                        echo "<td align = 'center'>";
                        echo $row["book_name"];
                        echo "<td align = 'center'>";
                        echo "P ".$row["price"]."";
                                                ?>
                        <td align="center">
                            <img src="uploads/<?php echo $row['book_image'];?>"
                            class="img" width ="70px" height="120px" alt="image corrupted"/></td>
                            <?php
                        
                    }
                    echo "</table>";

                    echo "<a href = 'adminprofile.html'>BACK</a>";

                    
                    ?>
                    
                  
            
        </div>
        
    </div>
    
                </form>
                </body> 

		
			
