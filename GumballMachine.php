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
	public function getGumballs(){
		return $this->gumballs;
	}

	// Set the amount of gumballs in the machine
	public function setGumballs($amount){
		$this->gumballs = $amount;
	}

	// The user turns the wheel, machine dispenses gumball!
	public function turnWheel(){
		$this->setGumballs($this->getGumballs() - 1);
	}
}
