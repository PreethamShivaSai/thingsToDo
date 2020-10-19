
<?php
	$email=$_POST['val'];
	$pas=$_POST['val1'];
	$hash=password_hash($pas, PASSWORD_DEFAULT);
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	if(isavailable($email,$pas))
	{
		echo true;
	}
	else
		echo false;
	function isavailable($email,$pas)
	{
		$link = mysqli_connect("localhost", "root","","ToDoList");
		$sql1="SELECT password from user_info where email='$email'";
		$result=mysqli_query($link, $sql1);
		$r=mysqli_fetch_assoc($result);
		// echo "No of rows:";
		// echo mysqli_num_rows($r);
		if(password_verify($pas, $r['password']))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	// mysqli_close($link);
?>