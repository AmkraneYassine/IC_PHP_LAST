<?php
//test
class GumballMachine{

	private $gumballs;
	
	private $bdd;
	
	function __construct()
	{
	    try
	    {
	        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        print "Yes Dans le constructeur de BaseClass\n";
	    }
	    
	    catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	}


	// Get the amount of gumballs still in the machine
	public function getData()
	{
	    try
	    {
	        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        print "Yes Dans le constructeur de BaseClass\n";
	    }
	    
	    catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	    return $this->$bdd;
	}

	// Set the amount of gumballs in the machine
	public function setGumballs($amount){
		$this->gumballs = $amount;
	}

	// The user turns the wheel, machine dispenses gumball!
	public function turnWheel(){
		$this->setGumballs($this->getGumballs() - 1);
	}
	public function InsertP($bdd, $nom, $prenom , $date_naissance,$lieu)
	{
	    $sql = "INSERT INTO prof (nom, prenom, data_naissance, lieu_naissance) VALUES (?,?,?,?)";
	    
	    $stmt= $bdd->prepare($sql);
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
