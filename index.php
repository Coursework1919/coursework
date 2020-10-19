<?php
session_start();
$avt = $_SESSION['avtorisation'];
// $_SESSION['avtorisation'] = "false";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet"   href="style14.css">
		
	<title>главная</title>
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
			?>
<!-- 			<button class="button4" onclick="window.location.href = 'авторизация.php'">Вход / регистрация</button> 
 -->	    	

	    </div>
		<div class="blok2">
			<div class="blok3">
				<h3>  Последние обновления:  </h3>

				<h4> Для гитары: </h4>
				<a href="аккордыБД1.php" class="hrefmain">
						<?php 
						  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
						  $query = "SELECT COUNT(*) FROM `chords`";
						  $count = mysqli_query($dbc, $query);
						  $c = mysqli_fetch_array($count);	
						  $query1 = "SELECT * FROM `chords` WHERE chords_id = $c[0]";
						  $data = mysqli_query($dbc, $query1);
						  $row = mysqli_fetch_row($data);
						  echo "<h3> $row[1] - $row[2]</h3>";
						  
						?>
				</a>

				<a href="аккордыБД2.php" class="hrefmain">
						<?php 
							  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
							  $query = "SELECT COUNT(*) FROM `chords`";
							  $count = mysqli_query($dbc, $query);
							  $c = mysqli_fetch_array($count);	
							  $query1 = "SELECT * FROM `chords` WHERE chords_id = $c[0]-1";
							  $data = mysqli_query($dbc, $query1);
							  $row = mysqli_fetch_row($data);
							  echo "<h3> $row[1] - $row[2]</h3>";
						  
						?>
				</a>
					<h4>Для фортепиано:</h4>							
				<a href="нотыБД1.php" class="hrefmain">
						<?php 
							  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
							  $query = "SELECT COUNT(*) FROM `note`";
							  $count = mysqli_query($dbc, $query);
							  $c = mysqli_fetch_array($count);	
							  $query1 = "SELECT * FROM `note` WHERE note_id = $c[0]";
							  $data = mysqli_query($dbc, $query1);
							  $row = mysqli_fetch_row($data);
							  echo "<h3> $row[1] - $row[2]</h3>";	
						?>
				</a>

				<a href="нотыБД2.php" class="hrefmain">
						<?php 
							  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
							  $query = "SELECT COUNT(*) FROM `note`";
							  $count = mysqli_query($dbc, $query);
							  $c = mysqli_fetch_array($count);	
							  $query1 = "SELECT * FROM `note` WHERE note_id = $c[0]-1";
							  $data = mysqli_query($dbc, $query1);
							  $row = mysqli_fetch_row($data);
							  echo "<h3> $row[1] - $row[2]</h3>";	
						?>
				</a>														

				<h4>Тексты:</h4>	
				<a href="текстБД1.php" class="hrefmain">
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
				</a>
				<a href="текстБД2.php" class="hrefmain">
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
				</a>
				<br>

			</div>
			<div class="blok4"> 
		  NEW!			
				<?php
				  $dbc = mysqli_connect('localhost', 'root' ,'', 'site');
				  $query = "SELECT COUNT(*) FROM `songs`";
				  $count = mysqli_query($dbc, $query);
				  $c = mysqli_fetch_array($count);	
				  $query1 = "SELECT * FROM `songs` WHERE songs_id = $c[0]";
				  $data = mysqli_query($dbc, $query1);
				  $row = mysqli_fetch_row($data);
				  echo "<h3> $row[1] - $row[2]</h3>";
				  echo "$row[3]";			
				?>
				<br>
			</div>
			<div class="blok_commentы">
				<h3>Комментарии</h3> <br> <br>
				<div class="container">
				<div class="row">
					<div class="col-lg-12"></div>

			<div class="col-lg-6">
				<div id="comment-field"></div>
			</div>

			<div class="col-lg-6">
				<form >
					<div class="form-group">
						<!-- <label for="comment-name">Name:</label> -->
						<input type="name" class="form-control" id="comment-name" placeholder="<?php echo "$_SESSION[nick]"; ?>" value = "<?php echo "$_SESSION[nick]"; ?>"> 
					</div>

					<div class="form-group">
						<!-- <label for="comment-body">Comment:</label> -->
						<input type="name" class="form-control" id="comment-body" placeholder="Ваш комментарий">
					</div>

					<div class="form-group text-right">
						<button type="submit" id="comment-add" class="btn btn-primary">Отправить</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="1.js"></script> <br> <br> <br>
			</div>			
			<div style="clear: both;" ></div>
		</div>
  	</div>
</body>
</html>