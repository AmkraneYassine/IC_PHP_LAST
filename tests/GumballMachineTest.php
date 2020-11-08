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
    }
    
    public function InsertProfs()
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
	
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }

    
}
