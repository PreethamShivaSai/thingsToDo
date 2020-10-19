<?php
	// include "reload.php"
	$title=$_POST['val'];
	$email=$_POST['val1'];
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql="SELECT list from  todolistup where email='$email' and title='$title'";
	$result=mysqli_query($link,$sql);
	$i=0;
	while ($row=mysqli_fetch_assoc($result)) {
		echo $row['list'];
		echo "\n";
		echo "\n";
		$i++;
	}
?>
