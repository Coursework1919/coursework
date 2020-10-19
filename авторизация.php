<?php 
session_start();
$dbc =  mysqli_connect('localhost', 'root', '', 'loginuser');
if (isset($_POST['submit'])) 
{
	 $username_authorization = mysqli_real_escape_string($dbc, trim($_POST['username']));
	 $password_authorization = mysqli_real_escape_string($dbc, trim($_POST['password']));
	if (!empty($username_authorization) && !empty($password_authorization)) 
	{
	 	$query = "SELECT `user_id` , `name` FROM  `registration` WHERE name = '$username_authorization' AND password = '$password_authorization'";
	 	$data = mysqli_query($dbc, $query);
	 	if (mysqli_num_rows($data) == 1)
	 	{
	 		$row = mysqli_fetch_assoc($data);
	 		if (!isset($_COOKIE['user_id']))
	 		{
	 			setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
		 		setcookie('name', $row['name'], time() + (60*60*24*30));
	 		}	
	 		$_SESSION['avtorisation'] = "true";
	 		$_SESSION['nick'] = $username_authorization;
	 		header('Location:  главная.php');
	 		exit();
	 	} 
	 	else
	 	{
	 		echo " <script> alert(\"Неверный логин или пароль\"); </script>";
	 	}
	}
	else
	{
 		echo " <script> alert(\"Заполните все поля\"); </script>";
 	}
	 
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet"  href="style_avtor.css">
	<title>Авторизация</title>
</head>
<body>
	<content>
		<center>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<label for="username" class="label1">Логин: </label>
				<input  type="text" name="username"> 
				<label for="username">Пароль:</label>
				<input type="password" name="password">  
				<button type="submit"  name="submit">Вход</button> <br> <br>
				<a href="регистрация.php" class="hrefregistration">Регистрация</a>	
			</form>
		</center>
	</content>
</body>
</html>


