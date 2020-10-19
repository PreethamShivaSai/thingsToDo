<?php
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$passf=password_hash($pass, PASSWORD_DEFAULT);
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	else
	{
		session_start();
		$sql = "SELECT f_name from user_info where email='$email'";
		$result=mysqli_query($link, $sql);
		// "SELECT f_name from user_info where email=$email and password=$passf"
		while ($row = mysqli_fetch_array($result)) {
		    $fname = $row['f_name'];
		}
		if(mysqli_query($link, $sql)){
			session_start();
			$_SESSION['islogin']=true;
			$_SESSION['f_name']=$fname;
			$_SESSION['email']=$email;
			header('location:account.php');
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
?>