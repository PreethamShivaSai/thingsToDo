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
	<title>Login|Apss</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apss login</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
		<div class="formbox1">
			<div class="logo" align="center">
				<a href="index.html"><img src="preview.png" width="135px"></a>
			</div>
			<div class="toggle" align="center">
				<button onclick="reg()">Register</button>
				<button onclick="signin()">Sign In</button>
				<div class="btn" id="btn"></div>
			</div>
			<form id="reg" action="reg.php" method="post">
				<input class="input" type="text" name="fname" id="fname" placeholder="First Name"> 
				<span id="fnamewar"></span>
				<input class="input" type="text" name="lname" id="lname" placeholder="Last Name"> 
				<span id="lnamewar"></span>

				<input class="input" type="text" name="email" id="email" placeholder="Email"> 
				<span id="emailwar"></span>

				<input class="input" type="Number" name="phone" maxlength="10" id="phone" placeholder="Phone Number"> 
				<span id="phnwar"></span>

				<input class="input" type="password" name="pass" id="pass" placeholder="Password"> 
				<span id="paswar"></span>

				<input class="input" type="password" name="cpass" id="cpass" placeholder="Confirm Password"> 
				<span id="cpaswar"></span>

				<button type="button" name="submit1" class="submit" style="border: 0; width: 100px;margin: 0;border-bottom: 2px solid red;" onclick="register()">Submit</button>
			</form>
		</div>
		<div class="formbox1">
			<form id="login" action="signin.php" method="post">
				<input type="text" id="loginemail" name="email" placeholder="Email">
				<span id="emailwar1" style="float: right;"></span>

				<input type="password" id="loginpass" name="password" placeholder="Password">
				<span id="passwar1"></span>

				<button type="button" align="center" name="submit2" id="lsub" class="submit1" style="border: 0; width: 100px;margin: 0;border-bottom: 2px solid red;">Submit</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		var btn=document.getElementById('btn');
		var login=document.getElementById('login');
		var regis=document.getElementById('reg');
		var delayInMilliseconds = 1000; //1 second
		function signin(){
			btn.style.left='100px';
			login.style.display='block';
			regis.style.display='none';
		}
		function reg(){
			btn.style.left='0px';
			login.style.display='none';
			regis.style.display='block';
		}
	</script>
	<script type="text/javascript" src="jquery.min.js">
	</script>
	<script type="text/javascript">
		$('#fname').change(function(event){
			var form=$('#reg');
			var fname = form.find('input[name="fname"]').val();
			var flen=fname.length;
			if(flen==0)
			{
				$('#fnamewar').text("First Name can't be empty");
				$('#fname').css('border-bottom-color','red');
			}
			else
			{
				$('#fnamewar').text("");
				$('#fname').css('border-bottom-color','#47d147');
			}
		})
		$('#lname').change(function(event){
			var form=$('#reg');
			var lname = form.find('input[name="lname"]').val();
			var llen=lname.length;
			if(llen==0)
			{
				$('#lnamewar').text("Last Name can't be empty");
				$('#lname').css('border-bottom-color','red');
			}
			else
			{
				$('#lnamewar').text("");
				$('#lname').css('border-bottom-color','#47d147');
			}
		})
		$('#email').change(function(event){
			var form=$('#reg');
			var email = form.find('input[name="email"]').val();
			var elen=email.length;
			if(elen==0)
			{
				$('#emailwar').text("Email can't be empty");
				$('#email').css('border-bottom-color','red');
			}
			else
			{
				$('#emailwar').text("");
				$('#email').css('border-bottom-color','#47d147');
			}
			$.post( 'post.php', { 'val': email },
		      function( data ) {
		          window.console && console.log(data);
		          // alert(txt+"exists");
		          if(data==1)
		          {
		          	$('#emailwar').text("Email already exists");
		          	$('#email').css('border-bottom-color','red');
		          }
		          else
		          {
		          	$('#emailwar').text("");
		          	$('#email').css('border-bottom-color','#47d147');
		          }
		      }
	   	 )
		})
		$('#phone').change(function(event){
			var form=$('#reg');
			var phone = form.find('input[name="phone"]').val();
			var plen=phone.length;
			if(plen==0)
			{
				$('#phnwar').text("Phone Number cant be empty");
				$('#phone').css('border-bottom-color','red');
			}
			else
			{
				$('#phnwar').text("");
				$('#phone').css('border-bottom-color','#47d147');
			}
		})
		$('#pass').change(function(event){
			var form=$('#reg');
			var pass = form.find('input[name="pass"]').val();
			var palen=pass.length;
			if(palen<5||palen>15)
			{
				$('#paswar').text("Password must contain 5-15 characters");
				$('#pass').css('border-bottom-color','red');
			}
			else
			{
				$('#paswar').text("");
				$('#pass').css('border-bottom-color','#47d147');
			}
		})
		$('#cpass').change(function(event){
			var form=$('#reg');
			var pass = form.find('input[name="pass"]').val();
			var cpass = form.find('input[name="cpass"]').val();
			var cpass = form.find('input[name="cpass"]').val();
			var palen=pass.length;
			if(palen>=5&&palen<=15&&pass!=cpass)
			{
				$('#cpaswar').text("Password does not match");
				$('#cpass').css('border-bottom-color','red');
			}
			else
			{
				$('#cpaswar').text("");
				$('#cpass').css('border-bottom-color','#47d147');
			}
		})
	</script>
	<script type="text/javascript">
		$('#loginemail').change(function(events){
			var form=$('#login');
			var email = form.find('input[name="email"]').val();
			var elen=email.length;
			if(elen==0)
			{
				alert(" Email can't be empty");
				$('#loginemail').css('border-bottom-color','red');
			}
			else
			{
				$('#emailwar1').text("");
				$('#loginemail').css('border-bottom-color','#47d147');
				$.post( 'post.php', { 'val': email },
		      function( data ) {
		          window.console && console.log(data);
		          // alert(txt+"exists");
		          if(data!=1)
		          {
		          	alert('Email does not exist');
		          	$('#loginemail').css('border-bottom-color','red');
		          }
		          else
		          {
		          	$('#emailwar1').text("");
		          	$('#loginemail').css('border-bottom-color','#47d147');
		          }
		      }
	   	 )
			}
			
		})

	</script>
	<script type="text/javascript">
		function register(){
			var fname=document.getElementById("fname").value;
			var lname=document.getElementById("lname").value;
			var phone=document.getElementById("phone").value;
			var email=document.getElementById("email").value;
			var pass=document.getElementById("pass").value;
			var cpass=document.getElementById("cpass").value;
			var a=0,b=0,c=0,d=0;
			var passlen=pass.length;
			for(var i=0;i<pass.length;i++)
			{
				if(pass[i]==pass[i].toUpperCase())
				{
					a++;
				}
				if(pass[i]==pass[i].toLowerCase())
				{
					b++;
				}
				if(!isNaN(pass[i]))
				{
					c++;
				}
			}
			if(fname.length==0||lname.length==0||email.length==0||phone.length==0||passlen==0||cpass.length==0)
			{
				
				if(fname.length==0)
				{
					document.getElementById("fname").style.borderBottom="2px solid red";
					document.getElementById("fnamewar").innerHTML="First name can't be empty";
				}
				else
				{
					document.getElementById("fname").style.borderBottom="2px solid #47d147";
					document.getElementById("fnamewar").innerHTML="";
				}
				if(lname.length==0)
				{
					document.getElementById("lname").style.borderBottom="2px solid red";
					document.getElementById("lnamewar").innerHTML="Last name can't be empty";
				}
				else
				{
					document.getElementById("lname").style.borderBottom="2px solid #47d147";
					document.getElementById("lnamewar").innerHTML="";
				}
				if(email.length==0)
				{
					document.getElementById("email").style.borderBottom="2px solid red";
					document.getElementById("emailwar").innerHTML="Email can't be empty";
				}
				else
				{
					document.getElementById("email").style.borderBottom="2px solid #47d147";
					document.getElementById("emailwar").innerHTML="";
				}
				if(phone.length==0)
				{
					document.getElementById("phone").style.borderBottom="2px solid red";
					document.getElementById("phnwar").innerHTML="Phone number can't be empty";
				}
				else
				{
					document.getElementById("phone").style.borderBottom="2px solid #47d147";
					document.getElementById("phnwar").innerHTML="";
				}
				if(pass.length==0)
				{
					document.getElementById("pass").style.borderBottom="2px solid red";
					document.getElementById("paswar").innerHTML="Password can't be empty";
				}
				else
				{
					document.getElementById("pass").style.borderBottom="2px solid #47d147";
					document.getElementById("paswar").innerHTML="";
				}
				if(cpass.length==0)
				{
					document.getElementById("cpass").style.borderBottom="2px solid red";
				}
				else
				{
					document.getElementById("cpass").style.borderBottom="2px solid grey";
				}
			}
			else
			{
				if(passlen<5||passlen>15)
				{
					// document.getElementById("cpass").style.borderBottom="2px solid red";
					document.getElementById("pass").style.borderBottom="2px solid red";
					document.getElementById("paswar").innerHTML="Password must contain 5-15 characters";
				}
				else if(pass!=cpass)
				{
					document.getElementById("cpass").style.borderBottom="2px solid red";
					document.getElementById("pass").style.borderBottom="2px solid red";
					document.getElementById("cpaswar").innerHTML="Password does not match";
				}
				else
				{
					document.getElementById("cpass").style.borderBottom="2px solid #47d147";
					document.getElementById("pass").style.borderBottom="2px solid #47d147";
					document.getElementById("paswar").innerHTML="";
					document.getElementById("cpaswar").innerHTML="";
					document.getElementById("reg").submit();
				}
			}
		}
		$('#lsub').click(function(){
			var form=$('#login');
			var email = form.find('input[name="email"]').val();
			var password=form.find('input[name="password"]').val()
			var elen1=email.length;
			if(elen1==0)
			{
				alert('Email is empty');
			}
				$.post( 'post1.php', { 'val': email , 'val1': password },
		      function( data ) {
		          window.console && console.log(data);
		          // alert(txt+"exists");
		          if(data!=1)
		          {
		          	alert('Invalid email or password');
		          	$('#loginemail').css('border-bottom-color','red');
		          }
		          else
		          {
		          	$('#loginemail').css('border-bottom-color','#47d147');
		          	form.submit();
		          }
		      }
	   	 )
		})
	</script>
</body>
</html>