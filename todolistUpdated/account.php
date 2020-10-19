<?php
	require "connect.php";
?>
<?php
	session_start();
	if(isset($_SESSION['islogin']))
	{
		$fname=$_SESSION['f_name'];
	}
	else
	{
		header('location:tologin.php');
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
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
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
		<div class="second">
			<div class="openadd">
				<button class="opnb" onclick="location.href='open.php'">
					Open Your List
				</button>
				<button class="addb" onclick="addtolist()">
					Add To Your List
				</button>
				<button class="chat" onclick="location.href='msg.php'">
					Chat with Friends
				</button>
			</div>
		</div>
	</div>
	<div class="done" id="done">
		<img src="tick.png" style="width: 50px;">
	</div>
	<div class="addto" id="addto" style='background-image: url("apsslogo.png");'>
		<div class="rwadd" style="display: block;">
			<span id="ti" style="padding: 10px;position: relative; top: 15px;font-family: 'Lobster', cursive;">Add Your Task</span>
			<a id="x" onclick="chatfunc1()" style="float: right;position: relative; top: 15px; right:20px; font-weight: bold;font-family: 'Russo One', sans-serif;">x</a>
		</div>
		<div class="chating" id="chating">
			<span style="position: relative; float: left; top: 47px;padding: 10px;font-family: 'Lobster', cursive;">Title&nbsp;&nbsp;:</span>
			<input type="text" name="title" id="title" class="title" placeholder="(This can't be same as any of your previous titles)"><br>
			<textarea id="list" class="list" style="position: relative;top: 55px; resize: none;" placeholder="Add your list"></textarea>
			<button id="addbtn" style="border: 0;background-color: transparent;position: relative;top: 65px;left: 45%;" onclick="adddata()">Add</button>
		</div>
	</div>
<!-- <script type="text/javascript" src="jquery.min.js">
</script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
<script type="text/javascript">
	function addtolist(){
		document.getElementById('addto').style.top='25%';
	}
	function chatfunc1(){

		document.getElementById('addto').style.top='-500%';
	}
	function adddata(){
		var title=document.getElementById('title').value;
		var listtoadd=document.getElementById('list').value;
		if(title.length!=0 && listtoadd.length!=0){
			$.post('adddata.php',{'val1':title , 'val2':listtoadd },
			function(data){
				    document.getElementById("done").style.display ='block';
				setTimeout(function(){
				    document.getElementById("done").style.display ='none';
				}, 1000);
			document.getElementById('title').value="";
			document.getElementById('list').value="";
		document.getElementById('addto').style.top='-500%';

		})
		}
		else{
			alert("Title or List cant be empty");
		}
	}
</script>
</body>
</html>