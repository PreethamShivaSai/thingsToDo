
<?php
	$email=$_POST['val'];
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	if(isavailable($email))
	{
		echo true;
	}
	else
		echo false;
	function isavailable($email)
	{
		$link = mysqli_connect("localhost", "root","","ToDoList");
		$sql1="SELECT email from user_info where email='$email'";
		$r=mysqli_query($link, $sql1);
		if(mysqli_num_rows($r)>0)
		{
			return 1;
		}
		else
			return 0;
	}
	mysqli_close($link);
?>