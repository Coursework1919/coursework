<?php  
	session_start();
	$b = $_POST['search2'];  
	$avt = $_SESSION['avtorisation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet"   href="style14.css">
	<title>ноты для фортепиано</title>
</head>
<body>
<div id="glaw">
		<div class="blok1">
			<a href="главная.php" class="dreamsongs">DreamSongs</a>
	    	<button class="button1" onclick="window.location.href = 'ноты.php'">  Ноты для фортипиано </button>
	    	<button class="button2" onclick="window.location.href = 'аккорды.php'"> Аккорды для гитары </button>
	    	<button class="button3"  onclick="window.location.href = 'текстыпесен.php'"> Тексты песен </button>
			<?php
				if ($avt == "true")
				{
					?> 
						<button class="button5" onclick=""><?php echo "$_SESSION[nick]"; ?></button> 
						
					<?php  
				}

				else ?> <button class="button4" onclick="window.location.href = 'авторизация.php'">Вход / регистрация</button> <?php
			?>	    			</div>

		<div class="blok2">
			<form method="POST" action="нотыпоиск.php"> 
				<input type="text" name="search2" class="search2" value=" Поиск " >
				<button class="buttonsearch2" > Найти </button>
			</form>
			<div class="blocknew"> <br>  Последние обновления  <br> </div>	<br> <br>

			<form method="POST" action="нотыБД.php"> 
			<button class="button_note_search" name="button_note1"  > 
				<?php 
				  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
				  $query = "SELECT * FROM  `note` WHERE artist_name LIKE '%$b%' OR song_name LIKE '%$b%'";
				  $data = mysqli_query($dbc, $query);
				  $query1 = "SELECT COUNT(*)  FROM  `note` WHERE artist_name LIKE '%$b%' OR song_name LIKE '%$b%'";
				  $data1 = mysqli_query($dbc, $query);	
				  $row = mysqli_fetch_row($data); 
				  echo "<h3> $row[1] - $row[2]</h3>";
				  $_SESSION['note']	= $row[3];			  
				?>	
			</button> 
		</form>
			<div class="blok_commentы">
			</div>			
			<div style="clear: both;" ></div>
		</div>
  	</div>
</body>
</html>