<?php
	// include "reload.php"
	$from_mail=$_POST['val1'];
	$to_1=$_POST['val2'];
	$message=$_POST['val'];
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql="INSERT INTO msg values('$from_mail','$to_1','$message')";
	if(mysqli_query($link,$sql)){
		return True;
	}
	// mysqli_refresh(connection, MYSQLI_REFRESH_GRANT);
?>
