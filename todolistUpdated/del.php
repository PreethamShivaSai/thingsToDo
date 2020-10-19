<?php
	// include "reload.php"
	$title=$_POST['val'];
	$email=$_POST['val1'];
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql="DELETE FROM todolistup where email='$email' and title='$title'";
	$result=mysqli_query($link,$sql);
	if(mysqli_query($link,$sql)){
		return True;
	}
?>
