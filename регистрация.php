<?php
session_start();
$dbc = mysqli_connect('localhost', 'root' ,'', 'loginuser');
if (isset($_POST['submit'])) 
{
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2))
	{
		$query = "SELECT * FROM `registration` WHERE name = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0)
		{
			$_SESSION['avtorisation'] = "true";
			$query = "INSERT INTO `registration` (name, password) VALUES ('$username', '$password2')";
			mysqli_query($dbc, $query);	
			mysqli_close($dbc);
			$_SESSION['avtorisation'] = "true";
	 		$_SESSION['nick'] = $username;
			header('Location:  главная.php');
			exit();
		}
		else
		{
			echo " <script> alert(\"Пользователь уже зарегестрирован\"); </script>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet"  href="style_avtor.css">
	<title>Вход</title>
</head>
<body>
	<content>
		<center>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
			<label for="username" class="label2">Введите логин: </label>
			<input type="text" name="username"> 
			<label for="username">Введите пароль:</label>
			<input type="password" name="password1"> 
			<label for="username">Повторите пароль:</label>
			<input type="password" name="password2">  
			<button type="submit"  name="submit">Зарегистрироваться</button>
			</form>
		</center>
	</content>
</body>
</html>