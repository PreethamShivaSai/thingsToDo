<?php
	session_start();
	if(!isset($_SESSION['islogin']))
	{
		header('location:mainpage.php');
		die();
	}
	// $email=$_POST['work1'];
	$title=$_POST['val1'];
	$list1=$_POST['val2'];
	$email=$_SESSION['email'];
	$link = mysqli_connect("localhost","root","","ToDoList");
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql="INSERT INTO todolistup VALUES('$email','$title','$list1')";
	if(mysqli_query($link, $sql)){
		$_SESSION['done']=true;

	    echo "1";
		header('location:account.php');
		exit();
	} 
	else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	mysqli_close($link);
?>