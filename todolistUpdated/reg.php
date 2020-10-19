<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	$cpass=$_REQUEST['cpass'];
	$passf=password_hash($pass, PASSWORD_DEFAULT);
	$link = mysqli_connect("localhost", "root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	// if(isavailable($email))
	// {
	// 	echo "<script> alert('Email already exists')</script>";
	// 	header("location:index.php");
	// }
	else
	{
		$sql = "INSERT INTO user_info (f_name, l_name, email, phone, password) VALUES ('$fname','$lname','$email','$phone','$passf')";
		if(mysqli_query($link, $sql)){
			session_start();
			$_SESSION['islogin']=true;
			$_SESSION['f_name']=$fname;
			$_SESSION['email']=$email;
			header('location:account.php');
		    echo "Records inserted successfully.";
		    die();
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	function isavailable($email)
	{
		$link = mysqli_connect("localhost", "root","","ToDoList");
		$sql1="SELECT email from user_info where email='$email'";
		$r=mysqli_query($link, $sql1);
		if(mysqli_num_rows($r)>0)
		{
			return true;
		}
		else
			return false;
	}
	mysqli_close($link);
?>