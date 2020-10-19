<?php
$username = "root";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username) 
  or die("Unable to connect to MySQL");
echo '<script>console.log("connected to server");</script>'; 
$selected = mysqli_select_db($dbhandle,"Apss") 
  or die("Could not select examples");
echo '<script>console.log("connected to db");</script>'; 

?>