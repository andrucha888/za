<?php
class Pets
{
	public function Pets_Load_IMG($pets)
	{
		if($pets=="Kitty") $img = '<img src="Images/avatar0.png" style="width: 78px; height: 100px;">';
		if($pets=="Kitten") $img = '<img src="Images/avatar1.png" style="width: 78px; height: 100px;">';
		if($pets=="Puppy") $img = '<img src="Images/avatar12.png" style="width: 78px; height: 100px;">';
		if($pets=="Doggy") $img = '<img src="Images/avatar13.png" style="width: 78px; height: 100px;">';
		return $img;
	}
	public function Pets_Load_level($xp)
	{
		/*if(($xp>=0)&&($xp<4)) {$lvl = 1; $xp_lim=4;}
		if(($xp>=4)&&($xp<9)) {$lvl = 2; $xp_lim=9;}
		if(($xp>=9)&&($xp<23)){$lvl = 3; $xp_lim=23;} 
		if(($xp>=23)&&($xp<59)) {$lvl = 4; $xp_lim=59;}
		if(($xp>=59)&&($xp<153)) {$lvl = 5; $xp_lim=153;}
		if(($xp>=153)&&($xp<409)) {$lvl = 6; $xp_lim=409;}
		if(($xp>=409)&&($xp<1104)) {$lvl = 7; $xp_lim=1104;}
		if(($xp>=1104)&&($xp<2989)) {$lvl = 8; $xp_lim=2989;}
		if(($xp>=2989)&&($xp<8112)) {$lvl = 9; $xp_lim=8112;}
		if(($xp>=8112)) {$lvl = 10; $xp_lim=22036;}
		
			считался опыт по формуле: e^lvl + lvl с округлением round до целого цисла.
		
			начиная с 2 левла отнимается у нас некоторое количество хр... чтобы точно попасть в левл, нам надо знать сколько было на прошлом левле опыта, и сколько предельное
			начало уровня = xp_lim + начало этого. 2 уровень = 4... но это мы должны перелететь... чтобы не было у нас багов с progressbar делаем такую вещь:
			xp = xp - 4; xp_lim = 9; мы получили интервал 0 до 9... пересчитываем это... 4 до 13 получается (xp у нас и так было в таблице, мы его не меняем никогда... а предельное xp_lim+4)
			разберем 3 уровень: xp = xp - 13; xp_lim = 23; наш шаг равен 13... у нас интервал сейчас от 0 до 23... но в условии значит должно быть так: 13 до 23+шаг... или xml->xp до xp_lim+шаг
			разберем 4 уровень: у нас в базе стоит xp = 36, нам нужно получить 0... мы делаем следующее: xp = xp - 36; получили 0... наш лимит составляет 59, но это интервал от 0 до 59.. 
			то есть у нас условие должно быть такое: xml->xp до 59+36 (лимит+шаг)... то есть 36 до 95
		*/
		if(($xp>=0)&&($xp<4)) {$lvl = 1; $xp_lim=4;}
		if(($xp>=4)&&($xp<13)) {$lvl = 2; $xp -= 4; $xp_lim=9;}
		if(($xp>=13)&&($xp<36)) {$lvl = 3; $xp -= 13; $xp_lim=23;}		
		if(($xp>=36)&&($xp<95)) {$lvl = 4; $xp -=36; $xp_lim=59;}
		if(($xp>=95)&&($xp<248)) {$lvl = 5; $xp -=95; $xp_lim=153;}
		if(($xp>=248)&&($xp<657)) {$lvl = 6; $xp -= 248; $xp_lim=409;}
		if(($xp>=657)&&($xp<1761)) {$lvl = 7; $xp -= 657; $xp_lim=1104;}
		if(($xp>=1761)&&($xp<4750)) {$lvl = 8; $xp-= 1761; $xp_lim=2989;}
		if(($xp>=4750)&&($xp<12862)) {$lvl = 9; $xp -= 4750; $xp_lim=8112;}
		if(($xp>=12862)&&($xp<22036)) {$lvl = 10; $xp -= 12862; $xp_lim=22036;}
		$arr = array($lvl, $xp, $xp_lim);
		return $arr;
	}
}
?>