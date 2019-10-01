<?php

/* hello */
require 'DataBaseConnexion.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $databaseconnexion;

    public function setUp()
    {
        $this->$databaseconnexion = new DataBaseConnexion();
    }

    public function testInsertE()
    {
    	// Suppose we have 100 gumballs...
        $this->$databaseconnexion->InsertE("Mohammed","Amin","29/04/1991","Mons");
    }
    public function testUpdateE()
    {
    	// ... And we turn the wheel once...
        $this->$databaseconnexion->UpdateE();

    	// ... we should now have 99 gumballs remaining in the machine right?
    	//$this->assertEquals(100, $this->gumballMachineInstance->getGumballs()); 
    }
}