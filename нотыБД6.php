<?php 
	  header('Content-Type: charset = utf-8'); 
	  header('Content-Type: application/pdf'); 
	
	  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
	  $query = "SELECT COUNT(*) FROM `note`";
	  $count = mysqli_query($dbc, $query);
	  $c = mysqli_fetch_array($count);	
	  $query1 = "SELECT * FROM `note` WHERE note_id = $c[0]-5";
	  $data = mysqli_query($dbc, $query1);
	  $row = mysqli_fetch_row($data);
	  echo "$row[3]";	
?>
