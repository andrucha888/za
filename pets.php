<?php
	header('Content-type: text/html; charset=utf-8');
	$login=$_GET["login"];
	$password=$_GET["password"];
	include('XML.php');
	//-----------------------------------------------------------------------------
	if(isset($_POST["Kitty"]))
	{
	    $xml = new XML();
		$xml->XML_Load($login);
		$xml->pet_class = "Kitty";
		$xml->pet_reg = "Yes";
		$xml->XML_Save($login);
		echo "<script>document.location.href = 'main.php?login=$xml->login&password=$xml->password';</script>";
		exit();
		unset($xml);
	}
	//------------------------------------------------------------------------------
	if(isset($_POST["Kitten"]))
	{
	    $xml = new XML();
		$xml->XML_Load($login);
		$xml->pet_class = "Kitten";
		$xml->pet_reg = "Yes";
		$xml->XML_Save($login);
		echo "<script>document.location.href = 'main.php?login=$xml->login&password=$xml->password';</script>";
		exit();
		unset($xml);
	}
	//------------------------------------------------------------------------------
	if(isset($_POST["Puppy"]))
	{
	    $xml = new XML();
		$xml->XML_Load($login);
		$xml->pet_class = "Puppy";
		$xml->pet_reg = "Yes";
		$xml->XML_Save($login);
		echo "<script>document.location.href = 'main.php?login=$xml->login&password=$xml->password';</script>";
		exit();
		unset($xml);
	}
	//------------------------------------------------------------------------------
	if(isset($_POST["Doggy"]))
	{
	    $xml = new XML();
		$xml->XML_Load($login);
		$xml->pet_class = "Doggy";
		$xml->pet_reg = "Yes";
		$xml->XML_Save($login);
		echo "<script>document.location.href = 'main.php?login=$xml->login&password=$xml->password';</script>";
		exit();
		unset($xml);
	}
	if(file_exists("Datafiles/UserDataFilesResourceXML/$login.xml"))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		if(($login==$xml->login)&&($password==$xml->password))
		{
			echo '<!DOCTYPE html>'."\n".
				 '<html>'."\n".
				 '<head>'."\n".
				 '<title>Питомцы</title>'."\n".
				 '<link rel="stylesheet" href="Styles/style.css">'."\n".
				 '</head>'."\n".
				 '<body style="background-color: rgb(250,237,208); margin: 0 auto;">'."\n".
				 '<div style="width: 404px; margin: 0 auto; background-color: rgb(249,223,165); text-align: center;">'."\n".
				 '<div style="border: 2px solid rgb(233,157,83); width: 376px; height: 20px; border-radius: 13px; margin: 6px; padding: 6px; background-color: rgb(250,237,208);">'."\n".
				 '<label style="color: rgb(203,111,0); font-size: 14pt;">Выбери своего питомца</label>'."\n".
				 '</div>'."\n".
				 '<div style="border: 2px solid rgb(233,157,83); width: 376px; height: 425px; border-radius: 13px; margin: 6px; padding: 6px; background-color: white; text-align: center;">'."\n".
				 '<table border="0" style="width: 376px; text-align: center;">'."\n".
				 '<tbody>'."\n".
				 '<tr>'."\n".
				 '<td align="right" style="padding: 2"><img src="Images/avatar0.png"></td>'."\n".
				 '<td align="left" style="padding: 2"><img src="Images/avatar1.png"></td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
				 '<td align="center"><form><button formmethod="POST" name="Kitty">Кошечка</button></form></td>'."\n".
				 '<td align="center"><form><button formmethod="POST" name="Kitten">Котенок</button></form></td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
				 '<td align="right" style="padding: 2"><img src="Images/avatar12.png"></td>'."\n".
				 '<td align="left" style="padding: 2"><img src="Images/avatar13.png"></td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
			     '<td align="center"><form><button formmethod="POST" name="Puppy">Щенок</button></form></td>'."\n".
				 '<td align="center"><form><button formmethod="POST" name="Doggy">Собачка</button></form></td>'."\n".
				 '</tr>'."\n".
				 '</tbody>'."\n".
				 '</table>'."\n".
				 '</div>'."\n".
				 '</div>'."\n".
				 '</body>'."\n".
				 '</html>';
		}
		unset($xml);
	}
?>