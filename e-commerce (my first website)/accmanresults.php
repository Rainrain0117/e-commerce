<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="accman.css">
	<title>Admin</title>
</head>
<body>
<div class="side">
    <span class = cssclsNoPrint>
    <h2>Welcome Bookkeeper!</h2><br><br><br>
    <div class="navbar">
        <a href="adminprofile.html">Admin Profile</a><br><br>
        <a href="accman.php">Account Management</a><br><br>
        <a href="prodman.php">Product Management</a><br><br>
        <a href="index.html">Logout</a><br><br>
    </div>
</div>

</span>
    <div class="content">
        <div class="details">
            <form method = "POST" action="#">
            <h4>List of Accounts Registered</h4>




<?php
                        $host = 'localhost';
                        $username = "id19316999_main_database";
                        $password = "Q7(N>0f3u_7LW/a1";
                        $database = "id19316999_main_db";
                        
                        $con = new mysqli($host, $username, $password, $database);
                        
                        if($con->connect_error){
                            echo $con->connect_error;
                        }      
                        $sqlect = "SELECT * FROM tblregistered_users";
                    $results = mysqli_query($con, $sqlect);
                    $query_results = mysqli_num_rows($results);
                    
                    echo"<table border = 1px width='100%'>";
                    echo"<tr align = 'center'>
                            <td><b> Username </td</b>
                            <td><b> Password </td</b>
                            <td><b> Confirm Password </td</b>
                            <td><b> Email </td</b></tr><hr>";
                        
                         echo"<span class=cssclsNoPrint>
                            <form method=POST action=accmanresults.php>
                            <p><b>NOTE: Search via Username.</b></p><br>
                            <input type=text name=queryusers placeholder=Search here...>&emsp;&emsp;
                            <b><input type = submit name=search value=Search></b>
                            </span>";
                        
                        if(isset($_POST['search'])) {
                            $search = mysqli_real_escape_string($con, $_POST['queryusers']);
                            $sqlsearch = "SELECT * FROM tblregistered_users WHERE Username LIKE 
                                         '%$search%'";
                            $resultss = mysqli_query($con, $sqlsearch);
                            $queryRes = mysqli_num_rows($resultss);
                           
                            if ($queryRes > 0){
                                while ($rows = mysqli_fetch_assoc($resultss))
                                {
                                    echo "<tr><td>";
                            echo $rows["Username"];
                            echo "<td>";
                            echo $rows["Password"];
                            echo "<td>";
                            echo $rows["Confirm Password"];
                            echo "<td>";
                            echo $rows["Email"];
                                }

                            }else{
                                echo '<script>alert("No user found");</script>';
                            }
                        }
                        echo "<tr>";
                    echo "<td colspan=4><span class =cssclsNoPrint><b>
                        <input type = button onclick=window.print() value=Print> &emsp;&emsp;&emsp;
                        <input type = button onclick=parent.location='accman.php' value=Cancel>
                        </b></span></td>";
                    echo "</tr>";
                    echo "</form>";

                    echo "</table>";
                    ?>
                         </form>
        </div>
        
    </div>
                </form>
                </body> 

