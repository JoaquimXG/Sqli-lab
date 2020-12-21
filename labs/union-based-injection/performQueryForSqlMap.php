<?php 
    //Including the Mysql connect parameters.
    include("../../sql-connections/sqli-connect.php");
    error_reporting(0);

    //Check if id was passed as a query
    if(isset($_GET['id'])) {
        $id=$_GET['id'];

        //Generating Query
        $query="SELECT * FROM users WHERE id='$id' LIMIT 0,1";

        //Performing Query
        $result=mysqli_query($con1, $query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);

        //Displaying full query and url parameter
        //echo "Injected String" . "<div class='id'>".$id."</div><br>";
        //echo "Full query executed". "<div class='query'>". $query ."</div><br>";


        //Check if any rows were returned
        //If rows were returned, they should contain only username and password
        //So print to screen
        if($row) { 
            echo '<div class="success">Your Login name: ' . $row['username'] . ' </div>';
            echo '<div class="success">Your Password: ' . $row['password'] . ' </div>';
        }
        //If no rows are returned then print the error (if any to print)
        else {
            $error = print_r(mysqli_error($con1), true);
            echo "" . "<div class='error'>" . $error . "</div>";
        }
    }
?>
