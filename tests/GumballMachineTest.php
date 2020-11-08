<?php

/* hello */

use PHPUnit\Framework\TestCase;

require 'GumballMachine.php';

class GumballMachineTest extends TestCase
{
    public $gumballMachineInstance;
    //prof
    private $nom="x_test_tp"; // a changer
    private $prenom="y_test_tp"; // a changer
    private $date_naissance="0000-00-00"; // a changer
    private $lieu_naissance="XY"; // a changer
    // cours
    private $intitule="***"; //a remplir
    private $duree="***";    //a remplir

    public function setUp(): void
    {
         $this->gumballMachineInstance = new GumballMachine();
         $this->assertEquals(false,$this->gumballMachineInstance->InsertProfs());
         $this->assertEquals(false,$this->gumballMachineInstance->InsertCours());
    }
    
    	
	public function testInsertProfs()
	{  
	    //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		$this->gumballMachineInstance->getDB()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->gumballMachineInstance->getDB()->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX1','YYY1', '29-09-1980','ZZZA')");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX2','YYY2', '30-10-1981','ZZZB')");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX3','YYY3', '29-09-1980','ZZZC')");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX4','YYY4', '13-07-1991','ZZZD')");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('AMKRANE','Yassine', '20-03-1993', 'ZZZE')");

	    echo "\n 0 - Insertions Profs";
	   
	}
    
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom,$this->prenom,$this->date_naissance,$this->lieu_naissance));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
    }
    public function testAffichageProfAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Insertion of Professors"));
    }
    
    
    public function testInsertCours()
	{
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('IOT','10', GetIdP('XXX2','YYY2'))");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('IA','12', GetIdP('XXX1','YYY1'))");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('C++','18', GetIdP('XXX3','YYY3'))");
        $this->gumballMachineInstance->getDB()->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('EDL','30', GetIdP('XXX3','YYY3'))");
	    
        echo "\n 0 - Insertions Cours";
	}
    
    public function testAffichageCoursAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
    }
    
    public function testInsertC()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC("PHP","12", $this->gumballMachineInstance->GetIdP("XXX3","YYY3")));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+1,$max__id2);
    }
    public function testUpdateP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateP("Nolack","Fabrice",$this->gumballMachineInstance->GetIdP('XXX4','YYY4')));
    }
    public function testUpdateC()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateC("C++","30"));
    }
    public function testDeleteP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteP($this->gumballMachineInstance->GetIdP("AMKRANE","Yassine")));
    }
    public function testAffichageCoursAPI()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->AffichageCours("After Insertion of Courses"));
    }
    
    
    public function testDelete_All()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->delete_all());
        echo "Tous les enregistrements sont supprimés";
    }
    
}
