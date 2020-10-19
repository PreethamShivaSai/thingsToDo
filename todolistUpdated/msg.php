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
<?php
	include 'reload.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" type="text/css" href="tomsg.css">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
<body>
	<div class="popup" id="popup">
		<span class="msgfet" id="msgfet" style="position: relative ;top: 40%;">The messaging feature is not completely functional!!!</span>
		<button onclick="ok()" id="ok" style="background-color: white; color: red; position: relative;top: 60%;right: 50%;">OK</button>
	</div>
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
		<div class="messagesdiv" style="text-align: center;">
			<!-- <span id="smsg">Search Your friend&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> --><input type="text" name="search" id="search" placeholder="Search For Friends" onkeyup="searching()">
			<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<button id="sbtn" onclick="searchforf()">
				search
			</button>
			
			<label id="labl" style="color: red; text-align: center;"></label>
		</div>
		<br>
		<br>
		<div id="msglist" class="msglist">
			
		
		</div>
		<div class="pm" id="pm" style='background-image: url("apsslogo.png");'>
			<div class="rw">
				<span id="mes" style="padding: 10px;position: relative; top: 15px;">Messages</span>
				<a id="x" onclick="chatfunc1()" style="float: right;position: relative; top: 15px; right:20px; font-weight: lighter;font-family: 'Russo One', sans-serif;">x</a>
			</div>
			<div class="chating" id="chating" style="width: 300px;height: 300px;background-color: white;">
				<?php

				?>
			</div>
			<div class="rw1" id="rw1">
				<input type="text" name="t" id="t" placeholder="Type something...">
				<button id="but">&#9655;</button>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<script type="text/javascript">
		function ok(){
			document.getElementById('popup').style.display='none';
		}
		function noF(){
			document.getElementById('search').value="";
		}
		var totaldivs=0;
		var ind=parseInt(<?php echo $it ?>);
		var msg_a=[];
		var from_a=[];
		
		
		if(ind==0)
		{
			$('#msglist').append('<div id="scriptmsg" style="text-align:center;width:100%;">No messages to show!!</div>');
		}
		else
		{
			$('#msglist').append('<div id="scriptmsg" style="text-align:center;width:100%;">You have messages from</div><br><br>');
			// <?php foreach($from_ary as $key => $val){ ?>
			// 	var msglist=document.getElementById('msglist');
			// 	var t=document.createElement('div');
			// 	t.setAttribute("id","m");
		 //        msglist.append(t);
		 //        document.getElementById('m').innerHTML='<a href=""><?php echo"EMAIL:";echo $from_ary[$key]; ?></a>'
		 //    <?php } ?>
			
			var i=0;
			var temp=[];
			// while(i<ind)
			// {
			// 	<?php for($x=0;$x<$it;$x++){ ?>
			// 		temp[i]="<?php echo $from_ary[$x] ?>";
			//         from_a[i]='<?php echo'<a class="ma" onclick="chatfunc()">'."EMAIL:".$from_ary[$x].'</a>';?>';
			//         i++;
			//     <?php } ?>
			//     i++;
			// }
		 // 	for(var i=0;i<ind;i++){
		 // 		var msglist=document.getElementById('msglist');
			// 	var t=document.createElement('div');
			// 	t.setAttribute("class","m");
		 //        msglist.append(t);
		 //        t.innerHTML=from_a[i];
		 // 	}
		 	while(i<ind)
			{
				<?php for($x=0;$x<$it;$x++){ ?>
					temp[i]="<?php echo $from_ary[$x] ?>";
			        from_a[i]='<?php echo'EMAIL:'.$from_ary[$x];?>';
			        i++;
			    <?php } ?>
			    i++;
			}
		 	for(var i=0;i<ind;i++){
		 		var msglist=document.getElementById('msglist');
				var t=document.createElement('div');
				t.setAttribute("id",temp[i]);
				t.setAttribute("class","m");
				t.setAttribute('onclick','chatfunc(id);' + onclick);
		        msglist.append(t);
		        t.innerHTML=from_a[i];
		 	}

		}
		var imp,implen;
		function chatfunc(em){
			// $('#chating').scrollTop($('#chating')[0].scrollHeight - $('#chating')[0].clientHeight);
			var height = 0;
			$('#chating').each(function(z, value){
			    height += parseInt($(this).height());
			});

			height += '';

			$('#chating').animate({scrollTop: '10000px'});

			imp=em;
			$('.ch').remove();
			document.getElementById('pm').style.height='400px';
			document.getElementById('pm').style.width='300px';
			document.getElementById('mes').innerHTML=em;
			document.getElementById('x').style.display="block";
			document.getElementById('t').style.borderColor="#666666";
			document.getElementById('t').style.boxShadow="0 0 10px white";
			var mlen=<?php echo sizeof($from1); ?>;
			implen=mlen;
			// alert(mlen);
			
			var from_email1=[];
			var to_email1=[];
			var msgmain1=[];
			var q=0;
			while(q<mlen)
			{
				<?php for($x=0;$x<$it1;$x++){ ?>
			        from_email1[q]='<?php echo $from1[$x];?>';
			        to_email1[q]='<?php echo $to1[$x];?>';
			        msgmain1[q]='<?php echo $msgmain[$x];?>';
					console.log(from_email1[q]+":"+to_email1[q]+" "+msgmain1[q]);

			        q++;
			    <?php } ?>
			    // q++;
			}
			for(i=0;i<mlen;i++){
					// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
				if(from_email1[i]==em && to_email1[i]=="<?php echo $email; ?>"){
					// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
					var k=document.createElement('div');
					k.setAttribute('class','ch');
					k.setAttribute('id','from1');
					k.innerHTML="<span id='from'>"+msgmain1[i]+"</span>";
					document.getElementById('chating').append(k);
				}
				else if(from_email1[i]=="<?php echo $email; ?>" && to_email1[i]==em){
					// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
					var k=document.createElement('div');
					k.setAttribute('class','ch');
					k.setAttribute('id','to1');
					k.innerHTML="<span id='to'>"+msgmain1[i]+"</span>";
					document.getElementById("chating").append(k);
				}
			}
		}
			$('#but').click(function(){
			var t=$('#t').val();
			// var toml=em;
			if(t.length==0){
				$('#t').css('border-color','#ffc2b3');
				$('#t').css('box-shadow','0 0 10px #ffc2b3');
			}
			else{
				$('#t').css('border-color','grey');
				$('#t').css('box-shadow','0 0 10px white');
				// $('#chating').append('<span class="chat" id="chat"><span><br>');
				// var chat=document.createElement('div');
				// // var b=document.createElement('br');
				// chat.setAttribute("id",'ch');
				// chat.setAttribute("class",'ch');
				// chat.innerHTML="<span id='spanchat'>"+t+"</span>";
				// $('#chating').append(chat);
				// $('#chating').append(b);

				$.post( 'addmsg.php', { 'val': t , 'val1': "<?php echo $email ?>", 'val2' : imp },
			      function( data ) {
			      	// $('#chating').load('reload.php');
			      	$.ajax({
					   url: 'reload.php',
					   
					   }
					);
			        window.console && console.log(data);
					$('.ch').remove();
			        from_email1=[];
					to_email1=[];
					msgmain1=[];
					q=0;
					while(q<implen)
					{
						<?php for($x=0;$x<$it1;$x++){ ?>
					        from_email1[q]='<?php echo $from1[$x];?>';
					        to_email1[q]='<?php echo $to1[$x];?>';
					        msgmain1[q]='<?php echo $msgmain[$x];?>';
							console.log(from_email1[q]+":"+to_email1[q]+" "+msgmain1[q]);

					        q++;
					    <?php } ?>
					    // q++;
					}
					for(i=0;i<implen;i++){
							// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
						if(from_email1[i]==imp && to_email1[i]=="<?php echo $email; ?>"){
							// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
							var k=document.createElement('div');
							k.setAttribute('class','ch');
							k.setAttribute('id','from1');
							k.innerHTML="<span id='from'>"+msgmain1[i]+"</span>";
							document.getElementById('chating').append(k);
						}
						else if(from_email1[i]=="<?php echo $email; ?>" && to_email1[i]==imp){
							// console.log(from_email1[i]+":"+to_email1[i]+" "+msgmain1[i]);
							var k=document.createElement('div');
							k.setAttribute('class','ch');
							k.setAttribute('id','to1');
							k.innerHTML="<span id='to'>"+msgmain1[i]+"</span>";
							document.getElementById("chating").append(k);
						}
					}
			          
			      }
		   	 	)
				}
		})
			// $.post('msgpost.php',{ 'val':em },
			// function(data){
			// 	<?php
			// 		session_start();
			// 		$em=$_POST['val'];
			// 		$email=$_SESSION['email'];
			// 		// echo $email;
			// 		$link = mysqli_connect("localhost", "root","","ToDoList");
			// 		$sqlq="SELECT * from msg where to_email='$email' and from_email='$em'";
			// 		$result=mysqli_query($link,$sqlq);
			// 		$from1=[];
			// 		$to1=[];
			// 		$msgmain=[];
			// 		$j=0;
			// 		$rows = mysqli_fetch_assoc($result);
			// 		while($rows = mysqli_fetch_assoc($result))
			// 		{
			// 			$from1[$j]=$rows['from_email'];
			// 			$to1[$j]=$rows['to_email'];
			// 			$msgmain[$j]=$rows['msg'];
			// 			$j=$j+1;
			// 		}
			// 		// $return_data=array('from1'=>'$from1','to1'=>'$to1','msgmain'=>'$msgmain');
			// 		// return $to1;
			// 	?>
			// });
			// document.getElementById('ch').innerHTML="";

			// else{
			// 	document.getElementById('pm').style.height='0px';
			// 	document.getElementById('pm').style.width='0px';
			// }
			// $sql1="SELECT distinct msg from msg where to_email='$email'";

			// <?php
			// 	$sqlq="SELECT * from msg where to_email='$email'";
			// 	$res=mysqli_query($link,$sqlq);
			// 	$from1=[];
			// 	$to1=[];
			// 	$msgmain=[];
			// 	$j=0;
			// 	while($rows=mysqli_fetch_assoc($res))
			// 	{
			// 		$from1[$j]=$rows['from_email'];
			// 		$to1[$j]=$rows['to_email'];
			// 		$msgmain[$j]=$rows['msg'];
			// 		// echo "$from1[$j]";
			// 		$j=$j+1;
			// 	}
			// ?>
		
	
	</script>
	<?php
		$indexfor1=0;

	?>
	<script type="text/javascript">
		var u_eml=[];
		var n=parseInt(<?php echo $it2 ?>);
		var i=0;
		while(i<n)
		{
			<?php for($x=0;$x<$it;$x++){ ?>
				u_eml[i]="<?php echo $user_email[$x] ?>";
		        i++;
		    <?php } ?>
		    i++;
		}
		u_eml.sort();
		function searching(){
			console.log("hi");
			// var sub="";
			// var str="";
			// var s=document.getElementById('search').value.toUpperCase();
			// var lengthofs=s.length;
			// // sub=(s.substr(0,s.length-1)).toUpperCase;
			// for(var i=0;i<n;i++){
			// 	str=u_eml[i];
			// 	if((str.substr(0,lengthofs-1)).toUpperCase()==s){
			// 		console.log(u_eml[i]);
			// 	}
			// }
		}
		function searchforf(){
			var ser=document.getElementById("search").value;
			// console.log(ser);
			// alert(ser);
			$.post('searchf.php',{'val': ser},function(data){
					if(data!=1){
						document.getElementById('search').style.borderColor="red";
						document.getElementById('labl').innerHTML="<br><br>Email Not Found";
					}
					else{
						document.getElementById('search').style.borderColor="#809fff";
						document.getElementById('labl').innerHTML="";

						chatfunc(ser);
					}
			})
		}
	</script>

	<script type="text/javascript">
		
	</script>
	<script type="text/javascript">
		function chatfunc1(){
			document.getElementById('pm').style.height='50px';
			document.getElementById('mes').innerHTML='Messages';
			document.getElementById('x').style.display="none";

		}
		// $('#but').click(function(){
		// 	$('#rw1').submit();
		// 	document.getElementById('pm').style.height='400px';
		// 	document.getElementById('pm').style.width='300px';
		// })
	</script>
	<script type="text/javascript">
		// $('#but').click(function(){
		// 	var t=$('#t').val();
		// 	// alert(t);
		// 	if(t.length==0){
		// 		$('#t').css('border-color','#ffc2b3');
		// 		$('#t').css('box-shadow','0 0 10px #ffc2b3');
		// 	}
		// 	else{
		// 		$('#t').css('border-color','grey');
		// 		$('#t').css('box-shadow','0 0 10px white');
		// 		// $('#chating').append('<span class="chat" id="chat"><span><br>');
		// 		// var chat=document.createElement('div');
		// 		// // var b=document.createElement('br');
		// 		// chat.setAttribute("id",'ch');
		// 		// chat.setAttribute("class",'ch');
		// 		// chat.innerHTML="<span id='spanchat'>"+t+"</span>";
		// 		// $('#chating').append(chat);
		// 		// $('#chating').append(b);
		// 		$.post( 'post1.php', { 'val': t , 'val1': password },
		// 	      // function( data ) {
		// 	      //     window.console && console.log(data);
		// 	      //     // alert(txt+"exists");
		// 	      //     if(data!=1)
		// 	      //     {
		// 	      //     	alert('Invalid email or password');
		// 	      //     	$('#loginemail').css('border-bottom-color','red');
		// 	      //     }
		// 	      //     else
		// 	      //     {
		// 	      //     	$('#loginemail').css('border-bottom-color','#47d147');
		// 	      //     	form.submit();
		// 	      //     }
		// 	      // }
		//    	 	)
		// 		}
		// })
	</script>
	<script type="text/javascript">

	</script>
</body>

</html>