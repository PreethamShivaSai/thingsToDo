<?php
	require "connect.php";
?>
<?php
	session_start();
	$email=$_SESSION['email'];
	if(isset($_SESSION['islogin']))
	{
		$link = mysqli_connect("localhost", "root","","ToDoList");
		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$sql="SELECT * from todolistup where email='$email'";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result )!=0)
		{
			echo "<script> alert('list already created');</script>";
			header('location:open.php');
			exit();
		}
		else{
			$fname=$_SESSION['f_name'];
		}
		$fname=$_SESSION['f_name'];
	}
	else
	{
		header('location:tologin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDoList</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tomsg.css">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Sacramento&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
	<div class="text">
		<div class="row">
			<div class="logo">
				<img src="preview.png" class="logoimg">
			</div>
			<div class="hello">
				<span class="wish">Hello <?php echo $fname?>!!</span>
			</div>
			<div class="signin">
				<button class="signbtn" onclick="window.location.href='logout.php'">
					Logout
				</button>
			</div>
		</div>
		<div class="head">
		</div>
		<div class="textform" id="textform1" action="adddata.php" method="post">
			<h1 style="text-align: center;">Title:</h1><input type="text" name="text" id="text">
			<button type="button" class="save" id="save" onclick="func()">Save</button>
		</div>
	</div>
	<script type="text/javascript">
		function func(){
			document.getElementById('textform').submit();
		}
	</script>
</body>
</html>