<?php
//test
class GumballMachine
{
	private $gumballs;
	
	private $bdd;
	
	/* Paramètre de connexion à la base de données*/
	
	private $servername="192.168.250.3";
	private $db_name="user01_test_php"; //a remplir
	private $db_user="user01"; //a remplir
	private $db_pass="user01"; //a remplir
	
	function __construct()
	{
		/*
		$dbname = "user01_test_php" ;
		$host = "192.168.250.3";
		$root = "user01";
		$root_password = "user01";
	
		try {
			// $this->bdd = new PDO("mysql:host=$host; dbname=$dbname", $root, $root_password);
			$this->bdd->exec("CREATE SCHEMA IF NOT EXISTS `user01_test_php` DEFAULT CHARACTER SET utf8 ; USE `user01_test_php` ;") 
				or die(print_r($this->bdd->errorInfo(), true));
			$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    	$sql="CREATE TABLE  IF NOT EXISTS prof( id INT NOT NULL AUTO_INCREMENT , nom VARCHAR(25) NOT NULL , prenom VARCHAR(25) NOT NULL , date_naissance DATE NOT NULL , lieu_naissance TEXT NOT NULL , PRIMARY KEY (id)) ";
		    	$this->bdd->exec($sql);
		    	$sql="CREATE TABLE  IF NOT EXISTS cours( id INT NOT NULL AUTO_INCREMENT , intitule VARCHAR(50) NOT NULL , duree INT NOT NULL , id_prof INT NOT NULL , PRIMARY KEY (id), FOREIGN KEY (id_prof) REFERENCES prof(id) on delete cascade) ";
		    	$this->bdd->exec($sql);
		}
		catch (PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
	
		
	    try
	    {
		    // "mysql:host=$this->servername;dbname=$this->db_name", $this->db_user, $this->db_pass
		    $this->bdd = new PDO('mysql:host=192.168.250.3;dbname=user01_test_php;charset=utf8', 'user01', 'user01');
		    // print "Yes Dans le constructeur de BaseClass\n";
		    $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql="CREATE TABLE  IF NOT EXISTS prof( id INT NOT NULL AUTO_INCREMENT , nom VARCHAR(25) NOT NULL , prenom VARCHAR(25) NOT NULL , date_naissance DATE NOT NULL , lieu_naissance TEXT NOT NULL , PRIMARY KEY (id)) ";
		    $this->bdd->exec($sql);
		    $sql="CREATE TABLE  IF NOT EXISTS cours( id INT NOT NULL AUTO_INCREMENT , intitule VARCHAR(50) NOT NULL , duree INT NOT NULL , id_prof INT NOT NULL , PRIMARY KEY (id), FOREIGN KEY (id_prof) REFERENCES prof(id)) ";
		    $this->bdd->exec($sql);
		    
	    }
	    
	    catch (Exception $e)
	    {
			die('Erreur : ' . $e->getMessage());
		}
	*/
		
		$db = "user01_test_phpp" ;
		$host = "192.168.250.3";
		$root = "user01";
		$root_password = "user01";
		
		try {
			  $dbh = new PDO("mysql:host=$host", $root, $root_password);
			  $dbh->exec("CREATE DATABASE `$db`;")
			  or die(print_r($dbh->errorInfo(), true));
		}
		catch (PDOException $e) {
   		 die("DB ERROR: " . $e->getMessage());
		}
		
	    try
	    {
		// "mysql:host=$this->servername;dbname=$this->db_name", $this->db_user, $this->db_pass
	        $this->bdd = new PDO('mysql:host=192.168.250.3;dbname=user01_test_phpp;charset=utf8', 'user01', 'user01');
	        //print "Yes Dans le constructeur de BaseClass\n";
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
	
	public function AffichageProf($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from prof");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Last Name: " . $row["nom"]. " First Name: " . $row["prenom"]. " Birth Date: " . $row["date_naissance"]. " birth Place: " . $row["lieu_naissance"] ."\n";
	    }
		return true;
	    
	}
	
	public function AffichageCours($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from cours");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Name: " . $row["intitule"]. " Time: " . $row["duree"]. " Id Prof: " . $row["id_prof"] ."\n";
	    }
		return true;
	    
	}
	
	
	
	//Inserion dans la table Prof 
	public function InsertP($bdd, $nom, $prenom , $date_naissance, $lieu)
	{  
	    try 
	    {
	       //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('$nom','$prenom', '$date_naissance','$lieu')";
	       $bdd->exec($sql);
	       echo "\n We Hae a new insertion of Professor";
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	    
	}
	
	public function GetIdP($nom,$prenom)
	{
	    $stmt = $this->bdd->prepare("select id from prof where nom=? and prenom=? limit 1");
	    $stmt->execute([$nom,$prenom]);
	    $user = $stmt->fetch();
	    return $user['id'];
	}
	public function GetLastIDP()
	{
		try 
	    {
			$stmt = $this->bdd->prepare("select max(id) as maximum from prof");
			$stmt->execute();
			$user = $stmt->fetch();
			return $user['maximum'];
		}
		catch(PDOException $e)
	    {
			return 0;
	    }
		
	}
	public function GetLastIDC()
	{
		try 
	    {
			$stmt = $this->bdd->prepare("select max(id) as maximum from cours");
			$stmt->execute();
			$user = $stmt->fetch();
			return $user['maximum'];
		}
		catch(PDOException $e)
	    {
			return 0;
	    }
	}
	
	//Insertion dans la table Cours
	public function InsertC($intitule, $duree , $id_prof)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "INSERT INTO cours (intitule, duree, id_prof) VALUES ('$intitule','$duree', '$id_prof')";
	        $this->bdd->exec($sql);
	        echo "\n We Have a new insertion of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    } 
	}
	
	public function UpdateP($nom,$prenom,$id)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "update prof set nom='$nom', prenom='$prenom' where id='$id'";
	        $this->bdd->exec($sql);
		echo "\n We Have a new insertion of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	}
	
	public function UpdateC($intitule, $duree)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "update prof set duree='$duree' where intitule='$intitule'";
	        $this->bdd->exec($sql);
		echo "\n We Have a new Update of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	}
	
	
	public function DeleteC($id)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "delete from cours where id=$id";
	        $this->bdd->exec($sql);
		echo "\n We Have a new delete of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	}
	
	// The user turns the wheel, machine dispenses gumball!
	public function DeleteP($id)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "delete from prof where id=$id";
	        $this->bdd->exec($sql);
		echo "\n We Have a new delete of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	}
	
	public function delete_all()
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "delete from cours";
		$this->bdd->exec($sql);
		$sql = "delete from prof";
		$this->bdd->exec($sql);
		$sql = "DROP SCHEMA IF EXISTS user01_test_php";
		$this->bdd->exec($sql);
		echo "\n We Have delete all of Corse";
		return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
		return false;
	    }
	}
}
