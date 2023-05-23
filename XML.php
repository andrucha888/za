<?php
class XML
{
	public $login, $password, $pet_class, $pet_reg, $beauty, $coin, $heart, $xp, $water, $ball;
	public function XML_Load($login)
	{
		$xml = simplexml_load_file("Datafiles/UserDataFilesResourceXML/$login.xml");
		$this->login = $xml->DATAFILES->login;
		$this->password = $xml->DATAFILES->password;
		$this->pet_class = $xml->DATAFILES->pet->pet;
		$this->pet_reg = $xml->DATAFILES->pet->register;
		$this->beauty = $xml->DATAFILES->pet->beauty;
		$this->coin = $xml->DATAFILES->pet->coin;
		$this->heart = $xml->DATAFILES->pet->heart;
		$this->xp = $xml->DATAFILES->pet->xp;
		$this->water = $xml->DATAFILES->items->water;
		$this->ball = $xml->DATAFILES->items->ball;
	}
	public function XML_Save($login)
	{
		$xml = simplexml_load_file("Datafiles/UserDataFilesResourceXML/$login.xml");
		$xml->DATAFILES->pet->pet = $this->pet_class;
		$xml->DATAFILES->pet->register = $this->pet_reg;
		$xml->DATAFILES->pet->beauty = $this->beauty;
		$xml->DATAFILES->pet->coin = $this->coin;
		$xml->DATAFILES->pet->heart = $this->heart;
		$xml->DATAFILES->pet->xp = $this->xp;
		$xml->DATAFILES->items->water = $this->water;
		$xml->DATAFILES->items->ball = $this->ball;
		file_put_contents("Datafiles/UserDataFilesResourceXML/$login.xml",$xml->asXML());
	}
}
?>