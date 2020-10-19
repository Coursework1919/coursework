<?php  
	session_start();
	header('Content-Type: charset = utf-8'); 
	header('Content-Type: application/pdf');
	$b = $_SESSION['note'];
	echo "$b";
?>