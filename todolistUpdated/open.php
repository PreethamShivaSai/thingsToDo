<?php
	session_start();
	$email=$_SESSION['email'];
	if(isset($_SESSION['islogin']))
	{
		// echo'<script> echo("login succ");</script>';
		$link = mysqli_connect("localhost", "root","","ToDoList");
		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$sql="SELECT * from todolistup where email='$email'";
		$result=mysqli_query($link,$sql);
		$work=[];
		$title=[];
		$i=0;
		$it=mysqli_num_rows($result);
		while($row=mysqli_fetch_assoc($result))
		{
			// $work[$i]=$row['list'];
			$title[$i]=$row['title'];
			$i++;
		}
		$un=$_SESSION['f_name'];
		
	}
	else{
		header('location:mainpage.php');
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your To Do List</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="todolist.css">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Sacramento&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">

</head>
<body>
	<div class="list1">
		<div class="row">
			<div class="logo">
				<img src="preview.png" class="logoimg">
			</div>
			<div class="hello">
				<span class="wish">Hello <?php echo $un?>!!</span>
			</div>
			<div class="signin">
				<button class="signbtn" onclick="window.location.href='logout.php'">
					Logout
				</button>
			</div>
		</div>
		<!-- <div class="todo">
			<h1 id="heading">Things <?php echo $un?> Should Do</h1>
		</div> -->
		<div class="align" id="align" style="text-align: center;">
			
		</div>
		<div class="openL" id="openL">
			<div class="Ltitle" id="Ltitle" style="text-align: center;">
				<div class="spans" id="spans" style="padding: 10px;position: relative; top: 15px;"> <!-- title --></div>
				<a id="x" onclick="chatfunc1()" style="float: right;position: relative; top: 15px; right:20px; font-weight: bolder;font-family: 'Russo One', sans-serif;">x</a>
			</div>
			<textarea readonly class="Ldata" id="Ldata" style="">
				
			</textarea>
			<button onclick="deletethis()" id="del" style="background-color: white; color: red; font-family: 'Lobster', cursive; position: relative; margin-left: 50px;">Delete</button>
		</div>
	</div>
	<script type="text/javascript" src="jquery.min.js">
	</script>
	<script type="text/javascript">
		var ind=parseInt(<?php echo $it ?>);
		var i=0
		var list_ary=[];
		var title_ary=[];
		while(i<ind)
		{
			<?php for($x=0;$x<$it;$x++){ ?>
				title_ary[i]="<?php echo $title[$x] ?>";
		        i++;
		    <?php } ?>
		    i++;
		}
	 	for(var i=0;i<ind;i++){
	 		var align=document.getElementById('align');
			var t=document.createElement('div');
			t.setAttribute("id",title_ary[i]);
			t.setAttribute("class","listtitle");
			t.setAttribute('onclick','chatfunc(id);' + onclick);
	        align.append(t);
	        t.innerHTML="<span id='lspn' class='center'>"+title_ary[i]+"</span>";
	 	}
		function chatfunc(s){
			
			var temp;
			document.getElementById('openL').style.display='block';
			document.getElementById('spans').innerHTML=s;
			$.post('getld.php',{'val':s , 'val1':'<?php echo $email ?>'},
				function(d){
					// alert(d);
					document.getElementById('Ldata').innerHTML=d;	
				})
		}
		function chatfunc1(){
			document.getElementById('openL').style.display='none';
		}
		function deletethis(){
			document.getElementById(document.getElementById('spans').innerHTML).style.display='none';
			var title=document.getElementById('spans').innerHTML;
			$.post('del.php',{'val':title , 'val1':'<?php echo $email ?>'},
				function(d){
					document.getElementById('openL').style.display='none';

				})
		}
	</script>
</body>
</html>