<?php
	session_start();
	session_destroy();
	header('location:tologin.php');
	
?>