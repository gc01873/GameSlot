<?php
//Because we are using local host right now we will name it local host 
$dbServername ="localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gameSQL";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    
    
    if(!$conn){
        die("connection failed: " . mysqli_connect_error());
    }
    
    ?>
