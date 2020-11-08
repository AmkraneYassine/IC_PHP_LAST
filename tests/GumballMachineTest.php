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
         $this->assertEquals(true, $this->gumballMachineInstance->InsertProfs());
         $this->assertEquals(true, $this->gumballMachineInstance->InsertCours());
    }
    
    public function InsertProfs()
	{  
	    try 
	    {
	       	
            	$max__id1=$this->gumballMachineInstance->GetLastIDP();
		$this->gumballMachineInstance->bdd->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX1','YYY1', '1980-09-29','ZZZA')");
        	$this->gumballMachineInstance->bdd->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX2','YYY2', '1981-10-30','ZZZB')");
        	$this->gumballMachineInstance->bdd->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX3','YYY3', '1980-09-29','ZZZC')");
        	$this->gumballMachineInstance->bdd->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('XXX4','YYY4', '1991-07-13','ZZZD')");
        	$this->gumballMachineInstance->bdd->exec("INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('AMKRANE','Yassine', '1993-03-20', 'ZZZE')");
	        $max__id2=$this->gumballMachineInstance->GetLastIDP();
            	$this->assertEquals($max__id1+5,$max__id2);
	}
    }
	
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
	
    public function InsertCours()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->gumballMachineInstance->bdd->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('IOT','10', $this->gumballMachineInstance->GetLastIDP()))");
        $this->gumballMachineInstance->bdd->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('IA','12', $this->gumballMachineInstance->GetLastIDP()))");
        $this->gumballMachineInstance->bdd->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('C++','18', $this->gumballMachineInstance->GetLastIDP()))");
        $this->gumballMachineInstance->bdd->exec("INSERT INTO cours (intitule, duree, id_prof) VALUES ('EDL','30', $this->gumballMachineInstance->GetLastIDP()))");
	$max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+4,$max__id2);
    }
    
    public function testAffichageCoursAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
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
