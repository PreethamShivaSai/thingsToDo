<?php
	// session_start();
	$email=$_SESSION['email'];
	if(isset($_SESSION['islogin']))
	{
		// echo'<script> echo("login succ");</script>';
		$link = mysqli_connect("localhost", "root","","ToDoList");

		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$from1=[];
		$to1=[];
		$msgmain=[];
		$user_email=[];
		$j=0;
		$j1=0;
		$sql="SELECT distinct from_email from msg where to_email='$email'";
		$sql1="SELECT * from msg where to_email='$email' or from_email='$email'";
		$sql2="SELECT email from user_info";
		$result=mysqli_query($link,$sql);
		$result1=mysqli_query($link,$sql1);
		$result2=mysqli_query($link,$sql2);
		while($rows = mysqli_fetch_assoc($result1))
		{
			$from1[$j]=$rows['from_email'];
			$to1[$j]=$rows['to_email'];
			$msgmain[$j]=$rows['msg'];
			$j++;
		}
		while($rows2 = mysqli_fetch_assoc($result2))
		{
			$user_email[$j1]=$rows2['email'];
			$j1++;
		}
		$from_ary=[];
		$msg_ary=[];
		$ind=0;
		$index=0;
		$it=mysqli_num_rows($result);
		$it1=mysqli_num_rows($result1);
		$it2=mysqli_num_rows($result2);
		// echo $email;
		if(mysqli_num_rows($result)==0)
		{
			// echo"<div>No messages</div>";
		}
		else
		{
			while($row = mysqli_fetch_assoc($result)){
				$from_ary[$ind]=$row['from_email'];
				// $msg_ary[$ind]=$row['msg'];
				$ind=$ind+1;
			}
		}
	}
	else{
		header('location:login.php');
		die();
	}
?>