<?php
	session_start();
	$em=$_POST['val'];
	$email=$_SESSION['email'];
	// echo $email;
	$link = mysqli_connect("localhost", "root","","ToDoList");
	$sqlq="SELECT * from msg where to_email='$email' and from_email='$em'";
	$result=mysqli_query($link,$sqlq);
	$from1=[];
	$to1=[];
	$msgmain=[];
	$j=0;
	$rows = mysqli_fetch_assoc($result);
	while($rows = mysqli_fetch_assoc($result))
	{
		$from1[$j]=$rows['from_email'];
		$to1[$j]=$rows['to_email'];
		$msgmain[$j]=$rows['msg'];
		$j=$j+1;
	}
	// $return_data=array('from1'=>'$from1','to1'=>'$to1','msgmain'=>'$msgmain');
	return $to1;
?>