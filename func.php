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
		
			�������� ���� �� �������: e^lvl + lvl � ����������� round �� ������ �����.
		
			������� � 2 ����� ���������� � ��� ��������� ���������� ��... ����� ����� ������� � ����, ��� ���� ����� ������� ���� �� ������� ����� �����, � ������� ����������
			������ ������ = xp_lim + ������ �����. 2 ������� = 4... �� ��� �� ������ ����������... ����� �� ���� � ��� ����� � progressbar ������ ����� ����:
			xp = xp - 4; xp_lim = 9; �� �������� �������� 0 �� 9... ������������� ���... 4 �� 13 ���������� (xp � ��� � ��� ���� � �������, �� ��� �� ������ �������... � ���������� xp_lim+4)
			�������� 3 �������: xp = xp - 13; xp_lim = 23; ��� ��� ����� 13... � ��� �������� ������ �� 0 �� 23... �� � ������� ������ ������ ���� ���: 13 �� 23+���... ��� xml->xp �� xp_lim+���
			�������� 4 �������: � ��� � ���� ����� xp = 36, ��� ����� �������� 0... �� ������ ���������: xp = xp - 36; �������� 0... ��� ����� ���������� 59, �� ��� �������� �� 0 �� 59.. 
			�� ���� � ��� ������� ������ ���� �����: xml->xp �� 59+36 (�����+���)... �� ���� 36 �� 95
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