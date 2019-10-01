<?php
//test
class GumballMachine
{

	private $gumballs;
	
	private $bdd;
	
	function __construct()
	{
	    try
	    {
	        $this->bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        print "Yes Dans le constructeur de BaseClass\n";
	    }
	    
	    catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	}


	public function setGumballs($amount)
	{
		$this->gumballs = $amount;
	}

	
	public function turnWheel()
	{
		$this->setGumballs($this->getGumballs() - 1);
	}
	public function InsertP( $nom, $prenom , $date_naissance,$lieu)
	{  
	    $this->bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	    $sql = "INSERT INTO prof (nom, prenom, data_naissance, lieu_naissance) VALUES (?,?,?,?)";
	    $stmt= $this->$bdd->prepare($sql);
	    $stmt->execute([$nom, $prenom, $date_naissance, $lieu]);
	    
	}
	
	// Set the amount of gumballs in the machine
	public function UpdateP()
	{
	    //$this->gumballs = $amount;
	}
	
	// The user turns the wheel, machine dispenses gumball!
	public function DeleteP()
	{
	    //$this->setGumballs($this->getGumballs() - 1);
	}
}
