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

    public function getDB()
    {
        return $this->bdd;
    }
	public function setGumballs($amount)
	{
		$this->gumballs = $amount;
	}

	
	public function turnWheel()
	{
		$this->setGumballs($this->getGumballs() - 1);
	}
	
	//Inserion dans la table Prof 
	public function InsertP($bdd, $nom, $prenom , $date_naissance,$lieu)
	{  
	    try 
	    {
	       //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('$nom','$prenom', '$date_naissance','$lieu')";
	       $bdd->exec($sql);
	       echo "New Prof Insert";
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	    }
	    
	}
	
	public function GetIdP($nom,$prenom)
	{
	    $stmt = $this->bdd->prepare("select id from prof where nom=? and prenom=?");
	    $stmt->execute([$nom,$prenom]); 
	    $user = $stmt->fetch();
	    return $user['id'];
	}
	
	//Insertion dans la table Cours
	public function InsertC($bdd, $intitule, $duree , $id_prof)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "INSERT INTO cours (intitule, duree, id_prof) VALUES ('$intitule','$duree', '$id_prof')";
	        $bdd->exec($sql);
	        echo "New Cours insert";
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	    }
	    
	}
	
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
