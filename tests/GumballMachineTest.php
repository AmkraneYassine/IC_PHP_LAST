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
        $this->assertEquals(true, $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(), "XXX1","YYY1", "29-09-1980", "ZZZ1"));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(), "XXX2","YYY2", "30-10-1981", "ZZZ2"));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(), "XXX3","YYY3", "29-09-1980", "ZZZ3"));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(), "XXX4","YYY4", "13-07-1991", "ZZZ4"));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(), "AMKRANE","Yassine", "20-03-1993", "ZZZ5"));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(), "IOT","10", $this->gumballMachineInstance->GetIdP("XXX2","YYY2")));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(), "IA","12", $this->gumballMachineInstance->GetIdP("XXX1","YYY1")));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(), "C++","18", $this->gumballMachineInstance->GetIdP("XXX3","YYY3")));
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(), "EDL","30", $this->gumballMachineInstance->GetIdP("XXX3","YYY3")));
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
    
    public function testAffichageCoursAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
    }
    
    public function testInsertC()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals(true, $this->gumballMachineInstance->InsertC("PHP","12", $this->gumballMachineInstance->GetIdP("PROF_TEST","Prof_Test")));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+1,$max__id2);
    }
    public function testUpdateP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateP("Nolack","Fabrice",$this->gumballMachineInstance->GetIdP("XXX4","YYY4")));
    }
    public function testUpdateC()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateC("C++","30"));
    }
    public function testDeleteP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteP($this->gumballMachineInstance->GetIdP("PROF_TEST","Prof_Test")));
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
