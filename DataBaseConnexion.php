<?php
//test
class DataBaseConnexion 
{

	private $gumballs;
    private $bdd;
    
    function __construct()
    {
    	try
    	{
    	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    	    print "Dans le constructeur de BaseClass\n";
    	}
    	
    	catch (Exception $e)
    	{
    	    die('Erreur : ' . $e->getMessage());
    	}
    }
	// Get the amount of gumballs still in the machine
	public function InsertE($nom, $prenom , $data_naissance,$lieu)
	{
		return true;
	}

	// Set the amount of gumballs in the machine
	public function UpdateE()
	{
		//$this->gumballs = $amount;
	}

	// The user turns the wheel, machine dispenses gumball!
	public function DeleteE()
	{
		//$this->setGumballs($this->getGumballs() - 1);
	}
}
