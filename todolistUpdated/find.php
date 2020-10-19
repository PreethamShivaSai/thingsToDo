
<?php
	$email=$_POST['val'];
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$link = mysqli_connect("localhost", "root","","ToDoList");
	$sql1="SELECT from_email,msg from msg where email='$email'";
	$r=mysqli_query($link, $sql1);
	
	while($row=mysqli_fetch_assoc()){

	}
	mysqli_close($link);
?>