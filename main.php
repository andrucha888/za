<?php
    header('Content-type: text/html; charset=utf-8');
	$login=$_GET["login"];
	$password=$_GET["password"];
	include('XML.php');
	include('func.php');
	//-----------------------------------------------------
	if(isset($_POST["fish"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		$xml->beauty += 1;
		$xml->xp += 1; 
		$xml->heart += 1;
		$xml->XML_Save($login);
		unset($xml);
	}
	//----------------------------------------------------------------
	if(isset($_POST["water_buy"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		if($xml->coin>=5)
		{
			$xml->coin -= 5;
			$xml->water += 1;
			$xml->XML_Save($login);
		} else echo '<script>alert("У вас недостаточно средств")</script>';
		unset($xml);
	}
	//--------------------------------------------------------------
	if(isset($_POST["water_use"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		$xml->beauty += 1;
		$xml->xp += 2; 
		$xml->heart += 2;
		$xml->XML_Save($login);
		unset($xml);
	}
	//--------------------------------------------------------------
	if(isset($_POST["hand"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		$xml->beauty += 1;
		$xml->xp += 1; 
		$xml->heart += 1;
		$xml->XML_Save($login);
		unset($xml);
	}
	//--------------------------------------------------------------
	if(isset($_POST["ball_buy"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		if($xml->coin>=5)
		{
			$xml->coin -= 5;
			$xml->ball += 1;
			$xml->XML_Save($login);
		} else echo '<script>alert("У вас недостаточно средств")</script>';
		unset($xml);
	}
	//--------------------------------------------------------------
	if(isset($_POST["ball_use"]))
	{
		$xml = new XML();
		$xml->XML_Load($login);
		$xml->beauty += 1;
		$xml->xp += 2; 
		$xml->heart += 2;
		$xml->XML_Save($login);
		unset($xml);
	}
	//--------------------------------------------------------------
	if(file_exists("Datafiles/UserDataFilesResourceXML/$login.xml"))
	{
		$xml = new XML();
		$pets = new Pets();
		$xml->XML_Load($login);
		$array = $pets->Pets_Load_level($xml->xp);
		/* $array[0] = lvl; $array[1] = xp_min;	$array[2] = xp_lim	*/
		$proc_prog = round(($array[1]/$array[2])*100);
		if($proc_prog>100) $proc_prog=100;
		//Далее проверяем уровень и если он есть добавляем предмет "Вода"
		if($array[0]>=3)
		{
			if($xml->water>0) $button_a = '<button formmethod="POST" name="water_use">Напоить</button>';
			else $button_a = '<button formmethod="POST" name="water_buy" style="width: 116px;">Купить (<img src="Images/coin.png">5)</button>';
			//------------------------------------------------------------------------------------------------------------------------------
			$a = '<tr>'."\n".'<td width="62" height="62" rowspan="2"><img src="Images/water.png"></td>'."\n".
			'<td colspan="2" class="item-korm">Вода</td>'."\n".'</tr>'."\n".
			'<tr>'."\n".'<td><img src="Images/beauty.png"> +1 | <img src="Images/exp.png"> +2 | <img src="Images/heart.png"> +2</td>'."\n".
			'<td><form>'.$button_a.'</form></td>'."\n".'</tr>'."\n";
		}
		//Далее проверяем уровень и если он есть добавляем предмет "Мячик"
		if($array[0]>=5)
		{
			if($xml->ball>0) $button_b = '<button formmethod="POST" name="ball_use">Играть</button>'; 
			else $button_b = '<button formmethod="POST" name="ball_buy" style="width: 116px;">Купить (<img src="Images/coin.png">5)</button>';
			//------------------------------------------------------------------------------------------------------------------------------
			$b = '<tr>'."\n".'<td width="62" height="62" rowspan="2"><img src="Images/ball.png"></td>'."\n".
			'<td colspan="2" class="item-korm">Мячик</td>'."\n".'</tr>'."\n".'<tr>'."\n".
			'<td><img src="Images/beauty.png"> +1 | <img src="Images/exp.png"> +2 | <img src="Images/heart.png"> +2</td>'."\n".
			'<td><form>'.$button_b.'</form></td>'."\n".'</tr>'."\n";
		}
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if(($login==$xml->login)&&($password==$xml->password))
		{
			echo '<!DOCTYPE html>'."\n".
				 '<html>'."\n".
				 '<head>'."\n".
				 '<title>Питомцы</title>'."\n".
				 '<link rel="stylesheet" href="Styles/style.css">'."\n".
				 '</head>'."\n".
			     '<body style="background-color: rgb(250,237,208); margin: 0 auto;">'."\n".
				 '<div style="width: 404px; height: 700px; margin: 0px auto; background-color: rgb(249,223,165); text-align: center">'."\n".
				 '<table border="1" style="width: 400px; text-align: center; margin: 0px 2px; border-collapse: collapse; border: 1px solid rgb(177,71,0);">'."\n".
				 '<tbody>'."\n".
				 '<tr>'."\n".
				 '<td align="center" width="100" height="100" rowspan="2">'.$pets->Pets_Load_IMG($xml->pet_class).'</td>'."\n".
				 '<td align="center" colspan="2"><img src="Images/beauty.png"> '.$xml->beauty.' | <img src="Images/coin.png"> '.$xml->coin.' | <img src="Images/heart.png"> '.$xml->heart.'</td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
				 '<td align="center" width="51"><img src="Images/up.png">'.$array[0].'</td>'."\n".
				 '<td align="center">'."\n".
				 //border-radius: 8px;
				 '<div style="width: 220px; height: 20px; border: 1px solid rgb(177,71,0); text-align: left;">'."\n".
				 //Выводим проценты
				 '<center style="position: absolute; margin: 1px 0 0 95px;" id="interest">'.$proc_prog.'% ('.$array[1].'/'.$array[2].')</center>'."\n".
				 //Выводим полосу прогресса
				 '<img id="progress" style="width: '.($proc_prog*2.2).'px; height: 20px;" src="Images/prograss.jpg">'."\n".
				 '</div>'."\n".
				 '</td>'."\n".
				 '</tr>'."\n".
				 '</tbody>'."\n".
				 '</table>'."\n".
				 '<br>'."\n".
				 '<table border="1" style="width: 400px; text-align: center; margin: 0 2px; border-collapse: collapse; border: 1px solid rgb(177,71,0);">'."\n".
				 '<thead><caption class="item-korm">=================Еда=================</caption></thead>'."\n".
				 '<tbody>'."\n".
				 '<tr>'."\n".
				 '<td width="62" height="62" rowspan="2"><img src="Images/fish.png"></td>'."\n".
				 '<td colspan="2" class="item-korm">Минтай</td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
				 '<td><img src="Images/beauty.png"> +1 | <img src="Images/exp.png"> +1 | <img src="Images/heart.png"> +1</td>'."\n".
				 '<td><form><button formmethod="POST" style="width: 100px" name="fish">Накормить</button></form></td>'."\n".
				 '</tr>'."\n".$a.//предмет вода
				 '</tbody>'."\n".
				 '</table>'."\n".
				 '<br>'."\n".
				 '<table border="1" style="width: 400px; text-align: center; margin: 0 2px; border-collapse: collapse; border: 1px solid rgb(177,71,0);">'."\n".
				 '<thead><caption class="item-korm">=================Игра=================</caption></thead>'."\n".
				 '<tbody>'."\n".
				 '<tr>'."\n".
				 '<td width="62" height="62" rowspan="2"><img src="Images/hand.png"></td>'."\n".
				 '<td colspan="2" class="item-korm">Рука</td>'."\n".
				 '</tr>'."\n".
				 '<tr>'."\n".
				 '<td><img src="Images/beauty.png"> +1 | <img src="Images/exp.png"> +1 | <img src="Images/heart.png"> +1</td>'."\n".
				 '<td><form><button formmethod="POST" style="width: 100px" name="hand">Погладить</button></form></td>'."\n".
				 '</tr>'."\n".$b.//предмет мячик
				 '</tbody>'."\n".
			     '</table>'."\n".
			     '<br>'."\n".
				 '<form method="POST">'."\n".
				 '<button class="but" name="shop">Магазин</button><br>'."\n".
				 '<button class="but" name="my_pet">Мой питомец</button><br>'."\n".
				 '<button class="but" name="home">На главную</button>'."\n".
				 '<button class="but" name="chat">Чат</button>'."\n".
			     '</form>'."\n".
				 '</div>'."\n".
				 '</body>'."\n".
				 '</html>';
		}
		unset($xml);
		unset($pets);
	}	
?>