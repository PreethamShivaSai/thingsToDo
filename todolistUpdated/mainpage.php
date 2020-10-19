<?php
	session_start();
	if(isset($_SESSION['islogin']))
	{
		header('location:account.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDoList</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="todolist.css">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="preview.png" class="logoimg">
			</div>
			<div class="hello">
				<span class="wish">Hello User!!!</span>
			</div>
			<div class="signin">
				<button class="signbtn" onclick="window.location.href='tologin.php'">
					Login
				</button>
			</div>
		</div>
		<div class="second">
			<div class="openadd">
				<button class="opnb">
					Open Your List
				</button>
				<button class="addb">
					Add To Your List
				</button>
				<button class="addb">
					Chat
				</button>
			</div>
		</div>
	</div>
<script type="text/javascript" src="jquery.min.js">
</script>
</body>
</html>