<?php
session_start();
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
			<form method="POST" action="текстпоиск.php"> 
				<input type="text" name="search2" class="search2" value=" Поиск " >
				<button class="buttonsearch2" > Найти </button>
			</form>
			<div class="blocknew"> <br>  Последние обновления  <br> </div>	<br> <br>
			<button class="button_note" name="button_note1"  onclick="window.location.href = 'текстБД1.php'"> 
				<?php 
				  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
				  $query = "SELECT COUNT(*) FROM `songs`";
				  $count = mysqli_query($dbc, $query);
				  $c = mysqli_fetch_array($count);	
				  $query1 = "SELECT * FROM `songs` WHERE songs_id = $c[0]";
				  $data = mysqli_query($dbc, $query1);
				  $row = mysqli_fetch_row($data);
				  echo "<h3> $row[1] - $row[2]</h3>";	
				?>	
			</button> 

			<button class="button_note" name="button_note2"  onclick="window.location.href = 'текстБД2.php'"> 
				<?php 
				  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
				  $query = "SELECT COUNT(*) FROM `songs`";
				  $count = mysqli_query($dbc, $query);
				  $c = mysqli_fetch_array($count);	
				  $query1 = "SELECT * FROM `songs` WHERE songs_id = $c[0]-1";
				  $data = mysqli_query($dbc, $query1);
				  $row = mysqli_fetch_row($data);
				  echo "<h3> $row[1] - $row[2]</h3>";	
				?>	
			</button>

			<button class="button_note" name="button_note3"  onclick="window.location.href = 'текстБД3.php'"> 
				<?php 
				  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
				  $query = "SELECT COUNT(*) FROM `songs`";
				  $count = mysqli_query($dbc, $query);
				  $c = mysqli_fetch_array($count);	
				  $query1 = "SELECT * FROM `songs` WHERE songs_id = $c[0]-2";
				  $data = mysqli_query($dbc, $query1);
				  $row = mysqli_fetch_row($data);
				  echo "<h3> $row[1] - $row[2]</h3>";	
				?>	
			</button>

			<div class="blok_commentы">
			</div>			
			<div style="clear: both;" ></div>
		</div>
  	</div>
</body>
</html>