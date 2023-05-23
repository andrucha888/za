<?php
	header('Content-type: text/html; charset=utf-8');
	include('XML.php');
	if(isset($_POST["log_in"]))
	{
		$login=$_POST["login"];
		$password=$_POST["password"];
		if(!file_exists("Datafiles/UserDataFilesResourceXML/$login.xml"))
	    {
			echo '<script>У вас нет доступа на этот сайт</script>';
		}
		else
		{
			$xml = new XML();
			$xml->XML_Load($login);
			if(($login==$xml->login)&&($password==$xml->password))
		    {
				if($xml->pet_reg=="No") echo "<script>document.location.href = 'pets.php?login=$xml->login&password=$xml->password';</script>"; 
				else echo "<script>document.location.href = 'main.php?login=$xml->login&password=$xml->password';</script>";
				exit();
			}
			else echo '<script>Неправильный логин или пароль</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Питомцы</title>
		<link rel="stylesheet" href="Styles/style.css">
	</head>
	<body style="background-color: rgb(250,237,208); margin: 0 auto;">
		<div style="width: 404px; margin: -5px auto; background-color: rgb(249,223,165); text-align: center;">
			<div style="padding-top: 10px;"> 
				<div style="border: 2px solid rgb(233,157,83); width: 376px; border-radius: 13px; margin: 6px; padding: 6px; background-color: white; text-align: center;">
					<img src="Images/welcome.png">
					<form><button class="button-start-game" formmethod="POST">Начать игру</button></form>
					<label>Привет! Я твой питомец, люби и ухаживай за мной и я отплачу тебе любовью, преданностью и победами на выставках!</label>
					<br><br>
				</div>
				<div style="border: 2px solid rgb(233,157,83); width: 376px; border-radius: 13px; margin: 6px; padding: 6px; background-color: white; text-align: center;">
					<form method="POST">
						<label>Логин:</label><br>
						<input type="text" name="login" style="width: 168px; height: 15px"><br>
						<label>Пароль:</label><br>
						<input type="password" name="password" style="width: 168px; height: 15px"><br>
						<button class="button-log-in" formmethod="POST" name="log_in">Войти</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>